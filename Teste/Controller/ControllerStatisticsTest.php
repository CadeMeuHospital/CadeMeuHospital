<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerStatistics.php';

class ControllerStatisticsTest extends PHPUnit_Framework_TestCase {

    protected $controllerStatistics;

    protected function setUp() {
        $this->controllerStatistics = ControllerStatistics::getInstanceControllerStatistics();
    }

    protected function tearDown() {
        unset($this->controllerStatistics);
    }

    public function testGetInstanceControllerStatisticsNotNull() {
        $resultNotNull = $this->controllerStatistics->getInstanceControllerStatistics();
        $this->assertNotNULL($resultNotNull);
    }

    public function testGetInstanceControllerStatistics() {
        $resultInstanceOf = $this->controllerStatistics->getInstanceControllerStatistics();
        $this->assertInstanceOf('ControllerStatistics', $resultInstanceOf);
    }

    public function testGenerateValuesToChartAverageEvaluate() {
        $resultNotNull = $this->controllerStatistics->generateValuesToChartAverageEvaluate();
        $this->assertNotNULL($resultNotNull);
    }

    public function testGenerateValuesToChartAverageEvaluateSingleUBS() {
        $resultNotNull = $this->controllerStatistics->generateValuesToChartAverageEvaluateSingleUBS(4);
        $this->assertNotNULL($resultNotNull);
       
    }
    
    public function testGenerateValuesToChartAverageEvaluateSingleUBSFalse() {
        $resultFalse = $this->controllerStatistics->generateValuesToChartAverageEvaluateSingleUBS(44564887);
        $this->assertFalse($resultFalse);
       
    }

}
