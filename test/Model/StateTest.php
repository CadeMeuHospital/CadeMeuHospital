<?php

require_once dirname(__FILE__) . '/../../src/Model/State.php';

class StateTest extends PHPUnit_Framework_TestCase {

    
    protected $state;
    
    protected function setUp() {
        $this->state = new State("DF", 123456, 4, "NAME", 123456, 123456);
    }
    
    protected function tearDown() {
        unset($this->state);
    }

    public function testGetAcronym() {
        $resultEqual = $this->state->getAcronym();
        $this->assertEquals("DF",$resultEqual);
    }
    
    public function testSetAcronym() {
    }
    
    public function testGetAmount_ubs() {
        $resultEqual = $this->state->getAmount_ubs();
        $this->assertEquals(123456,$resultEqual);
    }

    public function testSetAmount_ubs() {
    }

    public function testGetAvarage() {
        $resultEqual = $this->state->getAvarage();
        $this->assertEquals(4,$resultEqual);
    }
    
    public function testSetAvarage() {
    }

    public function testGetNameState() {
        $resultEqual = $this->state->getNameState();
        $this->assertEquals("NAME",$resultEqual);
    }

    public function testSetNameState() {
    }

    public function testGetPopulation() {
        $resultEqual = $this->state->getPopulation();
        $this->assertEquals(123456,$resultEqual);
    }
    
    public function testSetPopulation() {
    }
    
    public function testGetArea() {
        $resultEqual = $this->state->getArea();
        $this->assertEquals(123456,$resultEqual);
    }

    public function testSetArea() {
    }

}
