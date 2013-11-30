<?php

require_once "/../Utils/DataBaseConnection.php";

class StateDAO {

    private static $instanceStateDAO;
    
    private function __construct() {
        
    }

    public static function getInstanceStateDAO() {

        if (!isset(self::$instanceStateDAO)) {
            self::$instanceStateDAO = new StateDAO();
        }

        return self::$instanceStateDAO;
    }
    
    public function saveAverageEvaluationStateDAO($evaluate, $stateAcronym) {

        $sqlAvgCount = "SELECT SUM(ubs.average) AS average, 
                        COUNT(ubs.average) AS quantity FROM ubs
                        INNER JOIN state, municipios_ibge 
                        WHERE state.acronym = municipios_ibge.uf
                        AND state.acronym = '" . $stateAcronym[0] . "' 
                        AND municipios_ibge.codigo = ubs.cod_munic 
                        AND ubs.average <> 0";

        $resultAvgCount = mysql_query($sqlAvgCount);
        $arrayAvgCount = mysql_fetch_row($resultAvgCount);

        if ($arrayAvgCount[1] > 0) {
            $average = ($arrayAvgCount[0]) / ($arrayAvgCount[1]);
            $sql = "UPDATE state SET average = '" . $average . "' 
                    WHERE acronym = '" . $stateAcronym[0] . "'";
        } else {
            $sql = "UPDATE state SET average = '" . $evaluate . "' 
                    WHERE acronym = '" . $stateAcronym[0] . "'";
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

    public function takeStateUBSOO($codMunic) {
        $ufState = $this->takeUfStateUBS($codMunic);
        
        $sql = "SELECT * FROM state WHERE acronym LIKE '" . $ufState[0] . "'";
        $result = mysql_query($sql);
        $state = mysql_fetch_row($result);
        return $state;
    }

}

?>
