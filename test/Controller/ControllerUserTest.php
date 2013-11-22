<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerUser.php';
require_once dirname(__FILE__) . '/../../src/Model/User.php';

class ControllerUserTest extends PHPUnit_Framework_TestCase {

    
    protected $controllerUser;
    protected $objectUser;

    
    protected function setUp() {
        $this->setupControllerUser();
        $this->setUpObjectUser();
    }

    protected function setUpControllerUser() {
        $this->controllerUser = ControllerUser::getInstanceControllerUser();
    }
    
    protected function setUpObjectUser() {
        $this->objectUser = $this->controllerUser->makeObjectUser("-10.91123700141880","-37.062077522277");
    }
    
    protected function tearDownControllerUser() {
        unset($this->ControllerUser);
    }
 
    public function testTakeCity() {      
        $resultCity = $this->objectUser->getCity();
        $this->assertEquals("Aracaju",$resultCity);
    }
    
    public function testTakeCityWrongCity() {      
        $result= $this->controllerUser->takeCity("-1054.911237001418804521","-5745.4562077522277");
        $this->assertFalse($result);
    }
    
    

}
