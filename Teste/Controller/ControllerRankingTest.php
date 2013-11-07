<?php

include_once dirname(__FILE__) . '/../../Controller/ControllerRanking.php';

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
        $resultNotNull = $this->object->makeRank("US OSWALDO DE SOUZA", 1, 3);
    }
     public function testMakeRankFalse() {
        $resultFalse = $this->object->makeRank("dnfjsf", 9999999, 123);
    }
      public function testMakeRankNull() {
        $resultNull = $this->object->makeRank(Null);
    }
    public function testMakeRankByCityNotNull() {
        $resultNotNull = $this->object->makeRankByCity("taguatinga");
    }

    public function testMakeRankByCityFalse() {
        $resultFalse = $this->object->makeRankByCity("asdjaidj");
    }

    public function testMakeRankByCityNull() {
        $resultFalse = $this->object->makeRankByCity(NULL);
    }

}
