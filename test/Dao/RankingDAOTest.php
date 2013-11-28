<?php

require_once dirname(__FILE__) . "/../../src/Dao/RankingDAO.php";

class RankingDAOTest extends PHPUnit_Framework_TestCase {

    protected $controllerRanking;
    
    protected function setUp(){
        $this->setUpRankingDAO();
    }

    protected function setUpRankingDAO() {
        $this->controllerRanking = ControllerRanking::getInstanceControllerRanking();
    }
    
    protected function tearDown(){
        $this->tearDownRankingDAO();
    }

    protected function tearDownRankingDAO() {
        unset($this->controllerRanking);
    }

    public function testGetRankNotNull() {
        $resultNotNull = $this->controllerRanking->getRank();
        $this->assertNotNull($resultNotNull);
    }

    public function testGetRankByCityNotNull() {
        $result = $this->controllerRanking->getRankByCity("Aracaju");
        $this->assertNotNull($result);
    }
    public function testGetRankByCityFalse(){
        $result = $this->controllerRanking->getRankByCity("asdjaidj");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }

    public function testGetRankByNeighborhoodNotNull(){
        $resultNotNull = $this->controllerRanking->getRankByNeighborhood("centro");
        $this->assertNotNull($resultNotNull);
    }
    public function testGetRankByNeighborhoodFalse(){
        $result = $this->controllerRanking->getRankByNeighborhood("addssafg");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }
            
}
