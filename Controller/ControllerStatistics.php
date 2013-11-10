<?php

include_once '/../DAO/StatisticsDAO.php';

class ControllerStatistics {
    
    private static $instanceControllerStatistics;

    private function __construct() {
        
    }

    public static function getInstanceControllerStatistics() {
        if (!isset(self::$instanceControllerStatistics)) {
            self::$instanceControllerStatistics = new ControllerStatistics();
        } else {
            //No action
        }
        return self::$instanceControllerStatistics;
    }
    
    public function generateValuesToChartAverageEvaluate(){
        $statisticsDAO = new StatisticsDAO();
        $allEvaluates = $statisticsDAO->getValuesToChartAverageEvaluate();
        
        return $allEvaluates;
    }
    
}

?>
