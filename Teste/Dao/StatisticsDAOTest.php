<?php

require_once dirname(__FILE__) . '/../../Dao/StatisticsDAO.php';
class StatisticsDAOTest extends PHPUnit_Framework_TestCase {

    /**
     * @var StatisticsDAO
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = StatisticsDAO::getInstanceStatisticsDAO();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers StatisticsDAO::getInstanceStatisticsDAO
     * @todo   Implement testGetInstanceStatisticsDAO().
     */
    public function testGetInstanceStatisticsDAO() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers StatisticsDAO::getValuesToChartAverageEvaluate
     * @todo   Implement testGetValuesToChartAverageEvaluate().
     */
    public function testGetValuesToChartAverageEvaluate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers StatisticsDAO::getValuesToChartAverageEvaluateSigleUBS
     * @todo   Implement testGetValuesToChartAverageEvaluateSigleUBS().
     */
    public function testGetValuesToChartAverageEvaluateSigleUBS() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
