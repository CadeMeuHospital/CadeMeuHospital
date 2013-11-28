<?php

require_once dirname(__FILE__) . '/../../src/Utils/DistanceLatLon.php';

class DistanceLatLonTest extends PHPUnit_Framework_TestCase {
    
    protected $distanceLatLon;


    protected function setUp() {
        $this->distanceLatLon = new DistanceLatLon;
    }


    protected function tearDown() {
        
    }


    public function testCompute_distance() {
        
    }

}
