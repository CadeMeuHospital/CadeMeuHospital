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

    public function testGetInstanceStatisticsDAO() {
        $resultNotNull = $this->statisticsDao->getValuesToChartAverageEvaluate();
        $this->assertNotNull($resultNotNull);        
    }

    public function testGetValuesToChartAverageEvaluate() {
       
       
    }

  
    public function testGetValuesToChartAverageEvaluateSigleUBS() {
      
    }

}
