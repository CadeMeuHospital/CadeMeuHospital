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
}
