<?php

include_once '/../Utils/Exception/TextFieldException.php';
include_once '/../Utils/Exception/CodMunicException.php';

define('SIZECODMUNIC', 6);

class DataValidation {

    public static function throwTextFieldException($textField) {

        if (DataValidation::validateNullFields($textField)) {
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

    public static function throwCodMunicException($codMunic) {
        if (!DataValidation::validateCodMunic($codMunic)) {
            throw new CodMunicException("Codigo do municipio invalido!");
        } else {
            return TRUE;
        }
    }

    public static function validateNullFields($parameter) {
        return !(empty($parameter));
    }

    public static function validateTextField($nome) {

        $result = 0;
        
        $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($nome); $i++) {
            $char = stripos($caracteresValidos, $nome[$i]);
            if (!$char) {
                $result = 1;
            }

            if ($nome[$i] == " " && $nome[$i + 1] == " ") {
                $result = 2;
            }
        }
        
        return $result;
    }

    public static function validateCodMunic($codMunic) {
        $result = FALSE;
        $isNumeric = is_numeric($codMunic);
        $codSize = strlen($codMunic);

        if ($isNumeric && ($codSize == SIZECODMUNIC)) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }

    public static function validateCodCNES($codCNES) {
        $result = FALSE;
        $isNumeric = is_numeric($codCNES);

        if ($isNumeric) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }
        return $result;
    }

}

?>