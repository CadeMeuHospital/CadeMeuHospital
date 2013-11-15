<?php

require_once dirname(__FILE__) . '/../../Dao/StatisticsDAO.php';

class StatisticsDAOTest extends PHPUnit_Framework_TestCase {

    protected $statisticsDao;

    protected function setUp() {
        $this->statisticsDao = new StatisticsDAO();
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

}
