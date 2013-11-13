<?php

require_once dirname(__FILE__) . '/../../Model/User.php';

class UserTest extends PHPUnit_Framework_TestCase {

    protected $user;
    
    protected function setUp(){
        $this->setUpUser();
    }
    
    protected function setUpUser(){
        $this->user = new User("-10.91123700141880","-37.062077522277","Aracaju");
    }
    
    protected function tearDown(){
        $this->tearDownUser();
    }
    
    protected function tearDownUser() {
        unset($this->user);
    }
    
    public function testGetCity() {
        $resultCity = $this->user->getCity();
        $this->assertEquals("Aracaju", $resultCity);
    }   
    
    public function testGetLatitude() {
        $resultLatitude = $this->user->getLatitude();
        $this->assertEquals("-10.91123700141880", $resultLatitude);
    }   
    
    public function testGetLongitude() {
        $resultLongitude = $this->user->getLongitude();
        $this->assertEquals("-37.062077522277", $resultLongitude);
    }   
}
?>
