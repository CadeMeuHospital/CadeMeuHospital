<html>
    <form method="post" action="../Controller/ControllerProfileUBS.php?action=searchUBS" id="Enviar">


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

    public function searchUBS($field, $searchType) {
        try {

            $arrayUBS = array();
            $i = 0;

            $profileUBSDAO = new ProfileUBSDAO();
            $attributeUBS = $profileUBSDAO->searchUBS($field, $searchType);
            $lines =  mysql_num_rows($attributeUBS);
 

            while ($i < $lines) {

                $idUBS = mysql_result($attributeUBS, $i, "cod_unico");
                $latitudeUBS = mysql_result($attributeUBS, $i, "vlr_latitude");
                $longitudeUBS = mysql_result($attributeUBS, $i, "vlr_longitude");
                $codMunic = mysql_result($attributeUBS, $i, "cod_munic");
                $codCNES = mysql_result($attributeUBS, $i, "cod_cnes");
                $nameUBS = mysql_result($attributeUBS, $i, "nom_estab");
                $descEnder = mysql_result($attributeUBS, $i, "dsc_endereco");
                $descBairro = mysql_result($attributeUBS, $i, "dsc_bairro");
                $dscCidade = mysql_result($attributeUBS, $i, "dsc_cidade");
                $phoneUBS = mysql_result($attributeUBS, $i, "dsc_telefone");
                $physicStructureUBS = mysql_result($attributeUBS, $i, "dsc_estrut_fisic_ambiencia");
                $adapOldPeople = mysql_result($attributeUBS, $i, "dsc_adap_defic_fisic_idosos");
                $descriTools = mysql_result($attributeUBS, $i, "dsc_equipamentos");
                $descMedicine = mysql_result($attributeUBS, $i, "dsc_medicamentos");

                $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($idUBS, $latitudeUBS, $longitudeUBS, $codMunic, $codCNES, $nameUBS, $descEnder, $descBairro, $dscCidade, $phoneUBS, $physicStructureUBS, $adapOldPeople, $descriTools, $descMedicine);

                array_push($arrayUBS, $profileUBS);

                $i++;
            }  
            return $arrayUBS;
        } catch (Exception $e) {
             print"<script>alert('".$e->getMessage()."')</script>";
        }
           
    }  
    
    
    public function returnUBS($id) {
        try {

            $profileUBSDAO = new ProfileUBSDAO();

            $attributesUBS = $profileUBSDAO->returnUBS($id);

            $profileUBS = self::$instanceControllerProfileUBS->makeObjectUBS($attributesUBS[0], $attributesUBS[1], $attributesUBS[2], $attributesUBS[3], $attributesUBS[4], $attributesUBS[5], $attributesUBS[6], $attributesUBS[7], $attributesUBS[8], $attributesUBS[9], $attributesUBS[10], $attributesUBS[11], $attributesUBS[12], $attributesUBS[13]);
            return $profileUBS;
        } catch (Exception $e) {
             print"<script>alert('".$e->getMessage()."')</script>";
        }
    }

}
?>
        
        
</html>