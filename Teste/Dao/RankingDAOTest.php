<?php

include_once dirname(__FILE__) . "/../../Dao/RankingDAO.php";

class RankingDAOTest extends PHPUnit_Framework_TestCase {

    /**
     * @var RankingDAO
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new RankingDAO();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers RankingDAO::getRank
     * @todo   Implement testGetRank().
     */
    public function testGetRank() {
    }

    /**
     * @covers RankingDAO::getRankByCity
     * @todo   Implement testGetRankByCity().
     */
    public function testGetRankByCity() {
    }

}
