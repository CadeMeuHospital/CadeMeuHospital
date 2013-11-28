<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerProfileUBS.php';
require_once dirname(__FILE__) . '/../../src/Utils/Exception/TextFieldException.php';

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;
    protected $objectProfileUBS;

    /* SetUp methods to inicialize the test suit */

    protected function setUp() {
        $this->setUpControllerProfileUBS();
        $this->setUpObjectProfileUBS();
        $this->setUpEvaluate();
    }

    protected function setUpControllerProfileUBS() {
        $this->controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    }

    protected function setUpObjectProfileUBS() {
        $this->objectProfileUBS = $this->controllerProfileUBS->makeObjectUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom", 1);
    }

    /* TearDown methods to delete the suit case */

    protected function tearDown() {
        $this->tearDownControllerProfileUBS();
        $this->tearDownObjectProfileUBS();
        $this->tearDownEvaluate();
    }

    protected function tearDownControllerProfileUBS() {
        unset($this->controllerProfileUBS);
    }

    protected function tearDownObjectProfileUBS() {
        unset($this->objectProfileUBS);
    }

    /* Singleton suit test case */

    public function testSingletonNotNull() {
        $resultNotNull = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertNotNULL($resultNotNull);
    }

    public function testSingletonInstanceOf() {
        $resultInstanceOf = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertInstanceOf('ControllerProfileUBS', $resultInstanceOf);
    }

    /* Method SearchUBS suit test case */

    public function testSearchUBSInstanceOf() {
        $arrayObjectSearch = $this->controllerProfileUBS->searchUBS("Gama", 2);
        $resultInstanceOf = $arrayObjectSearch[0];
        $this->assertInstanceOf('ProfileUBS', $resultInstanceOf);
    }

    /**
     * expectedExceptionMessage "Campo não pode ser nulo!"
     */
    public function testSearchUBSException() {
        $this->controllerProfileUBS->searchUBS(NULL, 1);
    }

    /* Method ReturnUBS suit test case */

    public function testReturnUBSNotNull() {
        $resultNotNull = $this->controllerProfileUBS->returnUBS(1);
        $this->assertNotNULL($resultNotNull);
    }

    public function testReturnUBSEqualsId() {
        $resultId = $this->controllerProfileUBS->returnUBS(1);
        $idUBS = $resultId->getIdUBS();
        $this->assertEquals(1, $idUBS);
    }

    public function testReturnUBSInvalidField() {
        $resultInvalidField = $this->controllerProfileUBS->returnUBS(17953);
        $this->assertNotNull($resultInvalidField);
    }
    
    public function testReturnUBSInvalidId() {
        $resultInvalidId = $this->controllerProfileUBS->returnUBS(9999999997);
        $this->assertFalse($resultInvalidId);
    }
    
    public function testReturnUBSCatch(){
        try{
            $this->controllerProfileUBS->returnUBS("jhadshfadsf");
            $this->fail("Exception");
        }catch(Exception $e){
            //Test ok
        }
    }
    
    /* Method EvaluateUBS suit test case */
    
    public function setUpEvaluate(){
        $queryDel = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote,amount_people_1,amount_people_2,amount_people_3,amount_people_4,amount_people_5)
                    VALUES (1234567, 10,1,2,3,4,5)";
        mysql_query($queryDel);
        $queryInsertUBS = "INSERT INTO ubs (cod_unico, vlr_latitude, vlr_longitude, cod_munic,
            cod_cnes, nom_estab, dsc_endereco, dsc_bairro, dsc_cidade, dsc_telefone, 
            dsc_estrut_fisic_ambiencia, dsc_adap_defic_fisic_idosos, dsc_equipamentos, 
            dsc_medicamentos, average) VALUES (1234567, -95549.9999999999999, -99564.9999999999999, 
            999999, 99999, 'testeNome','testeEndereco', 'testeBairro', 'descBairro', 
            99999999999,  'testeDescEstFisiAmb', 'testDescAdaptIdoso', 'testeDescEquip', 
            'testeDescEquip', 9999999)";
        mysql_query($queryInsertUBS);
    }
    
    public function tearDownEvaluate(){
        $queryDel = "DELETE FROM evaluate WHERE id_cod_unico = 1234567";
        mysql_query($queryDel);
        $queryDel2 = "DELETE FROM `cademeuhospital`.`ubs` WHERE `ubs`.`cod_unico` = 1234567";
        mysql_query($queryDel2);
    }

    public function testEvaluateUBSNotNull() {
        $result = $this->controllerProfileUBS->evaluateUBS(3, 1234567);
        $this->assertEquals(3, $result);
    }
    
    public function testEvaluateUBSInvalidId() {
        $result = $this->controllerProfileUBS->evaluateUBS(3, 413264);
        $this->assertFalse($result);
    }
    
    public function testGetDistanceBetweenTwoLatLon() {
        $distance = $this->controllerProfileUBS->getDistanceBetweenTwoLatLon("-15.780147999999999","-47.92917","-10.91123700141880","-37.062077522277");
        $this->assertTrue($distance > 1250 && $distance < 1300);
    }
    
    public function testGetDistanceBetweenTwoLatLonEquals() {
        $distance = $this->controllerProfileUBS->getDistanceBetweenTwoLatLon("-15.780147999999999","-47.92917","-15.780147999999999","-47.92917");
        $this->assertEquals($distance, 0.0);
    }

}

?>