<?php

include_once '/../Utils/Exception/TextFieldException.php';
include_once '/../Utils/Exception/CodMunicException.php';

define('SIZECODMUNIC', 6);

class DataValidation {

    public static function throwTextFieldException($textField) {

        if (!DataValidation::validateNullFields($textField)) {
            return FALSE;
        } else {
            if (DataValidation::validateTextField($textField) == 1) {
                return 1;
            } else {
                if (DataValidation::validateTextField($textField) == 2) {
                    return 2;
                } else {
                    return TRUE;
                }
            }
        }
        
    }
    
    public static function validateNullFields($parameter) {
        return !(empty($parameter));
    }

    public static function validateTextField($nome) {

        $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($nome); $i++) {
            $char = stripos($caracteresValidos, $nome[$i]);
            if (!$char) {
                return 1;
            }

            if ($nome[$i] == " " && $nome[$i + 1] == " ") {
                return 2;
            }
        }
    }

}

?>