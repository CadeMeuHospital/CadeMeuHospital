<?php

require_once dirname(__FILE__) . '/../../Utils/DataValidation.php';

class DataValidationTest extends PHPUnit_Framework_TestCase {

    protected $dataValidation;

    protected function setUpProfileUBS() {
        $this->dataValidation = new DataValidation();
    }

    protected function tearDownProfileUBS() {
        unset($this->dataValidation);
    }

    public function testThrowTextFieldException() {
    }
   
    public function testValidateNullFieldsFalse() {
        $this->setUpProfileUBS();
        $resultFalse = $this->dataValidation->validateNullFields("field");
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();
    }
    
    public function testValidateNullFieldsTrue(){
        $this->setUpProfileUBS();
        $resultTrue = $this->dataValidation->validateNullFields(NULL);
        $this->assertTrue($resultTrue);
        $this->tearDownProfileUBS();
        
    }
    
    public function testValidadeTextFieldInvalid(){
        $this->setUpProfileUBS();
        $resultE3 = $this->dataValidation->validateTextField("%123)(-");
        $this->assertEquals(1,$resultE3);
        $this->tearDownProfileUBS();
    }
    
    public function testValidadeTextFieldValidate(){
        $this->setUpProfileUBS();
        $resultE0 = $this->dataValidation->validateTextField("paulo");
        $this->assertEquals(0,$resultE0);
        $this->tearDownProfileUBS();
    }
}
