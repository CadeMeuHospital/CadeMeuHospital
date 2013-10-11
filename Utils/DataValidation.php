<?php

include_once '/../Util/Exception/InvalidNameException.php';

define('SIZECODMUNIC', 6);

class DataValidation {

    public static function throwTextFieldException($textField) {

        if (!validateNullFields($textField)) {
            throw new InvalidNameException("Campo não pode ser nulo!");
        } else {
            if (validateTextField($textField) == 1) {
                throw new InvalidNameException("Campo contém caracteres invalidos!");
            } else {
                if (validateTextField($textField) == 2) {
                    throw new InvalidNameException("Campo contém espaços seguidos!");
                } else {
                    return TRUE;
                }
            }
        }
    }

    public static function throwCodMunicException($codMunic) {
        if (validateCodMunic($codMunic)) {
            throw new CodMunicException("Codigo do municipio invalido!");
        } else {
            return TRUE;
        }
    }

    public static function validateNullFields($parameter) {
        return !(empty($parameter));
    }

    public static function validateTextField($textField) {

        $result = 0;
        $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($textField); $i++) {
            $char = stripos($validCharacters, $textField[$i]);
            if (!$char) {
                $result = 1;
            }

            if ($textField[$i] == " " && $textField[$i + 1] == " ") {
                $result = 2;
            }
        }

        return $result;
    }

    public static function validateCodMunic($codMunic) {

        $result = FALSE;
        $isNumeric = is_numeric($codMunic);
        $codSize = strlen($codMunic);

        if ($isNumeric && ($$codSize == SIZECODMUNIC)) {
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