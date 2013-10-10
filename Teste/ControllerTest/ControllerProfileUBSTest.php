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

    public function test() {

        $result = $this->controllerProfileUBS->getInstanceControllerProfileUBS();
        $this->assertNULL($result);
        
    }

}

?>
