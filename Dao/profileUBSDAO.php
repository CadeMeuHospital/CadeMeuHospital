<?php

include_once "Utils/dataBaseConnection.php";

class profileUBSDAO {
    
    public function __construct(){
    }
    
    public function searchUBSByCodCNES($codCNES){

        $sql = "SELECT * FROM ubs WHERE cod_cnes LIKE '".$codCNES."'";
        $execute = mysql_query($sql);	
        //$result = mysql_result($execute, 0, "nom_estab");
        $result = mysql_fetch_array($execute);
        
        return $result;
    }
    
}

?>
