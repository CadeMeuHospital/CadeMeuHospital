
<?php

include_once '/../Model/profileUBS.php';
include_once '/../DAO/profileUBSDAO.php';
include_once '/../Utils/DataValidation.php';

class ControllerProfileUBS {

    private static $instanceControllerProfileUBS;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function getInstanceControllerProfileUBS() {

        if (!isset(self::$instanceControllerProfileUBS)) {
            self::$instanceControllerProfileUBS = new ControllerProfileUBS();
        } else {
            //No action
        }

        return self::$instanceControllerProfileUBS;
    }

    public function makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $descEnder, $descBairro, $descCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine) {
        try {
            $profileUBS = new ProfileUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $descEnder, $descBairro, $descCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine);
        } catch (Exception $e) {
            print"<script>alert('" . $e->getMessage() . "')</script>";
        }
        return $profileUBS;
    }

    public function searchUBSByNameUBS($nameUBS) {

        if (DataValidation::throwTextFieldException($nameUBS)) {

            $profileUBSDAO = new ProfileUBSDAO();

            $attributesUBS = $profileUBSDAO->searchUBSByName($nameUBS);

            $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
            return $profileUBS;
        } else {
            //Exception thrown
        }
    }

    public function searchUBSByDscCidade($dscCidade) {

        if (DataValidation::throwTextFieldException($dscCidade)) {
            
            $profileUBSDAO = new ProfileUBSDAO();

            $attributesUBS = $profileUBSDAO->searchUBSByDscCidade($dscCidade);

            $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
            return $profileUBS;
        } else {
            //Exception thrown
        }
    }

    public function searchUBSByDescBairro($descBairro) {

        if (DataValidation::throwTextFieldException($descBairro)) {
            $profileUBSDAO = new ProfileUBSDAO();

            $attributesUBS = $profileUBSDAO->searchUBSByDescBairro($descBairro);

            $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
            return $profileUBS;
        } else {
            //Exception thrown
        }
    }

}

?>
