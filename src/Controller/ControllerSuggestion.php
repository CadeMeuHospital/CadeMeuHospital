<?php

require_once '/../Dao/SuggestionDAO.php';

class ControllerSuggestion {

    private static $instanceControllerSuggestion;

    private function __construct() {
        
    }

    //Singleton pattern
    public static function getInstanceControllerSuggestion() {

        if (!isset(self::$instanceControllerSuggestion)) {
            self::$instanceControllerSuggestion = new ControllerSuggestion();
        }
        return self::$instanceControllerSuggestion;
    }

    public function saveSuggestion($suggestion, $email) {
        $suggestionDAO = SuggestionDAO::getInstanceSuggestionDAO();
        try {
            $result = $suggestionDAO->saveSuggestionInDatabase($suggestion, $email);
            return $result;
        } catch (TextFieldException $e) {
            print "<script>alert('".$e->getMessage()."')</script>";
            print "<script>window.location='../View/Contact.php'</script>";
        } catch (EmailException $e) {
            print "<script>alert('".$e->getMessage()."')</script>";
            print "<script>window.location='../View/Contact.php'</script>";
        } 
    }

}
