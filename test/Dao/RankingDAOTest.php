<?php

require_once dirname(__FILE__) . "/../../src/Dao/RankingDAO.php";

class RankingDAOTest extends PHPUnit_Framework_TestCase {

    protected $rankingDAO;
    
    protected function setUp(){
        $this->setUpRankingDAO();
    }

    protected function setUpRankingDAO() {
        $this->rankingDAO = RankingDAO::getInstanceRankingDAO();
    }
    
    protected function tearDown(){
        $this->tearDownRankingDAO();
    }

    protected function tearDownRankingDAO() {
        unset($this->rankingDAO);
    }

    public function testGetRankNotNull() {
        $resultNotNull = $this->rankingDAO->getRank();
        $this->assertNotNull($resultNotNull);
    }

    public function testGetRankByCityNotNull() {
        $result = $this->rankingDAO->getRankByCity("Aracaju");
        $this->assertNotNull($result);
    }
    public function testGetRankByCityFalse(){
        $result = $this->rankingDAO->getRankByCity("asdjaidj");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }

    public function testGetRankByNeighborhoodNotNull(){
        $resultNotNull = $this->rankingDAO->getRankByNeighborhood("centro");
        $this->assertNotNull($resultNotNull);
    }
    public function testGetRankByNeighborhoodFalse(){
        $result = $this->rankingDAO->getRankByNeighborhood("addssafg");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }
            
}
