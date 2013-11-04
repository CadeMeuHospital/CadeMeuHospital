<?php

require_once dirname(__FILE__) . '/../../Dao/ProfileUBSDAO.php';

define("IDEVALUATE", "999999");

class ProfileUBSDAOTest extends PHPUnit_Framework_TestCase {

    protected $profileUBSDao;

    protected function setUpProfileUBS() {
        $this->profileUBSDao = new ProfileUBSDAO();
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBSDao);
    }
    
    protected function tearDownDataBase(){
        $sqlDeleteRowEvaluate = "DELETE FROM evaluate WHERE id_evaluate LIKE 999999";
        $result = mysql_query($sqlDeleteRowEvaluate);
    }

    protected function insertUBSInDataBase() {
        $queryInsertUBS = "INSERT INTO ubs (cod_unico, vlr_latitude, vlr_longitude, cod_munic, cod_cnes, nom_estab, dsc_endereco, dsc_bairro, dsc_cidade, dsc_telefone, dsc_estrut_fisic_ambiencia, dsc_adap_defic_fisic_idosos, dsc_equipamentos, dsc_medicamentos, average) VALUES (37798, -99.9999999999999, -99.9999999999999, 999999, 99999, 'testeNome','testeEndereco', 'testeBairro', 'descBairro', 99999999999,  'testeDescEstFisiAmb', 'testDescAdaptIdoso', 'testeDescEquip', 'testeDescEquip', 9999999)";
        $executeQuery = mysql_query($queryInsertUBS);
        return $executeQuery;
    }

    public function testSearchUBSinDatabase() {
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("taguatinga", 2);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();
    }

    public function testReturnUBSFalse() {
        $this->setUpProfileUBS();
        $resultFalse = $this->profileUBSDao->returnUBS(40000);
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();
    }

    public function testSearchUBSInTableEvaluate() {
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->searchUBSInTableEvaluate(1);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();
    }

    public function testeSaveEvaluationUBSInsere() {
        $this->setUpProfileUBS();
        $result = $this->profileUBSDao->saveEvaluationUBS(NULL, IDEVALUATE);
        $this->tearDownProfileUBS();
        $this->tearDownDataBase();
    }

    public function testSaveEvaluationUBSNotNULL() {
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->saveEvaluationUBS(5, IDEVALUATE);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();
        $this->tearDownDataBase();
    }

    public function testTakeAverageUBSFalse() {
        $this->setUpProfileUBS();
        $resultFalse = $this->profileUBSDao->takeAverageUBS(NULL);
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();
    }

}
