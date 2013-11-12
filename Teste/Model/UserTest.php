<?php

require_once dirname(__FILE__) . '/../../Model/User.php';

class UserTest extends PHPUnit_Framework_TestCase {

    protected $user;
    
    protected function setUp(){
        $this->setUpUser();
    }
    
    protected function setUpUser(){
        $this->user = new User("Aracaju");
    }
    
    protected function tearDown(){
        $this->tearDownUser();
    }
    
    protected function tearDownUser() {
        unset($this->user);
    }
    
    public function testGetCity() {
        $resultEquals = $this->user->getCity();
        $this->assertEquals("Aracaju", $resultEquals);
    }   
}
?>
