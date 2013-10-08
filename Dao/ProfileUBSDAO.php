<?php

include_once "Utils/dataBaseConnection.php";

class profileUBSDAO {
    
    public function __construct(){
    }
    
    public function searchUBSByName($nameUBS){

        $sql = "SELECT * FROM ubs WHERE nom_estab LIKE '".$nameUBS."'";
        $execute = mysql_query($sql);	
        //$result = mysql_result($execute, 0, "nom_estab");
        $result = mysql_fetch_array($execute);
        
        return $result;
    }
    
    public function searchUBSByDscCidade($dscCidade){

        $sql = "SELECT * FROM ubs WHERE dsc_cidade LIKE '".$dscCidade."'";
        $execute = mysql_query($sql);	
        //$result = mysql_result($execute, 0, "dsc_cidade");
        $result = mysql_fetch_array($execute);
        
        return $result;
    }
    
    public function searchUBSByDscBairro($descBairro){

        $sql = "SELECT * FROM ubs WHERE dsc_bairro LIKE '".$descBairro."'";
        $execute = mysql_query($sql);	
        //$result = mysql_result($execute, 0, "dsc_bairro");
        $result = mysql_fetch_array($execute);
        
        return $result;
    }
}

?>
