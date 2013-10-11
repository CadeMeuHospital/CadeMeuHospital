<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerProfileUBS.php';

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;

    protected function setUp() {
        $this->controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    }

    protected function tearDown() {
        unset($this->controllerProfileUBS);
    }

    public function testSingleton() {
        $result = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertInstanceOf('ControllerProfileUBS', $result);
    }

    public function testMakeObjectUBS(){
        $result = $this->controllerProfileUBS->makeObjectUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");
        $this->assertInstanceOf('ProfileUBS',$result);
    }
    
    public function testSearchUBSByNameUBS(){
        $result = $this->controllerProfileUBS->searchUBSByNameUBS("nomeUbs");
        $this->assertInstanceOf('ProfileUBS',$result);
    }
}

?>
