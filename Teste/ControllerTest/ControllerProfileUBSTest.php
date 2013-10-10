<?php

require_once "/../../Controller/ControllerProfileUBS.php";

class ControllerProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $controllerProfileUBS;

    protected function setUp() {
        $this->controllerProfileUBS = new ControllerProfileUBS;
    }

    protected function tearDown() {
        unset($this->controllerProfileUBS);
    }

    protected function getInstanceTest() {
        
        $result = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertNULL($result);
        
    }

}

?>
