<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerRanking.php';

class ControllerRankingTest extends PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUp() {
        $this->setUpControllerRanking();
    }

    protected function setUpControllerRanking() {
        $this->object = ControllerRanking::getInstanceControllerRanking();
    }

    protected function tearDown() {
        $this->tearDownControllerRanking();
    }

    protected function tearDownControllerRanking() {
        unset($this->ControllerRanking);
    }

    public function testMakeRankNotNull() {
        $resultNotNull = $this->object->makeRank();
        $this->assertNotNull($resultNotNull);
    }

}
