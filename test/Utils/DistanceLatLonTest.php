<?php

require_once dirname(__FILE__) . '/../../src/Utils/DistanceLatLon.php';

class DistanceLatLonTest extends PHPUnit_Framework_TestCase {
    
    public function testComputeDistance() {
        $distance = DistanceLatLon::computeDistance(0,2,0,4);
        $this->assertEquals(222.18, $distance);
    }

    public function testComputeDistanceSamePoint() {
        $distance = DistanceLatLon::computeDistance(2,2,2,2);
        $this->assertEquals(0.0, $distance);
    }
}
