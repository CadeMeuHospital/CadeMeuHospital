<?php

include_once dirname(__FILE__) . "/../../Dao/RankingDAO.php";

class RankingDAOTest extends PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUpRankingDAO() {
        $this->object = new RankingDAO();
    }

    protected function tearDownRankingDAO() {
        unset($this->RankingDAO);
    }

    public function testGetRank() {
        $this->setUpRankingDAO();
        $result = $this->object->getRank("US OSWALDO DE SOUZA", 1, 3);
        $this->tearDownRankingDAO();
    }
    public function testGetRankFalse() {
        $this->setUpRankingDAO();
        $resultFalse = $this->object->getRank("dnfjsf", 9999999, 123);
        $this->tearDownRankingDAO();
    }

    public function testGetRankByCityNotNull() {
        $this->setUpRankingDAO();
        $result = $this->object->getRankByCity("Aracaju");
        $this->tearDownRankingDAO();
    }

    public function testGetRankByCityFalse() {
        $this->setUpRankingDAO();
        $resultFalse = $this->object->getRankByCity("adjaijaid");
        $this->tearDownRankingDAO();
    }
}
