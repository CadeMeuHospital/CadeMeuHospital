<?php

include_once "/../Utils/dataBaseConnection.php";

define('NOME', 1);
define('CIDADE', 2);
define('BAIRRO', 3);
define('ID', 4);

class ProfileUBSDAO {

    public function __construct() {
        
    }

    public function searchUBSinDatabase($field, $searchType) {
        
        if (!DataValidation::throwTextFieldException($field)) {
            throw new TextFieldException("Campo não pode ser nulo!");
        } else {
            if (DataValidation::validateTextField($field) == 1) {
                throw new TextFieldException("Campo contém caracteres invalidos!");
            } else {
                if (DataValidation::validateTextField($field) == 2) {
                    throw new TextFieldException("Campo contém espaços seguidos!");
                } else {
                    switch ($searchType) {
                        case NOME :
                            $sql = "SELECT * FROM ubs WHERE nom_estab LIKE '%" . $field . "%'";
                            break;
                        case CIDADE :
                            $sql = "SELECT * FROM ubs WHERE dsc_cidade LIKE '%" . $field . "%'";
                            break;
                        case BAIRRO :
                            $sql = "SELECT * FROM ubs WHERE dsc_bairro LIKE '%" . $field . "%'";
                            break;
                    }
                    $result = mysql_query($sql);
                    return $result;
                }
            }
        }
        
    }

    public function returnUBS($id) {
        $sql = " SELECT * FROM ubs WHERE cod_unico LIKE '" . $id . "'";
        $execute = mysql_query($sql);
        $result = mysql_fetch_array($execute);
        return $result;
    }
    
    public function searchUBSInTableEvaluate($idUBS){
        $sql = "SELECT * FROM evaluate WHERE id_cod_unico LIKE '".$idUBS."'";
        $execute = mysql_query($sql);
        $result = mysql_fetch_array($execute);
        return $result;
    }
    
    public function saveEvaluationUBS($evaluate, $idUBS){
        
        $returnConsult = ProfileUBSDAO::searchUBSInTableEvaluate($idUBS);

        if(!$returnConsult){
            $sql = " INSERT INTO evaluate (id_cod_unico, amount_people, value_vote) VALUES ('".$idUBS."', 1, '".$evaluate."')";
        }else{
            $amount_people = $returnConsult[2] + 1;
            $value_vote = $returnConsult[3] + $evaluate;
            $sql = " UPDATE evaluate SET  amount_people='".$amount_people."', value_vote='".$value_vote."' WHERE id_evaluate='".$returnConsult[0]."'";
        }
        
        $execute = mysql_query($sql);
        return $execute;
    }
}
?>