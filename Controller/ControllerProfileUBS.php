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
        $controllerProfileUBS = new controllerProfileUBS();
        //Cria um objeto da classe controllerProfileUBSDAO

        $profileUBSDAO = new profileUBSDAO();
        //Cria um objeto da classe profileUBSDAO

        $attributesUBS = $profileUBSDAO->searchUBSByNameUBS($nameUBS);

        $profileUBS = $controllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
        return $profileUBS;
    }

    public function searchUBSByDscCidade($dscCidade) {
        $controllerProfileUBS = new controllerProfileUBS();
        //Cria um objeto da classe controllerProfileUBSDAO

        $profileUBSDAO = new profileUBSDAO();
        //Cria um objeto da classe profileUBSDAO

        $attributesUBS = $profileUBSDAO->searchUBSByDscCidade($dscCidade);

        $profileUBS = $controllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
        return $profileUBS;
    }

    public function searchUBSByDescBairro($descBairro) {


        $controllerProfileUBS = new controllerProfileUBS();
        //Cria um objeto da classe controllerProfileUBSDAO

        $profileUBSDAO = new profileUBSDAO();
        //Cria um objeto da classe profileUBSDAO

        $attributesUBS = $profileUBSDAO->searchUBSByDescBairro($descBairro);

        $profileUBS = $controllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9]);
        return $profileUBS;
    }

}

?>
