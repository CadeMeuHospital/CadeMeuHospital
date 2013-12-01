<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerRanking.php';

class ControllerRankingTest extends PHPUnit_Framework_TestCase {

    protected $controllerRanking;

    protected function setUp() {
        $this->setUpControllerRanking();
    }

    protected function setUpControllerRanking() {
        $this->controllerRanking = ControllerRanking::getInstanceControllerRanking();
    }

    protected function tearDown() {
        $this->tearDownControllerRanking();
    }

    protected function tearDownControllerRanking() {
        unset($this->controllerRanking);
    }

    public function testMakeRankNotNull() {
        $resultNotNull = $this->controllerRanking->makeRank();
        $this->assertNotNull($resultNotNull);
    }
    
    public function testGetStarImageFive(){
        $resultImageFive = $this->controllerRanking->getStarImage(5);
        $this->assertEquals("<img src='Shared/img/StarFive.png' width='155' height='30'",$resultImageFive);
    }

    public function testGetStarImageFour(){
        $resultImageFour = $this->controllerRanking->getStarImage(4);
        $this->assertEquals("<img src='Shared/img/StarFour.png' width='155' height='30'",$resultImageFour);
    }
    
    public function testGetStarImageFourHalf(){
        $resultImageFourHalf = $this->controllerRanking->getStarImage(4.5);
        $this->assertEquals("<img src='Shared/img/StarFourHalf.png' width='155' height='30'",$resultImageFourHalf);
    }
    
    public function testGetStarImageThree(){
        $resultImageThree = $this->controllerRanking->getStarImage(3);
        $this->assertEquals("<img src='Shared/img/StarThree.png' width='155' height='30'",$resultImageThree);
    }
    
    public function testGetStarImageThreeHalf(){
        $resultImageThreeHalf = $this->controllerRanking->getStarImage(3.5);
        $this->assertEquals("<img src='Shared/img/StarThreeHalf.png' width='155' height='30'",$resultImageThreeHalf);
    }
    
    public function testGetStarImageTwo(){
        $resultImageTwo = $this->controllerRanking->getStarImage(2);
        $this->assertEquals("<img src='Shared/img/StarTwo.png' width='155' height='30'",$resultImageTwo);
    }
    
    public function testGetStarImageTwoHalf(){
        $resultImageTwoHalf = $this->controllerRanking->getStarImage(2.5);
        $this->assertEquals("<img src='Shared/img/StarTwoHalf.png' width='155' height='30'",$resultImageTwoHalf);
    }
    
    public function testGetStarImageOne(){
        $resultImageOne = $this->controllerRanking->getStarImage(1);
        $this->assertEquals("<img src='Shared/img/StarOne.png' width='155' height='30'",$resultImageOne);
    }
    
    public function testGetStarImageOneHalf(){
        $resultImageOneHalf = $this->controllerRanking->getStarImage(1.5);
        $this->assertEquals("<img src='Shared/img/StarOneHalf.png' width='155' height='30'",$resultImageOneHalf);
    }
    
    public function testGetStarImageHalf(){
        $resultImageHalf = $this->controllerRanking->getStarImage(0.5);
        $this->assertEquals("<img src='Shared/img/StarHalf.png' width='155' height='30'",$resultImageHalf);
    }
    
    public function testGetStarImageZero(){
        $resultImageZero = $this->controllerRanking->getStarImage(0);
        $this->assertEquals("<img src='Shared/img/NoStar.png' width='155' height='30'",$resultImageZero);
    }
}
