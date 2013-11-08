<?php

include_once '/../Model/profileUBS.php';
include_once '/../DAO/profileUBSDAO.php';
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

    public function makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $descEnder, $descBairro, $descCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine) {

        $profileUBS = new ProfileUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $descEnder, $descBairro, $descCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine);
        return $profileUBS;
    }

    public function makeObjectUBSLoop($attributeUBS, $i) {

        $idUBS = mysql_result($attributeUBS, $i, "cod_unico");
        $latitudeUBS = mysql_result($attributeUBS, $i, "vlr_latitude");
        $longitudeUBS = mysql_result($attributeUBS, $i, "vlr_longitude");
        $codMunic = mysql_result($attributeUBS, $i, "cod_munic");
        $codCNES = mysql_result($attributeUBS, $i, "cod_cnes");
        $nameUBS = mysql_result($attributeUBS, $i, "nom_estab");
        $dscEnder = mysql_result($attributeUBS, $i, "dsc_endereco");
        $dscBairro = mysql_result($attributeUBS, $i, "dsc_bairro");
        $dscCidade = mysql_result($attributeUBS, $i, "dsc_cidade");
        $phoneUBS = mysql_result($attributeUBS, $i, "dsc_telefone");
        $physicStructureUBS = mysql_result($attributeUBS, $i, "dsc_estrut_fisic_ambiencia");
        $adapOldPeople = mysql_result($attributeUBS, $i, "dsc_adap_defic_fisic_idosos");
        $descriTools = mysql_result($attributeUBS, $i, "dsc_equipamentos");
        $descMedicine = mysql_result($attributeUBS, $i, "dsc_medicamentos");

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $dscEnder, $dscBairro, $dscCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine);
        return $profileUBS;
    }

    public function searchUBS($field, $searchType) {
        try {
            $arrayUBS = array();
            $i = 0;

            $profileUBSDAO = new ProfileUBSDAO();
            $attributeUBS = $profileUBSDAO->searchUBSinDatabase($field, $searchType);
            $lines = mysql_num_rows($attributeUBS);

            while ($i < $lines) {
                $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBSLoop($attributeUBS, $i);

                array_push($arrayUBS, $profileUBS);

                $i++;
            }
            return $arrayUBS;
        } catch (Exception $e) {
            print"<script>alert('" . $e->getMessage() . "')</script>
                    <script>  window.location='http://localhost/CadeMeuHospital/view/home.php'</script>";
        }
    }

    public function returnUBS($id) {
        $profileUBSDAO = new ProfileUBSDAO();

        $attributesUBS = $profileUBSDAO->returnUBS($id);

        $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9], $attributesUBS[10], $attributesUBS[11], $attributesUBS[12], $attributesUBS[13]);
        return $profileUBS;
    }

    public function evaluateUBS($evaluate, $idUBS) {
        $profileUBSDAO = new ProfileUBSDAO();
        return $profileUBSDAO->saveEvaluationUBS($evaluate, $idUBS);
    }

    public function takeAverageUBS($idUBS) {
        $profileUBSDAO = new ProfileUBSDAO();
        return $profileUBSDAO->takeAverageUBS($idUBS);
    }
    
    public function getDistanceBetweenTwoLatLon($from_lat, $from_lon, $to_lat, $to_lon) {
        return compute_distance($from_lat, $from_lon, $to_lat, $to_lon);
    }

}

?>
