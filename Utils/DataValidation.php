<?php

include_once '/../Utils/Exception/TextFieldException.php';

define('SIZECODMUNIC', 6);

class DataValidation {

    public static function throwTextFieldException($textField) {

        if (!DataValidation::validateNullFields($textField)) {
            throw new TextFieldException("Campo não pode ser nulo!");
        } else {
            if (DataValidation::validateTextField($textField) == 1) {
                throw new TextFieldException("Campo contém caracteres invalidos!");
            } else {
                if (DataValidation::validateTextField($textField) == 2) {
                       throw new TextFieldException("Campo contém espaços seguidos!");
                } else {
                    return TRUE;
                }
            }
        }
        
    }
    
    public static function validateNullFields($parameter) {
        return !(empty($parameter));
    }

    public static function validateTextField($name) {

        $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($name); $i++) {
            $char = stripos($caracteresValidos, $name[$i]);
            if (!$char) {
                return 1;
            }

            if ($name[$i] == " " && $name[$i + 1] == " ") {
                return 2;
            }
        }
    }

}

?>