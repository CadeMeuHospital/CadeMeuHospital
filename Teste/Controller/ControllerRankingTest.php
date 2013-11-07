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
        $resultNotNull = $this->object->makeRank();
        $this->assertNotNull($resultNotNull);
    }
    
    public function testMakeRankByCityNotNull() {
        $resultNotNull = $this->object->makeRankByCity("taguatinga");
         $this->assertNotNull($resultNotNull);
    }

    public function testMakeRankByCityFalse() {
        $result = $this->object->makeRankByCity("asdjaidj");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }

    public function testMakeRankByNeighborhoodNotNull(){
        $resultNotNull = $this->object->makeRankByNeighborhood("centro");
        $this->assertNotNull($resultNotNull);
    }
    public function testMakeRankByNeighborhoodFalse(){
        $result = $this->object->makeRankByNeighborhood("addssafg");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }


}
