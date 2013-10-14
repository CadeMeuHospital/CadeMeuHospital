<?php

include_once "/../Utils/dataBaseConnection.php";

define('NOME', 1);
define('CIDADE', 2);
define('BAIRRO', 3);
define('ID', 4);

class ProfileUBSDAO {

    public function __construct() {
        
    }

    public function searchUBS($field, $searchType) {
            if($field == ""){   
                throw new Exception ("Campo vazio!!");
            }
           else{
        switch ($searchType) {
            case NOME :
                $sql = "SELECT * FROM ubs WHERE nom_estab LIKE '" . $field . "'";
                break;
            case CIDADE :
                $sql = "SELECT * FROM ubs WHERE dsc_cidade LIKE '" . $field . "'";
                break;
            case BAIRRO :
                $sql = "SELECT * FROM ubs WHERE dsc_bairro LIKE '" . $field . "'";
                break;
        }
        $result = mysql_query($sql);       
        return $result;
            }
    }

    public function returnUBS($id) {
        $sql = " SELECT * FROM ubs WHERE cod_unico LIKE '" . $id . "'";
        $execute = mysql_query($sql);
        $result = mysql_fetch_array($execute);
        return $result;
    }

}

?>
