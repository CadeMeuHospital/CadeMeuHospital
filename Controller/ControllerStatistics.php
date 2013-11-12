<?php

include_once '/../DAO/StatisticsDAO.php';

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
    
    public function generateValuesToChartAverageEvaluateSingleUBS($idUBS){
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $evaluatesUBS = $statisticsDAO->getValuesToChartAverageEvaluateSigleUBS($idUBS);
        
        return $evaluatesUBS;
    }
    
//    public function searchQuantityOfUBSByState(){
//        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
//        $numberOfUBSByState = $statisticsDAO->getQUantityOfUBSByState();
//        return $numberOfUBSByState;
//    }
}

?>
