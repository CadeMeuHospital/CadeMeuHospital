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

    public function testGetRankNotNull() {
        
        $this->setUpRankingDAO();
        $resultFalse = $this->object->getRank(NULL);
        $this->tearDownRankingDAO();
    }

    public function testGetRankByCity() {
        $this->setUpRankingDAO();
        $resultFalse = $this->object->getRankByCity("adjaijaid");
        $this->tearDownRankingDAO();
    }

}
