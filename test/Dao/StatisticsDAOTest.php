<?php

require_once dirname(__FILE__) . '/../../src/Dao/StatisticsDAO.php';

class StatisticsDAOTest extends PHPUnit_Framework_TestCase {

    protected $statisticsDao;

    protected function setUp() {
        $this->statisticsDao = StatisticsDAO::getInstanceStatisticsDAO();
    }

    protected function tearDown() {
        unset($this->statisticsDao);
    }

    public function testGetValuesToChartAverageEvaluate() {
        $resultNotNull = $this->statisticsDao->getValuesToChartAverageEvaluate();
        $this->assertNotNull($resultNotNull);
    }

    public function testGetValuesToChartAverageEvaluateSigleUBSFalse() {
        $resultFalse = $this->statisticsDao->getValuesToChartAverageEvaluateSigleUBS(4951951951);
        $this->assertFalse($resultFalse);
    }

    public function testGetValuesToChartAverageEvaluateSigleUBSNotNull() {
        $resultNotNull = $this->statisticsDao->getValuesToChartAverageEvaluateSigleUBS(4);
        $this->assertNotNull($resultNotNull);
    }
    
    public function testGetStatisticsByState() {
        $resultNotNull = $this->statisticsDao->getStatisticsByState();
        $this->assertNotNull($resultNotNull);
    }

}
