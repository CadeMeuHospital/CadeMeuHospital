<?php

class DataValidation {

    public function validateNullFields($parameter) {
        return !(empty($parameter));
        //retorna verdadeiro caso a variavel esteja vazia
        //com isso, o valor false eh invertido e enviado como true
    }

    public function validateName($nameUBS) {

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

    public function validateDscCidade($dscCidade) {

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

    public function validateDescBairro($descBairro) {

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

    public function validateCodMunic($codMunic) {

        $result = FALSE;
        $isNumeric = is_numeric($codMunic);

        if ($isNumeric) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }

        return $result;
    }

    public function validateCodCNES($codCNES) {

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
