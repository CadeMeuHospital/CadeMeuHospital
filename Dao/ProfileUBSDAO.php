<?php

include_once "/../Utils/dataBaseConnection.php";
include_once "/../Utils/DataValidation.php";

define('NOME', 1);
define('CIDADE', 2);
define('BAIRRO', 3);

class ProfileUBSDAO {

    public function __construct() {}

    public function searchUBSinDatabase($field, $searchType) {
        $field = trim($field);
        DataValidation::throwTextFieldException($field);
            
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
            $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote) VALUES ('".$idUBS."', 1, '".$evaluate."')";
        }else{
            $amount_people = $returnConsult[2] + 1;
            $value_vote = $returnConsult[3] + $evaluate;
            $sql = "UPDATE evaluate SET  amount_people='".$amount_people."', value_vote='".$value_vote."' WHERE id_evaluate='".$returnConsult[0]."'";
        }
        
        $execute = mysql_query($sql);
        $evaluateAverage = ProfileUBSDAO::updateEvaluateAverage($idUBS);
        
        if($evaluateAverage){
            return $evaluateAverage;
        }else{
            return $execute;
        }
    }
    
    public function updateEvaluateAverage($idUBS){
        
        $sql="SELECT * FROM evaluate WHERE id_cod_unico LIKE '".$idUBS."'";
        $result = mysql_query($sql);
        
        if($result == false){
            return false;
        }
        $resultAverage = mysql_fetch_row($result);
        //var_dump($resultAverage);
        $evaluateAverage = $resultAverage[3] / $resultAverage[2];
        //$evaluateAverage = 18;
        $sql="UPDATE ubs SET average= '".$evaluateAverage."' WHERE cod_unico LIKE '".$idUBS."'";
        mysql_query($sql);
        return $evaluateAverage;
        
    }
    
    public function takeAverageUBS($idUBS){
        $sql="SELECT (average) FROM ubs WHERE cod_unico LIKE '".$idUBS."'";
        $result = mysql_query($sql);
        $average = mysql_fetch_row($result);
        return $average;
    }
}
?>
