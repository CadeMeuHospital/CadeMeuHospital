<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerProfileUBS.php';
require_once dirname(__FILE__) . '/../../Utils/Exception/TextFieldException.php';

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;
    protected $objectProfileUBS;

    /* SetUp methods to inicialize the test suit */

    protected function setUp() {
        $this->setUpControllerProfileUBS();
        $this->setUpObjectProfileUBS();
    }

    protected function setUpControllerProfileUBS() {
        $this->controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    }

    protected function setUpObjectProfileUBS() {
        $this->objectProfileUBS = $this->controllerProfileUBS->makeObjectUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");
    }

    /* TearDown methods to delete the suit case */

    protected function tearDown() {
        $this->tearDownControllerProfileUBS();
        $this->tearDownObjectProfileUBS();
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

    /* Method MakeObjectUBS suit test case */

    public function testMakeObjectUBSNotNull() {
        $resultNotNull = $this->objectProfileUBS;
        $this->assertNotNULL($resultNotNull);
    }

    public function testMakeObjectUBSInstanceOf() {
        $resultInstanceOf = $this->objectProfileUBS;
        $this->assertInstanceOf('ProfileUBS', $resultInstanceOf);
    }

    /* Method SearchUBS suit test case */

    public function testSearchUBSInstanceOf() {
        $arrayObjectSearch = $this->controllerProfileUBS->searchUBS("Gama", 2);
        $resultInstanceOf = $arrayObjectSearch[0];
        $this->assertInstanceOf('ProfileUBS', $resultInstanceOf);
    }

    /**
     * @expectedExceptionMessage "Campo não pode ser nulo!"
     */
    public function testSearchUBSException() {
        $this->controllerProfileUBS->searchUBS("", 1);
        
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
        $this->assertNotNull($resultInvalidId);
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

    public function testEvaluateUBSNotNull() {
        $resultNotNull = $this->controllerProfileUBS->evaluateUBS(3, 4);
        $this->assertNotNull($resultNotNull);
    }

    /* Method TakeAverageUBS suit test case */

    public function testTakeAverageUBSNotNull() {
        $resultNotNull = $this->controllerProfileUBS->takeAverageUBS(1);
        $this->assertNotNull($resultNotNull);
    }
    
    public function testGetDistanceBetweenTwoLatLon() {
        $distance = $this->controllerProfileUBS->getDistanceBetweenTwoLatLon("-15.780147999999999","-47.92917","-10.91123700141880","-37.062077522277");
        $this->assertTrue($distance > 1250 && $distance < 1300);
    }
    
    public function testGetDistanceBetweenTwoLatLonEquals() {
        $distance = $this->controllerProfileUBS->getDistanceBetweenTwoLatLon("-15.780147999999999","-47.92917","-15.780147999999999","-47.92917");
        $this->assertEquals($distance, 0.0);
    }
    public function testTakeState() {
        $result = $this->controllerProfileUBS->takeState(123456);
        $this->assertNotNull($result);
    }

}

?>