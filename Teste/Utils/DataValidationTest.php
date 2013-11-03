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
   
    public function testValidateNullFields() {
        $this->setUpProfileUBS();
        $resultTrue = $this->dataValidation->validateNullFields("field");
        $this->assertTrue($resultTrue);
        $resultFalse = $this->dataValidation->validateNullFields(NULL);
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();
        
    }

    public function testValidateTextField() {
        $this->setUpProfileUBS();
        $resultE2 = $this->dataValidation->validateTextField("P   ulo");
        $this->assertEquals(2,$resultE2);
        $resultE3 = $this->dataValidation->validateTextField("%123)(-");
        $this->assertEquals(1,$resultE3);
        $resultE0 = $this->dataValidation->validateTextField("paulo");
        $this->assertEquals(0,$resultE0);
        $this->tearDownProfileUBS();
    }
}
