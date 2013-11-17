<?php

include_once "/../Utils/dataBaseConnection.php";

class StateDAO {

    public function __construct() {
        
    }

    public function saveAverageEvaluationStateDAO($evaluate, $stateAcronym) {

        $sqlAvgCount = "SELECT SUM(ubs.average) AS average, COUNT(ubs.average) AS quantity FROM ubs
                        INNER JOIN state, municipios_ibge 
                        WHERE state.acronym = municipios_ibge.uf
                        AND state.acronym = '" . $stateAcronym . "' 
                        AND municipios_ibge.codigo = ubs.cod_munic AND ubs.average <> 0";

        $resultAvgCount = mysql_query($sqlAvgCount);
        $arrayAvgCount = mysql_fetch_row($resultAvgCount);

//        if ($arrayAvgCount[0] == null){
//            return false;
//        }

        if ($arrayAvgCount[1] > 0) {
            $average = ($arrayAvgCount[0]) / ($arrayAvgCount[1]);
            $sql = "UPDATE state SET average = '" . $average . "' WHERE acronym = '" . $stateAcronym . "'";
        } else {
            $sql = "UPDATE state SET average = '" . $evaluate . "' WHERE acronym = '" . $stateAcronym . "'";
        }

        $result = mysql_query($sql);
        return $result;
    }

    public function takeUfStateUBS($codMunic) {
        $sql = "SELECT uf FROM municipios_ibge WHERE codigo LIKE '" . $codMunic . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);
        return $state;
    }

    //Novos metodo de busca

    public function takeStateUBSOO($codMunic) {
        $ufState = $this->takeUfStateUBS($codMunic);
        
        $sql = "SELECT * FROM state WHERE acronym LIKE '" . $ufState[0] . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);
        return $state;
    }

}

?>
