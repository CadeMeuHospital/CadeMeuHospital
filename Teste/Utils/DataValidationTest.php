<?php

require_once dirname(__FILE__) . '/../../Utils/DataValidation.php';

class DataValidationTest extends PHPUnit_Framework_TestCase {

    protected $dataValidation;

    protected function setUp() {
        $this->dataValidation = new DataValidation();
    }

    protected function tearDown() {
        unset($this->dataValidation);
    }

    public function testThrowTextFieldException() {
    }
   
    public function testValidateNullFields() {
        $this->setUp();
        $resultTrue = $this->dataValidation->validateNullFields("field");
        $this->assertTrue($resultTrue);
        $resultFalse = $this->dataValidation->validateNullFields(NULL);
        $this->assertFalse($resultFalse);
        $this->tearDown();
    }

    public function testValidateTextField() {
        $this->setUp();
        $resultE2 = $this->dataValidation->validateTextField("P   ulo");
        $this->assertEquals(2,$resultE2);
        $resultE3 = $this->dataValidation->validateTextField("%123)(-");
        $this->assertEquals(1,$resultE3);
        $resultE0 = $this->dataValidation->validateTextField("paulo");
        $this->assertEquals(0,$resultE0);
        $this->tearDown();
    }
}
