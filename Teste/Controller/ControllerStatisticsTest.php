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
    
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    public function testGenerateValuesToChartAverageEvaluateSingleUBS() {
   
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
