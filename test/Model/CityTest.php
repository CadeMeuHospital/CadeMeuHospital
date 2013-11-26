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
        $newState = new State("RO", 1234, 3, "STATE", 1234, 1234);
        $this->city->setState($newState);
        $this->assertEquals("RO",$newState->getAcronym());
        unset($newState);
    }

    public function testGetCodMunic() {
        $resultEqual = $this->city->getCodMunic();
        $this->assertEquals(123456, $resultEqual);
    }

    public function testSetCodMunic() {
        $this->city->setCodMunic(110001);
        $resultCodMunc = $this->city->getCodMunic();
        $this->assertEquals(110001,$resultCodMunc);
    }

    public function testGetDscCidade() {
        $resultEqual = $this->city->getDscCidade();
        $this->assertEquals("CIDADE",$resultEqual);
    }

    public function testSetDscCidade() {
        $this->city->setDscCidade("CIDADE");
        $resultDscCidade = $this->city->getDscCidade();
        $this->assertEquals("CIDADE",$resultDscCidade);
    }

}
