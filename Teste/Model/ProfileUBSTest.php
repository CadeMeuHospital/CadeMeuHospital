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

    public function teste() {

        $this->assertEquals(1, $this->profileUBS->getIdUBS());
        $this->assertEquals(456, $this->profileUBS->getLatitudeUBS());
        $this->assertEquals(789, $this->profileUBS->getLongitudeUBS());
        $this->assertEquals(123456, $this->profileUBS->getCodMunic());
        $this->assertEquals(224, $this->profileUBS->getCodCNES());
        $this->assertEquals("nomeUbs", $this->profileUBS->getNameUBS());
        $this->assertEquals("endereco", $this->profileUBS->getDescEnder());
        $this->assertEquals("cidade", $this->profileUBS->getDscCidade());
        $this->assertEquals("bairro", $this->profileUBS->getDescBairro());
        $this->assertEquals(12312345, $this->profileUBS->getPhoneUBS());
        $this->assertEquals("bom", $this->profileUBS->getPhysicStructureUBS());
        $this->assertEquals("bom", $this->profileUBS->getAdapOldPeople());
        $this->assertEquals("bom", $this->profileUBS->getDescriTools());
        $this->assertEquals("bom", $this->profileUBS->getDescMedicine());
    }

}

?>
