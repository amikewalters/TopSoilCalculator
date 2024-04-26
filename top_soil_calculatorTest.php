<?php

namespace soil_test;

use PHPUnit\Framework\TestCase;

/*
 * Requirement: You should add a PHP Unit test for each method of your object
 */
class TopSoilCalculatorTest extends TestCase
{
    public function testSetBagCost()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->bag_cost);
    }

    public function testSetMeasurementUnit()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsSame('furlongs',$soil->measurement_unit);
    }

    public function testSetDepthUnit()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsSame('furlongs',$soil->depth_unit);
    }

    public function testSetWidth()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->width);
    }

    public function testSetLength()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->length);
    }

    public function testSetDepth()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->depth);
    }

    private function testSetDimension()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->width);
        $this->assertIsFloat($soil->length);
        $this->assertIsFloat($soil->depth);
    }

    public function testSetDimensions()
    {

        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->width);
        $this->assertIsFloat($soil->length);
        $this->assertIsFloat($soil->depth);
    }

    public function testGetBagTotal()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->getBagTotal());
    }

    public function testGetRollTotal()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertStringContainsString('&pound;', $soil->getRollTotal());
    }

    public function testGetArea()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsFloat($soil->getArea());
    }

    public function testAddToBasket()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertSame(7,$soil->basket);
    }

    public function testGetObjectSave()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertSame(true,$soil->getObjectSave());
    }

    public function testSetError()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );
        $soil->setError('M');

        $this->assertSame('M',$soil->error);
    }

    public function testHasError()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertIsBool($soil->hasError());
    }

    public function testHtmlInterface()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertStringContainsString('html', $soil->htmlInterface());
    }

    private function testGetDefaults()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $defaults = $soil->getDefaults();

        $this->assertSame(10, $defaults->width);
        $this->assertSame(20, $defaults->length);
        $this->assertSame(30, $defaults->depth);
        $this->assertSame(99.00, $defaults->bag_cost);
        $this->assertSame(0, $defaults->roll_size);
        $this->assertSame('furlongs', $defaults->measurement_unit);
        $this->assertSame('furlongs', $defaults->depth_unit);
        $this->assertSame('N', $defaults->error);
    }

    public function test__construct()
    {
        $soil = new TopSoilCalculator(
            array(
                'bag_cost' => 99.00,
                'width' => 10,
                'length' => 20,
                'depth' => 30,
                'measurement_unit' => 'furlongs',
                'depth_unit' => 'furlongs'
            )
        );

        $this->assertSame(10, $soil->width);
        $this->assertSame(20, $soil->length);
        $this->assertSame(30, $soil->depth);
        $this->assertSame(99.00, $soil->bag_cost);
        $this->assertSame(0, $soil->roll_size);
        $this->assertSame('furlongs', $soil->measurement_unit);
        $this->assertSame('furlongs', $soil->depth_unit);
        $this->assertSame('N', $soil->error);
    }
}

