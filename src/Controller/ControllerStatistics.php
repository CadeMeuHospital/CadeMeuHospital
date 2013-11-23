<?php

require_once '/../DAO/StatisticsDAO.php';
require_once 'ControllerProfileUBS.php';

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
        $statisticsDAO = new StatisticsDAO();
        $allEvaluates = $statisticsDAO->getValuesToChartAverageEvaluate();

        return $allEvaluates;
    }

    public function generateValuesToChartAverageEvaluateSingleUBS($idUBS) {
        $statisticsDAO = new StatisticsDAO();
        $evaluatesUBS = $statisticsDAO->
                getValuesToChartAverageEvaluateSigleUBS($idUBS);
        return $evaluatesUBS;
    }

    public function generateStatisticsOfQuantityAverage() {
        $statisticsDAO = new StatisticsDAO();
        $statistics = $statisticsDAO->getStatisticsByState();
        return $statistics;
    }
}

?>
