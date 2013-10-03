<?php

require_once dirname(__FILE__) . '/../../Model/profileUBS.php';

class ProfileUBSTest extends PHPUnit_Framework_TestCase {

    protected $profileUBS;

    protected function setUp() {
        $this->profileUBS = new ProfileUBS(1,"lala",456,789,123,12312345,"bom","bom","bom","bom");
    }

    protected function tearDown() {
        unset($this->profileUBS);
    }

    public function teste(){
        $this->assertEquals(1, $this->profileUBS->getIdUBS());
        $this->assertEquals("lala", $this->profileUBS->getNameUBS());
        $this->assertEquals(456, $this->profileUBS->getLatitudeUBS());
        $this->assertEquals(789, $this->profileUBS->getLongitudeUBS());
        $this->assertEquals(123, $this->profileUBS->getCodCNES());
        $this->assertEquals(12312345, $this->profileUBS->getPhoneUBS());
        $this->assertEquals("bom", $this->profileUBS->getPhysicStructureUBS());
        $this->assertEquals("bom", $this->profileUBS->getAdapOldPeople());
        $this->assertEquals("bom", $this->profileUBS->getDescriTools());
        $this->assertEquals("bom", $this->profileUBS->getDescMedicine());
        
    }
    
}

?>
