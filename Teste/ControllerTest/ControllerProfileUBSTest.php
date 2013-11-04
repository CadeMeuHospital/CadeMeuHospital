<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerProfileUBS.php';

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;
    protected $objectProfileUBS;

    protected function setUpControllerProfileUBS() {
        $this->controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    }
    protected function setUpObjectProfileUBS(){
        $this->setUpControllerProfileUBS();
        $this->objectProfileUBS = $this->controllerProfileUBS->makeObjectUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");  
        $this->tearDownControllerProfileUBS();        
    }

    protected function tearDownControllerProfileUBS() {
        unset($this->controllerProfileUBS);
    }
    protected function tearDownObjectProfileUBS(){
        unset($this->objectProfileUBS);
    }

    public function testSingletonNotNull() {
        $this->setUpControllerProfileUBS();
        $result = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertInstanceOf('ControllerProfileUBS', $result);
        $this->assertNotNULL($result);
        $this->tearDownControllerProfileUBS();
    }

    public function testMakeObjectUBSNotNull() {
        $this->setUpObjectProfileUBS();
        $result = $this->objectProfileUBS;
        $this->assertNotNULL($result);
        $this->tearDownObjectProfileUBS();
    }

    public function testMakeObjectUBSInstanceOf() {
        $this->setUpObjectProfileUBS();
        $result = $this->objectProfileUBS;
        $this->assertInstanceOf('ProfileUBS', $result);
        $this->tearDownObjectProfileUBS();
    }

    public function testSearchUBS() {
        $this->setUpControllerProfileUBS();
        $arrayObjectSearch = $this->controllerProfileUBS->searchUBS("Taguatinga", 2);
        $result = $arrayObjectSearch[0];
        $this->assertInstanceOf('ProfileUBS', $result);
        $this->tearDownControllerProfileUBS();
    }

    public function testReturnUBSNotNull() {
        $this->setUpControllerProfileUBS();
        $result = $this->controllerProfileUBS->returnUBS(1);
        $this->assertNotNULL($result);
        $this->tearDownControllerProfileUBS();
    }

    public function testReturnUBSEqualsID() {
        $this->setUpControllerProfileUBS();
        $result = $this->controllerProfileUBS->returnUBS(1);
        $idUBS = $result->getIdUBS();
        $this->assertEquals(1, $idUBS);
        $this->tearDownControllerProfileUBS();
    }

}
?>