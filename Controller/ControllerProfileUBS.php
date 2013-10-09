<?php

include_once 'Model/profileUBS.php';
include_once 'DAO/profileUBSDAO.php';

class controllerProfileUBS {

    private static $instanceControllerProfileUBS;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function getInstanceControllerProfileUBS() {

        if (!isset(self::$instanceControllerProfileUBS)) {
            self::$instanceControllerProfileUBS = new controllerProfileUBS();
        } else {
            //No action
        }

        return self::$instanceControllerProfileUBS;
    }

    public function makeObjectUBS($idUBS, $nameUBS, $latitudeUBS, $longitudeUBS, $codCNES, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine) {
        //try{
        $profileUBS = new profileUBS($idUBS, $nameUBS, $latitudeUBS, $longitudeUBS, $codCNES, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine);
        //}catch(Exception $e){
        //    print"<script>alert('".$e->getMessage()."')</script>";
        //}
        return $profileUBS;
    }

    public function searchUBSByNameUBS($nameUBS) {

        if (!DataValidation::validateNullFields($nameUBS)) {
            throw new InvalidNameException("Nome nao pode ser nulo!");
        } else {
            if (DataValidation::validateName($nameUBS) == 1) {
                throw new InvalidNameException("Nome contem caracteres invalidos!");
            } else {
                if (DataValidation::validateName($nameUBS) == 2) {
                    throw new InvalidNameException("Nome contem espaços seguidos!");
                } else {
                    
                    $profileUBSDAO = new profileUBSDAO();

                    $attributesUBS = $profileUBSDAO->searchUBSByNameUBS($nameUBS);

                    $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
                    return $profileUBS;
                    
                }
            }
        }
    }

    public function searchUBSByDscCidade($dscCidade) {

        $profileUBSDAO = new profileUBSDAO();

        $attributesUBS = $profileUBSDAO->searchUBSByDscCidade($dscCidade);

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
        return $profileUBS;
    }

    public function searchUBSByDescBairro($descBairro) {

        $profileUBSDAO = new profileUBSDAO();

        $attributesUBS = $profileUBSDAO->searchUBSByDescBairro($descBairro);

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
        return $profileUBS;
    }

}

?>
