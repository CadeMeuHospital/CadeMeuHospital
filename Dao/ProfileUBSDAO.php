<?php

include_once "/../Utils/dataBaseConnection.php";
include_once "/../Utils/DataValidation.php";

define('NOME', 1);
define('ESTADO', 2);
define('CIDADE', 3);
define('BAIRRO', 4);

class ProfileUBSDAO {

    public function __construct() {
        
    }

    public function searchUBSinDatabase($field, $searchType) {
        $field = trim($field);
        DataValidation::throwTextFieldException($field);
  
        switch ($searchType) {
            case NOME :
                $sql = "SELECT * FROM ubs WHERE nom_estab LIKE '%" . $field . "%'";
                break;
            case ESTADO :
                $sql = "SELECT * FROM ubs INNER JOIN municipios_ibge 
                    ON ubs.cod_munic = municipios_ibge.codigo 
                    WHERE municipios_ibge.uf LIKE '%" . $field . "%'";
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
        $result = mysql_fetch_row($execute);
        return $result;
    }

    public function searchUBSInTableEvaluate($idUBS) {
        $sql = "SELECT * FROM evaluate WHERE id_cod_unico LIKE '" . $idUBS . "'";
        $execute = mysql_query($sql);
        $result = mysql_fetch_row($execute);
        return $result;
    }

    public function saveEvaluationUBS($evaluate, $idUBS) {

        $returnConsult = ProfileUBSDAO::searchUBSInTableEvaluate($idUBS);
        if (!$returnConsult) {
            $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_" . $evaluate . ")
                        VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1)";
        } else {
            $amount_people = $returnConsult[2] + 1;
            $value_vote = $returnConsult[3] + $evaluate;
            $amount_people_x = $returnConsult[$evaluate + 3] + 1;
            $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "',
                    amount_people_" . $evaluate . "='" . $amount_people_x . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
        }

        return ProfileUBSDAO::executeComandSQL($sql, $idUBS);
    }

    public function executeComandSQL($sql, $idUBS) {
        $execute = mysql_query($sql);
        $evaluateAverage = ProfileUBSDAO::updateEvaluateAverage($idUBS);

        if ($evaluateAverage) {
            return $evaluateAverage;
        } else {
            return $execute;
        }
    }

    public function updateEvaluateAverage($idUBS) {

        $sql = "SELECT * FROM evaluate WHERE id_cod_unico LIKE '" . $idUBS . "'";
        $result = mysql_query($sql);
        $resultAverage = mysql_fetch_row($result);

        if ($resultAverage == null) {
            return false;
        }

        $evaluateAverage = $resultAverage[3] / $resultAverage[2];

        $sql = "UPDATE ubs SET average= '" . $evaluateAverage . "' WHERE cod_unico LIKE '" . $idUBS . "'";
        mysql_query($sql);
        return $evaluateAverage;
    }

    public function takeAverageUBS($idUBS) {
        $sql = "SELECT (average) FROM ubs WHERE cod_unico LIKE '" . $idUBS . "'";
        $result = mysql_query($sql);
        $average = mysql_fetch_row($result);
        return $average;
    }

    public function takeStateUBS($codMunic) {
        $sql = "SELECT uf FROM municipios_ibge WHERE codigo LIKE '" . $codMunic . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);
        return $state;
    }

}

?>