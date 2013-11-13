<?php

include_once '/../DAO/StatisticsDAO.php';
include_once 'ControllerProfileUBS.php';

class ControllerStatistics {

    private static $instanceControllerStatistics;

    private function __construct() {
        
    }

    public static function getInstanceControllerStatistics() {
        if (!isset(self::$instanceControllerStatistics)) {
            self::$instanceControllerStatistics = new ControllerStatistics();
        }
        return self::$instanceControllerStatistics;
    }

    public function generateValuesToChartAverageEvaluate() {
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $allEvaluates = $statisticsDAO->getValuesToChartAverageEvaluate();

        return $allEvaluates;
    }

    public function generateValuesToChartAverageEvaluateSingleUBS($idUBS) {
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $evaluatesUBS = $statisticsDAO->getValuesToChartAverageEvaluateSigleUBS($idUBS);

        return $evaluatesUBS;
    }

    public function generateStatisticsOfQuantityAverage() {
        $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
        $arrayStates = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA",
            "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN",
            "RS", "RO", "RR", "SC", "SP", "SE", "TO"]; //MELHORAR ISSO FUTURAMENTE!!

        $numberOfUBSByState = array();
        $averageOfUBSByState = array();
        for ($i = 0; $i < count($arrayStates); $i++) {
            $arrayUBS = $controllerProfileUBS->searchUBS($arrayStates[$i], 4);
            $quantityOfUBSByState = count($arrayUBS);
            $soma = array();
            $quantityOfValidUBSByState = 0;

            for ($j = 0; $j < $quantityOfUBSByState; $j++) {
                $ubs = $arrayUBS[$j];
                $average = $ubs->getAverage();
                if ($average != 0) {
                    $quantityOfValidUBSByState++;
                    array_push($soma, $average);
                }
            }

            if ($quantityOfValidUBSByState == 0) {
                $quantityOfValidUBSByState = 1;
            }

            $averageByState = array_sum($soma) / $quantityOfValidUBSByState;
            array_push($numberOfUBSByState, $quantityOfUBSByState);
            array_push($averageOfUBSByState, $averageByState);
        }
        $result = array();
        array_push($result, $numberOfUBSByState);
        array_push($result, $averageOfUBSByState);
        return $result;
    }

}

?>
