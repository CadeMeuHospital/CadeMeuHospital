<?php

require_once "/../Utils/DataBaseConnection.php";
require_once "/../Utils/DataValidation.php";

class SuggestionDAO {
    private static $instanceSuggestionDAO;

    private function __construct() {
        
    }

    //Singleton pattern
    public static function getInstanceSuggestionDAO() {
        
        if (!isset(self::$instanceSuggestionDAO)) {
            self::$instanceSuggestionDAO = new SuggestionDAO();
        }
        return self::$instanceSuggestionDAO;
    }
    
    public function saveSuggestionInDatabase($suggestion, $email) {
        DataValidation::throwTextFieldException($suggestion);
        DataValidation::validateEmail($email);
        
        $sql = "INSERT INTO suggestions (textSuggestions, emailUser) VALUES ('".$suggestion."', '".$email."')";
        return mysql_query($sql);
    }
}
