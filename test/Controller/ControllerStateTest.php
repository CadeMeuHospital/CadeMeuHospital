<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerState.php';

class ControllerStateTest extends PHPUnit_Framework_TestCase {

    protected $controllerState;

    protected function setUp() {
        $this->controllerState = ControllerState::getInstanceControllerState();
    }

    protected function tearDown() {
        unset($this->controllerState);
    }

    public function testSaveAverageEvaluationState() {
        $result = $this->controllerState->saveAverageEvaluationState(5,"KY");
        $this->assertTrue($result);
    }
    
    public function testTakeState() {
        $result = $this->controllerState->takeState(530005);
        $this->assertEquals("DF", $result[0]);
    }
    
    public function testTakeStateFalse() {
        $resultFalse = $this->controllerState->takeState(16);
        $this->assertFalse($resultFalse);
    }

}
