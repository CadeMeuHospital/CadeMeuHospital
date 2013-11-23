<?php

require_once '/../Utils/Exception/TextFieldException.php';

define('SIZECODMUNIC', 6);

class DataValidation {

    public static function throwTextFieldException($textField) {

        $result = FALSE;

        if (self::validateNullFields($textField)) {
            throw new TextFieldException("Campo não pode ser nulo!");
        } else {
            if (self::validateTextField($textField) == 1) {
                throw new TextFieldException("Campo contém caracteres invalidos!");
            } else {
                $result = TRUE;
            }
        }
        return $result;
    }

    public static function validateNullFields($parameter) {
        $result = empty($parameter);
        return $result;
    }

    public static function validateTextField($name) {
        $result = 0;
        $validChars = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù0123456789';

        $lengthName = strlen($name);
        
        for ($i = 0; $i < $lengthName; $i++) {
            $character = stripos($validChars, $name[$i]);
            if (!$character) {
                $result = 1;
            } 
        }
        return $result;
    }

}

?>