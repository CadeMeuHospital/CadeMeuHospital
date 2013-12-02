<?php

require_once dirname(__FILE__) . '/../../src/Controller/ControllerSuggestion.php';
require_once dirname(__FILE__) . '/../../src/Utils/Exception/TextFieldException.php';

class ControllerSuggestionTest extends PHPUnit_Framework_TestCase {

    protected $controllerSuggestion;

    protected function setUp() {
        $this->setUpControllerSuggestion();
    }

    protected function setUpControllerSuggestion() {
        $this->controllerSuggestion = ControllerSuggestion::getInstanceControllerSuggestion();
    }
    
    public function tearDown() {
        unset($this->controllerSuggestion);
        $queryDel = "DELETE FROM suggestions WHERE emailUser = 'paulo@euler.fga'";
        mysql_query($queryDel);
    }
    
    public function testSaveSuggestionTrue(){
        $resultTrue = $this->controllerSuggestion->saveSuggestion("paulo", "paulo@euler.fga");
        $this->assertTrue($resultTrue);
    }

    /**
     * expectedExceptionMessage "Campo não pode ser nulo!"
     */
    public function testSaveSuggestionFalse(){
        $this->controllerSuggestion->saveSuggestion(" ", "asd@asd.com ");
    }
    
    /**
     * expectedExceptionMessage "E-mail inválido!"
     */
    public function testSaveEmailSuggestionFalse(){
        $this->controllerSuggestion->saveSuggestion("euler", " ");
    }
}
