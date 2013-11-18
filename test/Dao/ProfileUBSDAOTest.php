<?php

require_once dirname(__FILE__) . '/../../src/Dao/ProfileUBSDAO.php';

class ProfileUBSDAOTest extends PHPUnit_Framework_TestCase {

    protected $profileUBSDao;

    /* SetUp methods to inicialize the test suit */

    protected function setUp() {
        $this->setUpProfileUBS();
        $this->setUpUBSEvaluate();
    }

    protected function setUpProfileUBS() {
        $this->profileUBSDao = new ProfileUBSDAO();
    }

    protected function setUpUBSEvaluate() {
        $sqlInsertUBS = "INSERT INTO evaluate(id_cod_unico, amount_people, value_vote, 
            amount_people_1, amount_people_2, amount_people_3, amount_people_4, amount_people_5) 
            VALUES (999999999, 999999999, 999999999, 40,50,60,70,80)";
        mysql_query($sqlInsertUBS);
    }

    /* TearDown methods to delete the suit case */

    protected function tearDown() {
        $this->tearDownDataBase();
        $this->tearDownProfileUBS();
        $this->tearDownUBSEvaluate();
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBSDao);
    }

    protected function tearDownDataBase() {
        $sqlDeleteRowEvaluate = "DELETE FROM evaluate WHERE id_cod_unico=999999";
        mysql_query($sqlDeleteRowEvaluate);
    }

    protected function tearDownUBSEvaluate() {
        $sqlDeleteRowEvaluate = "DELETE FROM evaluate WHERE id_cod_unico=999999999";
        mysql_query($sqlDeleteRowEvaluate);
    }

    /* Method insertUBSInDatabase suit test case */

    protected function insertUBSInDataBase() {
        $queryInsertUBS = "INSERT INTO ubs (cod_unico, vlr_latitude, vlr_longitude, cod_munic,
            cod_cnes, nom_estab, dsc_endereco, dsc_bairro, dsc_cidade, dsc_telefone, 
            dsc_estrut_fisic_ambiencia, dsc_adap_defic_fisic_idosos, dsc_equipamentos, 
            dsc_medicamentos, average) VALUES (37798, -99.9999999999999, -99.9999999999999, 
            999999, 99999, 'testeNome','testeEndereco', 'testeBairro', 'descBairro', 
            99999999999,  'testeDescEstFisiAmb', 'testDescAdaptIdoso', 'testeDescEquip', 
            'testeDescEquip', 9999999)";
        $executeQuery = mysql_query($queryInsertUBS);
        $this->assertTrue($executeQuery);
    }

    /* Method searchUBSinDatabase suit test case */

    public function testSearchUBSinDatabaseByName() {
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("us oswaldo de souza", 1);
        $this->assertNotNULL($resultNotNULL);
    }

    public function testSearchUBSinDatabaseByCity() {
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("taguatinga", 2);
        $this->assertNotNULL($resultNotNULL);
    }

    public function testSearchUBSinDatabaseByNeighborhood() {
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("gama", 3);
        $this->assertNotNULL($resultNotNULL);
    }

    public function testSearchUBSinDatabaseByState() {
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("GO", 4);
        $this->assertNotNULL($resultNotNULL);
    }

    /* Method returnUBS suit test case */

    public function testReturnUBSFalse() {
        $resultFalse = $this->profileUBSDao->returnUBS(40000);
        $this->assertFalse($resultFalse);
    }

    /* Method searchUBSInTableEvaluate suit test case */

    public function testSearchUBSInTableEvaluateNotNull() {
        $resultNotNULL = $this->profileUBSDao->searchUBSInTableEvaluate(1);
        $this->assertNotNull($resultNotNULL);
    }

    /* Method saveEvaluationUBS suit test case */

    public function testeSaveEvaluationUBS() {
        $resultNotNull = $this->profileUBSDao->saveEvaluationUBS(NULL, 999999999);
        $this->assertNotNull($resultNotNull);
    }
    
    public function testeSaveEvaluationUBSInsert() {
        $resultNotNull = $this->profileUBSDao->saveEvaluationUBS(NULL, 999999999);
        $this->assertNotNull($resultNotNull);
    }

    public function testSaveEvaluationUBSNotNULL() {
        $resultNotNULL = $this->profileUBSDao->saveEvaluationUBS(5, 999999999);
        $this->assertNotNULL($resultNotNULL);
    }

    /* Method takeAvarageUBS suit test case */

    public function testTakeAverageUBSFalse() {
        $resultFalse = $this->profileUBSDao->takeAverageUBS(NULL);
        $this->assertFalse($resultFalse);
    }

    public function testTakeAverageUBSNotNull() {
        $resultNotNull = $this->profileUBSDao->takeAverageUBS(1);
        $this->assertNotNull($resultNotNull);
    }

    // Method updateEvaluateAverage suit test case
    public function testUpdateEvaluateAverage() {
        $resultFalse = $this->profileUBSDao->updateEvaluateAverage(8999999);
        $this->assertFalse($resultFalse);
    }

    public function testUpdateEvaluateAverageNotNull() {
        $resultNotNull = $this->profileUBSDao->updateEvaluateAverage(1);
        $this->assertNotNull($resultNotNull);
    }

}
