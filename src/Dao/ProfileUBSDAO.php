<?php

require_once "/../Utils/DataBaseConnection.php";
require_once "/../Utils/DataValidation.php";

define('NOME', 1);
define('CIDADE', 2);
define('ESTADO', 4);

class ProfileUBSDAO {

    private static $instanceProfileUBSDAO;

    private function __construct() {
        
    }

    //Singleton Pattern
    public static function getInstanceProfileUBSDAO() {

        if (!isset(self::$instanceProfileUBSDAO)) {
            self::$instanceProfileUBSDAO = new ProfileUBSDAO();
        }

        return self::$instanceProfileUBSDAO;
    }

    //Returning a UBS with that id
    public function returnUBS($idUBS) {
        $sql = " SELECT * FROM ubs WHERE cod_unico LIKE '" . $idUBS . "'";
        $result = mysql_query($sql);
        return $result;
    }

    //Searching a UBS in Table evaluate
    public function searchUBSInTableEvaluate($idUBS) {
        $sql = "SELECT * FROM evaluate WHERE id_cod_unico 
                LIKE '" . $idUBS . "'";
        $execute = mysql_query($sql);
        $result = mysql_fetch_row($execute);
        return $result;
    }

    public function saveEvaluationUBS($evaluate, $idUBS) {

        $returnConsult = self::searchUBSInTableEvaluate($idUBS);
        if (!$returnConsult) {
            $sql = "INSERT INTO evaluate (id_cod_unico, amount_people,
                    value_vote, amount_people_" . $evaluate . ")
                    VALUES ('" . $idUBS . "', 1, '" . $evaluate . "', 1)";
        } else {
            $amount_people = $returnConsult[2] + 1;
            $value_vote = $returnConsult[3] + $evaluate;
            $amount_people_x = $returnConsult[$evaluate + 3] + 1;
            $sql = "UPDATE evaluate SET  amount_people='" . $amount_people . "',
                    value_vote='" . $value_vote . "',
                    amount_people_" . $evaluate . "='" . $amount_people_x .
                    "' WHERE id_evaluate='" . $returnConsult[0] . "'";
        }

        return self::executeComandSQL($sql, $idUBS);
    }

    public function executeComandSQL($sql, $idUBS) {
        mysql_query($sql);
        $evaluateAverage = self::updateEvaluateAverage($idUBS);

        return $evaluateAverage;
    }

    public function updateEvaluateAverage($idUBS) {

        $sql = "SELECT * FROM evaluate WHERE id_cod_unico 
                LIKE '" . $idUBS . "'";
        $result = mysql_query($sql);
        $resultAverage = mysql_fetch_row($result);

        if ($resultAverage == null) {
            return false;
        }

        $evaluateAverage = $resultAverage[3] / $resultAverage[2];

        $sql = "UPDATE ubs SET average= '" . $evaluateAverage . "' 
                WHERE cod_unico LIKE '" . $idUBS . "'";
        mysql_query($sql);
        return $evaluateAverage;
    }

    public function takeAverageUBS($idUBS) {
        $sql = "SELECT (average) FROM ubs WHERE cod_unico 
                LIKE '" . $idUBS . "'";
        $result = mysql_query($sql);
        $average = mysql_fetch_row($result);
        return $average;
    }

    public function searchUBSinDatabase($field, $searchType) {
        $field = trim($field);

        DataValidation::throwTextFieldException($field);

        switch ($searchType) {
            case NOME :
                $sql = "SELECT * FROM ubs WHERE nom_estab 
                        LIKE '%" . $field . "%'";
                break;
            case ESTADO :
                $sql = "SELECT * FROM ubs INNER JOIN municipios_ibge 
                        ON ubs.cod_munic = municipios_ibge.codigo 
                        WHERE municipios_ibge.uf LIKE '%" . $field . "%'";
                break;
            case CIDADE :
                $sql = "SELECT * FROM ubs WHERE dsc_cidade 
                        LIKE '%" . $field . "%'";
                break;
        }
        $selUBS = mysql_query($sql);

        return $selUBS;
    }

}

?>