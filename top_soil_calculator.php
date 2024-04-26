<?php

namespace soil;

/*
 * Requirement: Please do not use a framework (e.g. Laravel or Symfony) for this task.
 * Status: Done
 */
// No Framework used here

/*
 * Requirement: Create a PHP class that will calculate the number of bags of topsoil needed to surface a back garden.
 */
class TopSoilCalculator
{
    protected $basket = 0;
    protected $bag_cost = 72.00;
    protected $measurement_unit = 'metres';
    protected $depth_unit = 'metres';
    protected $width = 0;
    protected $length = 0;
    protected $depth = 0;
    protected $error = 'N';

    public function setBagCost($value)
    {
        $this->bag_cost = $value;
    }

    /*
     * Requirement: A method to set the measurement unit (metres, feet, or yards)
     * Status: Done
     */
    public function setMeasurementUnit($value)
    {
        $this->measurement_unit = $value;
    }

    /*
     * Requirement: A method to set the depth measurement unit (centimetres or inches)
     * Status: Done
     */
    public function setDepthUnit($value)
    {
        $this->depth_unit = $value;
    }

    /*
     * private, futureproof for any 'width' only modifications
     */
    public function setWidth($value)
    {
        $this->setDimension('width', $value);
    }

    /*
     * private, futureproof for any 'length' only modifications
     */
    public function setLength($value)
    {
        $this->setDimension('length', $value);
    }

    /*
     * private, futureproof for any 'depth' only modifications
     */
    public function setDepth($value)
    {
        $this->setDimension('depth', $value);
    }

    /*
     * private, for modifications to all dimensions
     */
    private function setDimension($which, $value)
    {
        // force positive value
        $new_value = abs(floatval($value));

        // very lossy error check
        if ($new_value != $value) {
            // upgrade error
            if ('M' == $this->error) {
                $this->setError('Y');
            } else {
                $this->setError('M');
            }
        }

        switch ($which) {
            case 'width':
                $this->width = $value;
                break;
            case 'length':
                $this->length = $value;
                break;
            case 'depth':
                $this->depth = $value;
                break;
        }
    }

    /*
     * Requirement: A method to set the dimensions (width, length, and depth)
     * Status: Done, as singular method for all three
     */
    public function setDimensions($width, $length, $depth)
    {
        $this->setWidth($width);
        $this->setLength($length);
        $this->setDepth($depth);
    }

    /*
     * Requirement: A method to calculate the number of bags needed to cover the dimensions
     * Status: Done
     */
    public function getBagTotal()
    {
        // not sure what this area adjustment is
        // also, why is depth not used?!?
        $total = $this->getArea() * 0.025;

        // not sure what this adjustment is, required
        $total = $total * 1.4;

        // Round up
        return ceil($total);
    }

    /*
     * Requirement: Work out the cost of for all the rolls
     * Assumption: 'rolls' to flatten the soil rather than actual bags
     * Status: Done
     */
    public function getRollTotal()
    {
        $units = $this->getBagTotal() * $this->bag_cost;
        // would use NumberFormatter, but this is easier
        return '&pound;' . number_format($units, 2);
    }

    public function getArea()
    {
        return $this->width * $this->length;
    }

    /*
     * Requirement: Add an ‘add to basket’ method/class.
     * Status: Done
     */
    public function addToBasket()
    {
        $this->basket += $this->getBagTotal();
    }

    /*
     * Requirement: Amethod to save the object into a MySQL Database (MariaDb 10.1)
     * Status: Incomplete
     */
    public function getObjectSave()
    {
        return var_export($this, true);
    }

    /*
     * Y = Definite error
     * M = Maybe error
     * N = No error
     */
    public function setError($error_code)
    {
        $this->error = $error_code;
    }

    public function hasError()
    {
        if (in_array($this->error, array('M','Y'))) {
            return true;
        }
        return false;
    }

    /*
     * Requirement: Build a front-end interface to use the calculator
     * I would not normally output HTML like this, But it works
     */
    public function htmlInterface()
    {
        $html = '';
        $html .= "<html>";
        $html .= "<body>";
        if ($this->hasError()) {
            $html .= "<p>You might have submitted an incorrect value</p>";
        }
        $html .= "<form action='index.php' method='GET'>";
        $html .= "<p><label>Width:</label> <input type='number' name='width' placeholder='Name' size='10' value='$this->width'></p>";
        $html .= "<p><label>Length:</label> <input type='number' name='length' placeholder='Name' size='10' value='$this->length'></p>";
        $html .= "<p><label>Depth:</label> <input type='number' name='depth' placeholder='Name' size='10' value='$this->depth'></p>";
        $html .= "<p><label>Measurement Unit:</label> <input type='text' name='measurement_unit' placeholder='Measurement Unit' size='25' value='$this->measurement_unit'></p>";
        $html .= "<p><label>Depth Unit:</label> <input type='text' name='depth_unit' placeholder='Depth Unit' size='25' value='$this->depth_unit'></p>";
        $html .= "<p><input type='submit' name='submit' value='Submit'></p>";
        $html .= "</form>";
        if (0 < $this->getArea() && ('Y' != $this->error)) {
            $html .= "<p>";
            $html .= $this->getArea() . ' area to be covered<br />';
            $html .= $this->getBagTotal() . ' Bags needed<br />';
            $html .= $this->getRollTotal() . ' total cost<br />';
            $html .= "</p>";
        }
        $html .= "</body>";
        $html .= "</html>";
        return $html;
    }

    private function getDefaults()
    {
        return array(
            'bag_cost' => 72.00,
            'width' => 0,
            'length' => 0,
            'depth' => 0,
            'measurement_unit' => 'metres',
            'depth_unit' => 'metres'
        );
    }

    /*
     * Constructor
     */
    public function __construct($settings)
    {
        $defaults = $this->getDefaults();

        // dirty action to remove null '' spaces linebreaks etc.
        array_map('trim', $settings);
        array_filter($settings, 'is_null');

        // overlay requested settings onto defaults
        $config = array_merge(
            $defaults,
            $settings
        );

        $this->setDimensions(
            $config['width'],
            $config['length'],
            $config['depth']
        );
        $this->setBagCost($config['bag_cost']);
        $this->setMeasurementUnit($config['measurement_unit']);
        $this->setDepthUnit($config['depth_unit']);
    }
}

