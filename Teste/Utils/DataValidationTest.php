<?php

require_once dirname(__FILE__) . '/../../Utils/DataValidation.php';

class DataValidationTest extends PHPUnit_Framework_TestCase {

    protected $dataValidation;

    protected function setUp() {
        $this->dataValidation = new DataValidation();
    }

    protected function tearDown() {
        
    }

    public function testThrowTextFieldException() {
    }

    public function testThrowCodMunicException() {
        $resultTrue = $this->dataValidation->throwCodMunicException("123456");
        $this->assertTrue($resultTrue);
    }

    public function testValidateNullFields() {
        $resultTrue = $this->dataValidation->validateNullFields("field");
        $this->assertTrue($resultTrue);
        $resultFalse = $this->dataValidation->validateNullFields(NULL);
        $this->assertFalse($resultFalse);
    }

    public function testValidateTextField() {
        $result = $this->dataValidation->validateTextField("Páulo");
        $this->assertEquals(2,$result);
    }

    public function testValidateCodMunic() {
        $resultTrue = $this->dataValidation->validateCodMunic("123456");
        $this->assertTrue($resultTrue);
        $resultFalse = $this->dataValidation->validateCodMunic("123");
        $this->assertFalse($resultFalse);
    }

    public function testValidateCodCNES() {
        $resultTrue = $this->dataValidation->validateCodCNES("123");
        $this->assertTrue($resultTrue);
        $resultFalse = $this->dataValidation->validateCodCNES("123c");
        $this->assertFalse($resultFalse);
    }

}
