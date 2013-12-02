<?php

require_once dirname(__FILE__) . '/../../src/Dao/SuggestionDAO.php';

class SuggestionDAOTest {
    
    protected $suggestionDAO;
    
    protected function setUp() {
        $this->setUpSuggestionDAO();
    }

    protected function setUpSuggestionDAO() {
        $this->suggestionDAO = SuggestionDAO::getInstanceSuggestionDAO();
    }
    
    public function tearDown() {
        unset($this->SuggestionDAO);
        $queryDel = "DELETE FROM suggestions WHERE emailUser = paulo@euler.fga";
        mysql_query($queryDel);
    }
    
    public function testSaveSuggestionInDatabaseTrue(){
        $resultTrue = $this->suggestionDAO->saveSuggestionInDatabase("paulo", "paulo@euler.fga");
        $this->assertTrue($resultTrue);
    }

    /**
     * expectedExceptionMessage "Campo não pode ser nulo!"
     */
    public function testSaveSuggestionInDatabaseFalse(){
        $this->controllerSuggestion->saveSuggestionInDatabase(" ", "asd@asd.com ");
    }
    
    /**
     * expectedExceptionMessage "E-mail inválido!"
     */
    public function testSaveEmailSuggestionInDatabaseFalse(){
        $this->controllerSuggestion->saveSuggestionInDatabase("euler", " ");
    }
}
