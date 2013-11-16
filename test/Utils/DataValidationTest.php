<?php

require_once dirname(__FILE__) . '/../../src/Utils/DataValidation.php';

class DataValidationTest extends PHPUnit_Framework_TestCase {

    protected $dataValidation;

    /* SetUp methods to inicialize the test suit */

    protected function setUp() {
        $this->setUpProfileUBS();
    }

    protected function setUpProfileUBS() {
        $this->dataValidation = new DataValidation();
    }

    /* TearDown methods to delete the suit case */

    protected function tearDown() {
        $this->tearDownProfileUBS();
    }

    protected function tearDownProfileUBS() {
        unset($this->dataValidation);
    }

    /* Method throwTextFieldException suit test case */

    /**
     * @expectedException TextFieldException
     */
    public function testThrowTextFieldExceptionThrowException() {
        $this->dataValidation->throwTextFieldException("");
    }

    /**
     * @expectedException TextFieldException
     */
    public function testThrowTextFieldExceptionInvalidChar() {
        $this->dataValidation->throwTextFieldException("%¨%#(");
    }

    public function testThrowTextFieldExceptionTrue() {
        $resultTrue = $this->dataValidation->throwTextFieldException("Tiago");
        $this->assertTrue($resultTrue);
    }

    /* Method validateNullField suit test case */

    public function testValidateNullFieldsFalse() {
        $resultFalse = $this->dataValidation->validateNullFields("field");
        $this->assertFalse($resultFalse);
    }

    public function testValidateNullFieldsTrue() {
        $resultTrue = $this->dataValidation->validateNullFields(NULL);
        $this->assertTrue($resultTrue);
    }

    public function testValidadeTextFieldInvalid() {
        $resultEquals2 = $this->dataValidation->validateTextField("%123)(-");
        $this->assertEquals(1, $resultEquals2);
    }

    public function testValidadeTextFieldValidate() {
        $resultEquals0 = $this->dataValidation->validateTextField("paulo");
        $this->assertEquals(0, $resultEquals0);
    }

}
