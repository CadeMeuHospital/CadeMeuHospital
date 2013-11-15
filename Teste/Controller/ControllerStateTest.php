<?php

require_once dirname(__FILE__) . '/../../Controller/ControllerState.php';

class ControllerStateTest extends PHPUnit_Framework_TestCase {

    protected $controllerState;

    protected function setUp() {
        $this->controllerState = ControllerState::getInstanceControllerState();
    }

    protected function tearDown() {
        unset($this->controllerState);
    }

    public function testSaveAverageEvaluationState() {
        $resultFalse = $this->controllerState->saveAverageEvaluationState('5',['LV']);
        $this->assertFalse($resultFalse);
    }

}
