<?php

require_once dirname(__FILE__) . "/../../src/Dao/StateDAO.php";

class StateDAOTest extends PHPUnit_Framework_TestCase {

    protected $stateDao;

    protected function setUp() {
        $this->stateDao = StateDAO::getInstanceStateDAO();
        $this->setupCreationDB();
    }
    
    public function setupCreationDB() {
        $sqlInsertState = "INSERT INTO state (id_state, acronym,amount_ubs,average,name,population,area) VALUES (888, 'LV', 100, 4.5,'Levilandia do Sul', 1000, 1000)";
        $sqlInsertState2 = "INSERT INTO state (id_state, acronym,amount_ubs,average,name,population,area) VALUES (777, 'JW', 100, 0,'Levilandia do Norte', 1000, 1000)";
        $sqlInsert = "INSERT INTO `municipios_ibge`(`codigo`, `municipio`, `uf`, `id_estado`) VALUES (999999, 'Levilandia','LV',888)";
        $sqlInsertUBS = "INSERT INTO `ubs`(`cod_unico`, `vlr_latitude`, `vlr_longitude`, `cod_munic`, `average`) VALUES (99999999,-2344.34343,-3434.32323,999999,3);";
        mysql_query($sqlInsert);
        mysql_query($sqlInsertUBS);
        mysql_query($sqlInsertState);
        mysql_query($sqlInsertState2);
    }    

    protected function tearDown() {
        $this->tearDownStateDao();
        $this->tearDownStateDB();
    }
    
    protected function tearDownStateDao() {
        unset($this->stateDao);
    }
    
    protected function tearDownStateDB() {
        $tearDownDB = "DELETE FROM state WHERE acronym='LV'";
        $tearDownDB2 = "DELETE FROM state WHERE acronym='JW'";
        $sqlDelete = "DELETE FROM municipios_ibge WHERE `municipios_ibge`.`codigo`='999999' LIMIT 1";
        $sqlDeleteUBS = "DELETE FROM ubs WHERE `ubs`.`cod_unico` = 99999999 LIMIT 1";
        mysql_query($tearDownDB);
        mysql_query($tearDownDB2);
        mysql_query($sqlDelete);
        mysql_query($sqlDeleteUBS);
    }
    
    public function testSaveAverageEvaluationStateDAOTrue() {
        
        $resultTrue = $this->stateDao->saveAverageEvaluationStateDAO(5,"LV");
        
        
        $this->assertTrue($resultTrue);
    }
    
    public function testSaveAverageEvaluationStateDAOTrueNull() {
        $sqlInsert = "INSERT INTO `municipios_ibge`(`codigo`, `municipio`, `uf`, `id_estado`) VALUES (888888, 'Levilandia','JW',777)";
        $sqlInsertUBS = "INSERT INTO `ubs`(`cod_unico`, `vlr_latitude`, `vlr_longitude`, `cod_munic`, `average`) VALUES (2222222,-2344.34343,-3434.32323,888888,0);";
        mysql_query($sqlInsert);
        mysql_query($sqlInsertUBS);
        $resultTrue = $this->stateDao->saveAverageEvaluationStateDAO(5,"JW");

        $sqlDelete = "DELETE FROM `cademeuhospital`.`municipios_ibge` WHERE `municipios_ibge`.`codigo` = 888888 LIMIT 1";
        mysql_query($sqlDelete);
        $sqlDeleteUBS = "DELETE FROM `cademeuhospital`.`ubs` WHERE `ubs`.`cod_unico` = 2222222 LIMIT 1";
        mysql_query($sqlDeleteUBS);
        
        $this->assertTrue($resultTrue);
        
    }
    public function testTakeUfStateUBS() {
        $resultNotNull = $this->stateDao->takeUfStateUBS(280030);
        $this->assertNotNull($resultNotNull);
    }

    public function testTakeUfStateUBSFalse() {
        $resultFalse = $this->stateDao->takeUfStateUBS(28003012);
        $this->assertFalse($resultFalse);
    }    
}
