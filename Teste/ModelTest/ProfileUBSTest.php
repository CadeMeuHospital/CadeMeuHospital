<?php

require_once dirname(__FILE__) . '/../../Model/profileUBS.php';

class ProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $profileUBS;

    protected function setUp() {
        $this->profileUBS = new profileUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");
    }

    protected function tearDown() {
        unset($this->profileUBS);
    }

    public function testGetIdUBS() {

        $this->assertEquals(1, $this->profileUBS->getIdUBS());
    }
    public function testGetLatitudeUBS(){
        $this->assertEquals(456, $this->profileUBS->getLatitudeUBS());
    }
    public function testGetLongitudeUBS(){
        $this->assertEquals(789, $this->profileUBS->getLongitudeUBS());
    }
    public function testGetCodMunic(){
        $this->assertEquals(123456, $this->profileUBS->getCodMunic());
    }
    public function testGetCodCNES(){
        $this->assertEquals(224, $this->profileUBS->getCodCNES());
    }
    public function testGetNameUBS(){
        $this->assertEquals("nomeUbs", $this->profileUBS->getNameUBS());
    }
    public function testGetDescEnder(){
        $this->assertEquals("endereco", $this->profileUBS->getDescEnder());
    }
    public function testGetDscCidade(){
        $this->assertEquals("cidade", $this->profileUBS->getDscCidade());
    }
    public function testGetDescBairro(){
        $this->assertEquals("bairro", $this->profileUBS->getDescBairro());
    }
    public function testGetPhoneUBS(){
        $this->assertEquals(12312345, $this->profileUBS->getPhoneUBS());
    }
    public function testGetPhysicStructure(){
        $this->assertEquals("bom", $this->profileUBS->getPhysicStructureUBS());
    }
    public function testGetAdapOldPeople(){
        $this->assertEquals("bom", $this->profileUBS->getAdapOldPeople());
    }
    public function testGetDescriTools(){
        $this->assertEquals("bom", $this->profileUBS->getDescriTools());
    }
    public function testGetDescMedicine(){
        $this->assertEquals("bom", $this->profileUBS->getDescMedicine());
    }

}

?>
