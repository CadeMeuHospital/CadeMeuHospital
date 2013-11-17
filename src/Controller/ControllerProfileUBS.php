<?php

include_once 'ControllerState.php';
include_once 'ControllerCity.php';
include_once '/../Model/profileUBS.php';
include_once '/../DAO/profileUBSDAO.php';
include_once '/../DAO/StateDAO.php';
include_once '/../Utils/DataValidation.php';
include_once '/../Utils/DistanceLatLon.php';

class ControllerProfileUBS {

    private static $instanceControllerProfileUBS;

    private function __construct() {
        
    }

    public static function getInstanceControllerProfileUBS() {
        if (!isset(self::$instanceControllerProfileUBS)) {
            self::$instanceControllerProfileUBS = new ControllerProfileUBS();
        } else {
            //No action
        }
        return self::$instanceControllerProfileUBS;
    }
    
    public function takeState($codMunic) {
        $profileUBSDAO = new ProfileUBSDAO();
        return $stateAcronym = $profileUBSDAO->takeStateUBS($codMunic);
    }
    
    public function returnUBS($id) {
        $profileUBSDAO = new ProfileUBSDAO();

        $attributesUBS = $profileUBSDAO->returnUBS($id);
        $quantity = (count($attributesUBS) - 1);

        for ($i = 0; $i < $quantity; $i++) {
            if ($attributesUBS[$i] == NULL) {
                $attributesUBS[$i] = "Indisponível";
            }
        }

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectLoop($attributesUBS,0);
        return $profileUBS;
    }

    public function evaluateUBS($evaluate, $idUBS) {
        $profileUBSDAO = new ProfileUBSDAO();
        $controllerState = ControllerState::getInstanceControllerState();
        $ubs = self::$instanceControllerProfileUBS->returnUBS($idUBS);
        //$stateAcronym = self::$instanceControllerProfileUBS->takeState($ubs->getCodMunic());
        $stateAcronym = $ubs->getCity()->getState()->getAcronym();
        $resultEvaluation = $profileUBSDAO->saveEvaluationUBS($evaluate, $idUBS);
        $controllerState->saveAverageEvaluationState($evaluate, $stateAcronym);
        return $resultEvaluation;
    }

    public function getDistanceBetweenTwoLatLon($from_lat, $from_lon, $to_lat, $to_lon) {
        return DistanceLatLon::compute_distance($from_lat, $from_lon, $to_lat, $to_lon);
    }

    //Novo metodo de procura

    public function makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codCNES, $nameUBS, $descEnder, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine, $average, $city) {
        $ubs = new ProfileUBS($idUBS, $latitudeUBS, $longitudeUBS, $codCNES, $nameUBS, $descEnder, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine, $average, $city);

        return $ubs;
    }

    public function makeObjectLoop($attributeUBS, $i) {

        $idUBS = mysql_result($attributeUBS, $i, "cod_unico");
        $latitudeUBS = mysql_result($attributeUBS, $i, "vlr_latitude");
        $longitudeUBS = mysql_result($attributeUBS, $i, "vlr_longitude");
        $codCNES = mysql_result($attributeUBS, $i, "cod_cnes");
        $nameUBS = mysql_result($attributeUBS, $i, "nom_estab");
        $dscEnder = mysql_result($attributeUBS, $i, "dsc_endereco");
        $phoneUBS = mysql_result($attributeUBS, $i, "dsc_telefone");
        $physicStructureUBS = mysql_result($attributeUBS, $i, "dsc_estrut_fisic_ambiencia");
        $adapOldPeople = mysql_result($attributeUBS, $i, "dsc_adap_defic_fisic_idosos");
        $descriTools = mysql_result($attributeUBS, $i, "dsc_equipamentos");
        $descMedicine = mysql_result($attributeUBS, $i, "dsc_medicamentos");
        $average = mysql_result($attributeUBS, $i, "average");
        
        $codMunic = mysql_result($attributeUBS, $i, "cod_munic");

        $controllerState = ControllerState::getInstanceControllerState();
        $stateUBS = $controllerState->makeObjectState($codMunic);

        $controllerCity = ControllerCity::getInstanceControllerCity();
        $cityUBS = $controllerCity->makeObjectCity($codMunic, $stateUBS);

        $ubs = self::$instanceControllerProfileUBS->makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codCNES, $nameUBS, $dscEnder, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine, $average, $cityUBS);

        return $ubs;
    }

    public function searchUBS($field, $searchType) {

        $profileUBSDAO = new ProfileUBSDAO();

        $i = 0;
        $arrayUBS = array();
        $attributesUBS = $profileUBSDAO->searchUBSinDatabase($field, $searchType);
        $lines = mysql_num_rows($attributesUBS);

        while ($i < $lines) {

            $UBS = self::$instanceControllerProfileUBS->makeObjectLoop($attributesUBS, $i);

            array_push($arrayUBS, $UBS);

            $i++;
        }
        
        return $arrayUBS;
    }

}

?>
