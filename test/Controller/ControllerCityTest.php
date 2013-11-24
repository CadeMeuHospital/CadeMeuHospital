<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerCity.php';

class ControllerCityTest extends PHPUnit_Framework_TestCase {

    protected $controllerCity;
    protected $objectCity;

    protected function setUp() {
        $this->controllerCity = ControllerCity::getInstanceControllerCity();
    }

    protected function tearDown() {
        unset($this->controllerCity);
        unset($this->objectCity);
    }
    
    public function testGetInstanceControllerCityNotNull(){
        $this->assertNotNull($this->controllerCity);
    }

    public function testGetInstanceControllerCityInstanceOf() {
        $this->assertInstanceOf("ControllerCity",  $this->controllerCity);
    }
    
    public function testMakeObjectCityNotNull(){
        $this->objectCity = $this->controllerCity->makeObjectCity(110001,"RO");
        $this->assertNotNull($this->objectCity);
    }

}
