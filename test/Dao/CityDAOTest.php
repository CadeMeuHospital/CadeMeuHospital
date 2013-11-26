<?php

require_once dirname(__FILE__) . '/../../src/Dao/CityDAO.php';

class CityDAOTest extends PHPUnit_Framework_TestCase {

    protected $objectCityDAO;

    protected function setUp() {
        $this->objectCityDAO = CityDAO::getInstanceCityDAO();
    }
    
    protected function tearDown() {
        unset($this->objectCityDAO);
    }

    public function testGetInstanceCityDAONotNull() {
        $this->assertNotNull($this->objectCityDAO);
    }
    
    public function testGetInstanceCityDAOInstanceOf(){
        $this->assertInstanceOf("CityDAO", $this->objectCityDAO);
    }

    public function testTakeCityDatabaseNotNull() {
        $resultCity = $this->objectCityDAO->takeCityDatabase(110001);
        $this->assertNotNull($resultCity);
    }
    
    public function testTakeCityDatabaseEqualMunic(){
        $resultCity = $this->objectCityDAO->takeCityDatabase(110005);
        $municipio = $resultCity[0];
        $this->assertEquals("CEREJEIRAS",$municipio);
    }

}
