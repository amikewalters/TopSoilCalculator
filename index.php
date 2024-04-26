<?php

require_once(__DIR__ . '\top_soil_calculator.php');

$soiled = new soil\TopSoilCalculator( $_GET );
echo $soiled->HtmlInterface();
