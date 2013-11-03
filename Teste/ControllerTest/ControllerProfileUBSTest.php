<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerProfileUBS.php';

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;
    protected $objectProfileUBS;

    protected function setUpControllerProfileUBS() {
        $this->controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    }
    protected function setUpObjectProfileUBS(){
     $this->objectProfileUBS = $this->controllerProfileUBS->makeObjectUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");  
    }

    protected function tearDownControllerProfileUBS() {
        unset($this->controllerProfileUBS);
    }
    protected function tearDownObjectProfileUBS(){
        unset($this->objectProfileUBS);
    }

    public function testSingletonNotNull() {
        $result = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertInstanceOf('ControllerProfileUBS', $result);
        $this->assertNotNULL($result);
    }

    public function testMakeObjectUBSNotNull() {
        $result = $this->objectProfileUBS;
        $this->assertNotNULL($result);
    }

    public function testMakeObjectUBSInstanceOf() {
        $result = $this->objectProfileUBS;
        $this->assertInstanceOf('ProfileUBS', $result);
    }

    public function testSearchUBS() {
        $result = $this->controllerProfileUBS->searchUBS("Taguatinga", 2);
    }

    public function testReturnUBSNotNull() {
        $result = $this->controllerProfileUBS->returnUBS(1);
        $idUBS = $result->getIdUBS();
        $this->assertNotNULL($result);
    }

    public function testReturnUBSEqualsID() {
        $result = $this->controllerProfileUBS->returnUBS(1);
        $idUBS = $result->getIdUBS();
        $this->assertEquals(1, $idUBS);
    }

}
?>