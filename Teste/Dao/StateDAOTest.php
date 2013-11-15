<?php

include_once dirname(__FILE__) . "/../../Dao/StateDAO.php";

class StateDAOTest extends PHPUnit_Framework_TestCase {

    protected $stateDao;

    protected function setUp() {
        $this->stateDao = new StateDAO();
    }
    
    public function setupCreationDB() {
        //$sqlInsertState = "INSERT INTO state (acronym,amount_ubs,average,name,population,area) VALUES ('LV', 100,4.5,'Levilandia do Sul',1000,1000)";
        //mysql_query($sqlInsertState);
    }    

    protected function tearDown() {
        $this->tearDownStateDao();
    }
    
    protected function tearDownStateDao() {
        unset($this->stateDao);
    }
    
    protected function tearDownStateDB() {
        //$tearDownDB = "DELETE FROM state WHERE acronym='LV'";
        //mysql_query($tearDownDB);
    }

    public function testSaveAverageEvaluationStateDAOFalse() {
        $resultFalse = $this->stateDao->saveAverageEvaluationStateDAO("5",["EU"]);
        $this->assertFalse($resultFalse);
    }

    public function testSaveAverageEvaluationStateDAOTrue() {
        $resultTrue = $this->stateDao->saveAverageEvaluationStateDAO("5",["LV"]);
        $this->assertTrue($resultTrue);
    }
}
