<?php

require_once dirname(__FILE__) . '/../../Model/profileUBS.php';

class ProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $profileUBS;

    protected function setUpProfileUBS() {
        $this->profileUBS = new profileUBS(1, 456, 789, 123456, 224, "nomeUbs", "endereco", "bairro", "cidade", 12312345, "bom", "bom", "bom", "bom");
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBS);
    }

    public function testGetIdUBS() {
        $this->setUpProfileUBS();
        $this->assertEquals(1, $this->profileUBS->getIdUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetLatitudeUBS(){
        $this->setUpProfileUBS();
        $this->assertEquals(456, $this->profileUBS->getLatitudeUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetLongitudeUBS(){
        $this->setUpProfileUBS();
        $this->assertEquals(789, $this->profileUBS->getLongitudeUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetCodMunic(){
        $this->setUpProfileUBS();
        $this->assertEquals(123456, $this->profileUBS->getCodMunic());
        $this->tearDownProfileUBS();
    }
    public function testGetCodCNES(){
        $this->setUpProfileUBS();
        $this->assertEquals(224, $this->profileUBS->getCodCNES());
        $this->tearDownProfileUBS();
    }
    public function testGetNameUBS(){
        $this->setUpProfileUBS();
        $this->assertEquals("nomeUbs", $this->profileUBS->getNameUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetDescEnder(){
        $this->setUpProfileUBS();
        $this->assertEquals("endereco", $this->profileUBS->getDescEnder());
        $this->tearDownProfileUBS();
    }
    public function testGetDscCidade(){
        $this->setUpProfileUBS();
        $this->assertEquals("cidade", $this->profileUBS->getDscCidade());
        $this->tearDownProfileUBS();
    }
    public function testGetDescBairro(){
        $this->setUpProfileUBS();
        $this->assertEquals("bairro", $this->profileUBS->getDescBairro());
        $this->tearDownProfileUBS();
    }
    public function testGetPhoneUBS(){
        $this->setUpProfileUBS();
        $this->assertEquals(12312345, $this->profileUBS->getPhoneUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetPhysicStructure(){
        $this->setUpProfileUBS();
        $this->assertEquals("bom", $this->profileUBS->getPhysicStructureUBS());
        $this->tearDownProfileUBS();
    }
    public function testGetAdapOldPeople(){
        $this->setUpProfileUBS();
        $this->assertEquals("bom", $this->profileUBS->getAdapOldPeople());
        $this->tearDownProfileUBS();
    }
    public function testGetDescriTools(){
        $this->setUpProfileUBS();
        $this->assertEquals("bom", $this->profileUBS->getDescriTools());
        $this->tearDownProfileUBS();
    }
    public function testGetDescMedicine(){
        $this->setUpProfileUBS();
        $this->assertEquals("bom", $this->profileUBS->getDescMedicine());
        $this->tearDownProfileUBS();
    }

}

?>
