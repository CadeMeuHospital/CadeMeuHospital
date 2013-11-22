<?php

require_once dirname(__FILE__) . "/../../src/Dao/RankingDAO.php";

class RankingDAOTest extends PHPUnit_Framework_TestCase {

    protected $object;
    
    protected function setUp(){
        $this->setUpRankingDAO();
    }

    protected function setUpRankingDAO() {
        $this->object = new RankingDAO();
    }
    
    protected function tearDown(){
        $this->tearDownRankingDAO();
    }

    protected function tearDownRankingDAO() {
        unset($this->RankingDAO);
    }

    public function testGetRankNotNull() {
        $resultNotNull = $this->object->getRank();
        $this->assertNotNull($resultNotNull);
    }

    public function testGetRankByCityNotNull() {
        $result = $this->object->getRankByCity("Aracaju");
        $this->assertNotNull($result);
    }
    public function testGetRankByCityFalse(){
        $result = $this->object->getRankByCity("asdjaidj");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }

    public function testGetRankByNeighborhoodNotNull(){
        $resultNotNull = $this->object->getRankByNeighborhood("centro");
        $this->assertNotNull($resultNotNull);
    }
    public function testGetRankByNeighborhoodFalse(){
        $result = $this->object->getRankByNeighborhood("addssafg");
        $resultFalse = mysql_fetch_row($result);
        $this->assertFalse($resultFalse);
    }
            
}
