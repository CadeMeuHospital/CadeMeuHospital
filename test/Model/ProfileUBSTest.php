<?php

require_once dirname(__FILE__) . '/../../src/Model/profileUBS.php';

class ProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $profileUBS;
    
    protected function setUp(){
        $this->setUpProfileUBS();
    }

    protected function setUpProfileUBS() {
        $this->profileUBS = new profileUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom", 1);
    }
    
    protected function tearDown(){
        $this->tearDownProfileUBS();
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBS);
    }

    public function testGetIdUBS() {
        $resultEquals = $this->profileUBS->getIdUBS();
        $this->assertEquals(1, $resultEquals);
    }
    public function testGetLatitudeUBS(){
        $resultEquals = $this->profileUBS->getLatitudeUBS();
        $this->assertEquals(456, $resultEquals);
    }
    public function testGetLongitudeUBS(){
        $resultEquals = $this->profileUBS->getLongitudeUBS();
        $this->assertEquals(789, $resultEquals);
    }
    public function testGetCodMunic(){
        $resultEquals = $this->profileUBS->getCodMunic();
        $this->assertEquals(123456, $resultEquals);
    }
    public function testGetCodCNES(){
        $resultEquals = $this->profileUBS->getCodCNES();
        $this->assertEquals(224, $resultEquals);
    }
    public function testGetNameUBS(){
        $resultEquals = $this->profileUBS->getNameUBS();
        $this->assertEquals("nomeUbs", $resultEquals);
    }
    public function testGetDescEnder(){
        $resultEquals = $this->profileUBS->getDescEnder();
        $this->assertEquals("endereco", $resultEquals);
    }
    public function testGetDscCidade(){
        $resultEquals = $this->profileUBS->getDscCidade();
        $this->assertEquals("cidade", $resultEquals);
    }
    public function testGetDescBairro(){
        $resultEquals = $this->profileUBS->getDescBairro();
        $this->assertEquals("bairro", $resultEquals);
    }
    public function testGetPhoneUBS(){
        $resultEquals = $this->profileUBS->getPhoneUBS();
        $this->assertEquals(12312345, $resultEquals);
    }
    public function testGetPhysicStructure(){
        $resultEquals = $this->profileUBS->getPhysicStructureUBS();
        $this->assertEquals("bom", $resultEquals);
    }
    public function testGetAdapOldPeople(){
        $resultEquals = $this->profileUBS->getAdapOldPeople();
        $this->assertEquals("bom", $resultEquals);
    }
    public function testGetDescriTools(){
        $resultEquals = $this->profileUBS->getDescriTools();
        $this->assertEquals("bom", $resultEquals);
    }
    public function testGetDescMedicine(){
        $resultEquals = $this->profileUBS->getDescMedicine();
        $this->assertEquals("bom", $resultEquals);
    }
    public function testGetAvarageUBS(){
        $resultEquals = $this->profileUBS->getAverage();
        $this->assertEquals(1, $resultEquals);
    }
}

?>
