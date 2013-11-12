<?php

include_once dirname(__FILE__) . '/../../Controller/ControllerUser.php';

class ControllerUserTest extends PHPUnit_Framework_TestCase {

    
    protected $object;

    
    protected function setUp() {
        $this->setupControllerUser();
    }

   protected function setUpControllerUser() {
        $this->object = ControllerUser::getInstanceControllerUser();
    }
    protected function tearDownControllerUser() {
        unset($this->ControllerUser);
    }
 
    public function testTakeCity() {      
        $resultCity = $this->object-> takeCity("-10.91123700141880","-37.062077522277");
        $this->assertEquals("Aracaju",$resultCity);
    }

}
