<?php

require_once dirname(__FILE__) . '/../../Dao/StatisticsDAO.php';

class StatisticsDAOTest extends PHPUnit_Framework_TestCase {

    protected $statisticsDao;

    protected function setUp() {
        $this->statisticsDao = StatisticsDAO::getInstanceStatisticsDAO();
    }

    protected function tearDown() {
        unset($this->statisticsDao);
    }

    public function testGetInstanceStatisticsDAONotNull() {
        $resultNotNull = $this->statisticsDao->getInstanceStatisticsDAO();
        $this->assertNotNull($resultNotNull);
    }
    
    public function testGetInstanceStatisticsDAOInstanceOf() {
        $resultInstanceOf = $this->statisticsDao->getInstanceStatisticsDAO();
        $this->assertInstanceOf('StatisticsDAO',$resultInstanceOf);
    }

    public function testGetValuesToChartAverageEvaluate() {
        $resultNotNull = $this->statisticsDao->getValuesToChartAverageEvaluate();
        $this->assertNotNull($resultNotNull);
    }

    public function testGetValuesToChartAverageEvaluateSigleUBS() {
        
    }

}
