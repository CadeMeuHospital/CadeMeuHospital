<?php

require_once dirname(__FILE__) . '/../../src/Model/ProfileUBS.php';
require_once dirname(__FILE__) . '/../../src/Model/City.php';
require_once dirname(__FILE__) . '/../../src/Model/State.php';

class ProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $profileUBS;
    protected $state;
    protected $city;

    protected function setUp() {
        $this->setUpObjects();
    }

    protected function setUpObjects() {
        $this->state = new State("DF", 123, 4, "STATE", 12345, 23456);
        $this->city = new City(123456, "CITY", $this->state);
        $this->profileUBS = new ProfileUBS(1234567, 4321, 5432, 6543, "NAME", "ENDE", 12345678, "BOM", "BOM", "BOM", "BOM", 4, $this->city);
    }

    protected function tearDown() {
        $this->tearDownProfileUBS();
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBS);
        unset($this->state);
        unset($this->city);
    }
    
    public function testGetCity(){
        $resultInstaceOf = $this->profileUBS->getCity();
        $this->assertInstanceOf('City',$resultInstaceOf);
    }

    public function testGetIdUBS() {
        $resultEquals = $this->profileUBS->getIdUBS();
        $this->assertEquals(1234567, $resultEquals);
    }

    public function testGetLatitudeUBS() {
        $resultEquals = $this->profileUBS->getLatitudeUBS();
        $this->assertEquals(4321, $resultEquals);
    }

    public function testGetLongitudeUBS() {
        $resultEquals = $this->profileUBS->getLongitudeUBS();
        $this->assertEquals(5432, $resultEquals);
    }

    public function testGetCodCNES() {
        $resultEquals = $this->profileUBS->getCodCNES();
        $this->assertEquals(6543, $resultEquals);
    }

    public function testGetNameUBS() {
        $resultEquals = $this->profileUBS->getNameUBS();
        $this->assertEquals("NAME", $resultEquals);
    }

    public function testGetDescEnder() {
        $resultEquals = $this->profileUBS->getDescEnder();
        $this->assertEquals("ENDE", $resultEquals);
    }

    public function testGetPhoneUBS() {
        $resultEquals = $this->profileUBS->getPhoneUBS();
        $this->assertEquals(12345678, $resultEquals);
    }

    public function testGetPhysicStructure() {
        $resultEquals = $this->profileUBS->getPhysicStructureUBS();
        $this->assertEquals("BOM", $resultEquals);
    }

    public function testGetAdapOldPeople() {
        $resultEquals = $this->profileUBS->getAdapOldPeople();
        $this->assertEquals("BOM", $resultEquals);
    }

    public function testGetDescriTools() {
        $resultEquals = $this->profileUBS->getDescriTools();
        $this->assertEquals("BOM", $resultEquals);
    }

    public function testGetDescMedicine() {
        $resultEquals = $this->profileUBS->getDescMedicine();
        $this->assertEquals("BOM", $resultEquals);
    }

    public function testGetAvarageUBS() {
        $resultEquals = $this->profileUBS->getAverage();
        $this->assertEquals(4, $resultEquals);
    }

}

?>
