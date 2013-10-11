<?php

include_once '/../Util/Exception/InvalidNameException.php';

define('SIZECODMUNIC', 6);

class DataValidation {
    
    public static function throwTextFieldException($textField) {
        
        if (!validateNullFields($textField)) {
            throw new InvalidNameException("Campo não pode ser nulo!");
        } else {
            if (validateName($textField) == 1) {
                throw new InvalidNameException("Campo contém caracteres invalidos!");
            } else {
                if (validateName($textField) == 2) {
                    throw new InvalidNameException("Campo contém espaços seguidos!");
                } else {
                    return TRUE;
                }
            }
        }
        
    }
    
    public static function validateNullFields($parameter) {
        return !(empty($parameter));
        //retorna verdadeiro caso a variavel esteja vazia
        //com isso, o valor false eh invertido e enviado como true
    }

    public static function validateName($nameUBS) {

        $result = 0;
        $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($nameUBS); $i++) {
            $char = stripos($validCharacters, $nameUBS[$i]);
            if (!$char) {
                $result = 1;
            }

            if ($nameUBS[$i] == " " && $nameUBS[$i + 1] == " ") {
                $result = 2;
            }
        }

        return $result;
    }

    public static function validateDscCidade($dscCidade) {

        $result = 0;
        $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($dscCidade); $i++) {
            $char = stripos($validCharacters, $dscCidade[$i]);
            if (!$char) {
                $result = 1;
            }

            if ($dscCidade[$i] == " " && $dscCidade[$i + 1] == " ") {
                $result = 2;
            }
        }

        return $result;
    }

    public static function validateDescBairro($descBairro) {

        $result = 0;
        $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($descBairro); $i++) {
            $char = stripos($validCharacters, $descBairro[$i]);
            if (!$char) {
                $result = 1;
            }

            if ($descBairro[$i] == " " && $descBairro[$i + 1] == " ") {
                $result = 2;
            }
        }

        return $result;
    }

    public static function validateCodMunic($codMunic) {

        $result = FALSE;
        $isNumeric = is_numeric($codMunic);

        if ($isNumeric) {
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