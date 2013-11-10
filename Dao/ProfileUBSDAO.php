<?php

include_once "/../Utils/dataBaseConnection.php";
include_once "/../Utils/DataValidation.php";

define('NOME', 1);
define('CIDADE', 2);
define('BAIRRO', 3);

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
            $operationType = "insert";
        } else {
            $operationType = "update";
        }

        switch ($evaluate) {
            case 1:
                $return = ProfileUBSDAO::saveEvaluation1UBS($evaluate, $idUBS, $operationType, $returnConsult);
                break;
            case 2:
                $return = ProfileUBSDAO::saveEvaluation2UBS($evaluate, $idUBS, $operationType, $returnConsult);
                break;
            case 3:
                $return = ProfileUBSDAO::saveEvaluation3UBS($evaluate, $idUBS, $operationType, $returnConsult);
                break;
            case 4:
                $return = ProfileUBSDAO::saveEvaluation4UBS($evaluate, $idUBS, $operationType, $returnConsult);
                break;
            case 5:
                $return = ProfileUBSDAO::saveEvaluation5UBS($evaluate, $idUBS, $operationType, $returnConsult);
                break;
        }
        return $return;
    }

    public function saveEvaluation1UBS($evaluate, $idUBS, $operationType, $returnConsult) {

        switch ($operationType) {
            case "insert":
                $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_1, value_vote_1) 
                        VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1, '" . $evaluate . "')";
                break;
            case "update":
                $amount_people = $returnConsult[2] + 1;
                $value_vote = $returnConsult[3] + $evaluate;
                $amount_people_1 = $returnConsult[4] + 1;
                $value_vote_1 = $returnConsult[5] + $evaluate;
                $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "', 
                    amount_people_1='" . $amount_people_1 . "', value_vote_1='" . $value_vote_1 . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
                break;
        }

        return ProfileUBSDAO::executeComandSQL($sql, $idUBS);
    }

    public function saveEvaluation2UBS($evaluate, $idUBS, $operationType, $returnConsult) {
        switch ($operationType) {
            case "insert":
                $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_2,  value_vote_2) 
                    VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1, '" . $evaluate . "')";
                 break;
            case "update":
                $amount_people = $returnConsult[2] + 1;
                $value_vote = $returnConsult[3] + $evaluate;
                $amount_people_2 = $returnConsult[6] + 1;
                $value_vote_2 = $returnConsult[7] + $evaluate;
                $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "', 
                    amount_people_2='" . $amount_people_2 . "', value_vote_2='" . $value_vote_2 . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
                 break;
        }

        return ProfileUBSDAO::executeComandSQL($sql, $idUBS);
    }

    public function saveEvaluation3UBS($evaluate, $idUBS, $operationType, $returnConsult) {
        switch ($operationType) {
            case "insert":
                $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_3,  value_vote_3) 
                    VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1, '" . $evaluate . "')";
                 break;
            case "update":
                $amount_people = $returnConsult[2] + 1;
                $value_vote = $returnConsult[3] + $evaluate;
                $amount_people_3 = $returnConsult[8] + 1;
                $value_vote_3 = $returnConsult[9] + $evaluate;
                $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "', 
                    amount_people_3='" . $amount_people_3 . "', value_vote_3='" . $value_vote_3 . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
                 break;
        }

        return ProfileUBSDAO::executeComandSQL($sql, $idUBS);
    }

    public function saveEvaluation4UBS($evaluate, $idUBS, $operationType, $returnConsult) {
        switch ($operationType) {
            case "insert":
                $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_4,  value_vote_4) 
                    VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1, '" . $evaluate . "')";
                 break;
            case "update":
                $amount_people = $returnConsult[2] + 1;
                $value_vote = $returnConsult[3] + $evaluate;
                $amount_people_4 = $returnConsult[10] + 1;
                $value_vote_4 = $returnConsult[11] + $evaluate;
                $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "', 
                    amount_people_4='" . $amount_people_4 . "', value_vote_4='" . $value_vote_4 . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
                 break;
        }

        return ProfileUBSDAO::executeComandSQL($sql, $idUBS);
    }

    public function saveEvaluation5UBS($evaluate, $idUBS, $operationType, $returnConsult) {
        switch ($operationType) {
            case "insert":
                $sql = "INSERT INTO evaluate (id_cod_unico, amount_people, value_vote, amount_people_5,  value_vote_5) 
                    VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1, '" . $evaluate . "')";
                 break;
            case "update":
                $amount_people = $returnConsult[2] + 1;
                $value_vote = $returnConsult[3] + $evaluate;
                $amount_people_5 = $returnConsult[12] + 1;
                $value_vote_5 = $returnConsult[13] + $evaluate;
                $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "', value_vote='" . $value_vote . "', 
                    amount_people_5='" . $amount_people_5 . "', value_vote_5='" . $value_vote_5 . "' WHERE id_evaluate='" . $returnConsult[0] . "'";
                 break;
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
    
}

?>