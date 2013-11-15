<?php

class StateDAO {

    public function __construct() {
        
    }


    public function saveAverageEvaluationStateDAO($evaluate, $stateAcronym) {

        $sqlAvgCount = "SELECT SUM(ubs.average) AS average, COUNT(ubs.average) AS quantity FROM ubs
                        INNER JOIN state, municipios_ibge 
                        WHERE state.acronym = municipios_ibge.uf
                        AND state.acronym = '".$stateAcronym[0]."' 
                        AND municipios_ibge.codigo = ubs.cod_munic AND ubs.average <> 0";
        
        $resultAvgCount = mysql_query($sqlAvgCount);
        $arrayAvgCount = mysql_fetch_row($resultAvgCount);
        if ($arrayAvgCount[0] == null){
            return false;
        }

        if ($arrayAvgCount[1] > 0) {  
            $average = ($arrayAvgCount[0])/($arrayAvgCount[1]);
            $sql = "UPDATE state SET average = '" . $average . "' WHERE acronym = '" . $stateAcronym[0] . "'";
        } else {
            $sql = "UPDATE state SET average = '" . $evaluate . "' WHERE acronym = '" . $stateAcronym[0] . "'";
        }
        
        $result = mysql_query($sql);
        return $result;

    }

}
?>
