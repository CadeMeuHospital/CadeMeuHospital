<?php

include_once dirname(__FILE__) . '/../../Controller/ControllerUser.php';

class ControllerUserTest extends PHPUnit_Framework_TestCase {

    
    protected $controllerUser;
    protected $objectUser;

    
    protected function setUp() {
        $this->setupControllerUser();
    }

    protected function setUpControllerUser() {
        $this->controllerUser = ControllerUser::getInstanceControllerUser();
    }
    
    protected function setUpObjectUser() {
        $this->objectUser = $this->controllerUser->makeObjectUser("Aracaju");
    }
    
    protected function tearDownControllerUser() {
        unset($this->ControllerUser);
    }
 
    public function testTakeCity() {      
        $resultUser = $this->controllerUser->takeCity("-10.91123700141880","-37.062077522277");
        $this->assertEquals("Aracaju",$resultUser->getCity());
    }
    
    public function testTakeCityWrongCity() {      
        $resultUser= $this->controllerUser->takeCity("-1054.911237001418804521","-5745.4562077522277");
        $this->assertFalse($resultUser);
    }
    
    

}
