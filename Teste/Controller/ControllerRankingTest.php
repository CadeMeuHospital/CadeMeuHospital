<?php

include_once dirname(__FILE__) . '/../../Controller/ControllerRanking.php';

class ControllerRankingTest extends PHPUnit_Framework_TestCase {

    /**
     * @var ControllerRanking
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ControllerRankingTest();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers ControllerRanking::getInstanceControllerRanking
     * @todo   Implement testGetInstanceControllerRanking().
     */
    public function testGetInstanceControllerRanking() {
    }

    /**
     * @covers ControllerRanking::makeRank
     * @todo   Implement testMakeRank().
     */
    public function testMakeRank() {
    }

    /**
     * @covers ControllerRanking::makeRankByCity
     * @todo   Implement testMakeRankByCity().
     */
    public function testMakeRankByCity() {
    }

}
