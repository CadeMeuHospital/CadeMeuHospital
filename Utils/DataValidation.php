<?php

include_once '/../Utils/Exception/TextFieldException.php';
include_once '/../Utils/Exception/CodMunicException.php';

define('SIZECODMUNIC', 6);

class DataValidation {
    public static function throwTextFieldException($textField) {

        if (!DataValidation::validateNullFields($textField)) {
			return FALSE;
        } elseif(DataValidation::validateTextField($textField) == 1) {
			return 1;
        } elseif(DataValidation::validateTextField($textField) == 2) {
			return 2;
		} else {
            return TRUE;
        }
    }

    public static function throwCodMunicException($codMunic) {
        if (DataValidation::validateCodMunic($codMunic)) {
            throw new CodMunicException("Codigo do municipio invalido!");
        } else {
            return TRUE;
        }
    }

    public static function validateNullFields($parameter) {
        return !(empty($parameter));
    }

    public static function validateTextField($nome) {
        
            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            
            for ($i = 0; $i < strlen($nome); $i++) {
                $char = stripos($caracteresValidos, $nome[$i]);
                if(!$char){
                    return 1;
                }
                
                if($nome[$i] == " " && $nome[$i+1] == " "){
                    return 2;   
                }
            }
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