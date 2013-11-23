<?php

require_once dirname(__FILE__) . '/../../src/Model/City.php';
require_once dirname(__FILE__) . '/../../src/Model/State.php';

class CityTest extends PHPUnit_Framework_TestCase {

    protected $city;
    protected $state;

    protected function setUp() {
        $this->state = new State("DF", 123456, 4, "NAME", 123456, 123456);
        $this->city = new City(123456, "CIDADE", $this->state);
    }

    protected function tearDown() {
        unset($this->city);
        unset($this->state);
    }

    public function testGetState() {
        $resultInstanceOf = $this->city->getState();
        $this->assertInstanceOf('State',$resultInstanceOf);
    }

    public function testSetState() {
    }

    public function testGetCodMunic() {
        $resultEqual = $this->city->getCodMunic();
        $this->assertEquals(123456, $resultEqual);
    }

    public function testSetCodMunic() {
    }

    public function testGetDscCidade() {
        $resultEqual = $this->city->getDscCidade();
        $this->assertEquals("CIDADE",$resultEqual);
    }

    public function testSetDscCidade() {
    }

}
