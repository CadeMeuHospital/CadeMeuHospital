<?php

include_once dirname(__FILE__) . "/../../Dao/RankingDAO.php";

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

    public function testGetRank() {
        $result = $this->object->getRank("US OSWALDO DE SOUZA", 1, 3);
    }
    public function testGetRankFalse() {
        $resultFalse = $this->object->getRank("dnfjsf", 9999999, 123);
    }

    public function testGetRankByCityNotNull() {
        $result = $this->object->getRankByCity("Aracaju");
    }

    public function testGetRankByCityFalse() {
        $resultFalse = $this->object->getRankByCity("adjaijaid");
    }
}
