<?php

require_once '/../Dao/StatisticsDAO.php';

class ControllerStatistics {

    private static $instanceControllerStatistics;

    private function __construct() {
        
    }

    //Singleton Pattern
    public static function getInstanceControllerStatistics() {
        if (!isset(self::$instanceControllerStatistics)) {
            self::$instanceControllerStatistics = new ControllerStatistics();
        } 
        return self::$instanceControllerStatistics;
    }

    //Generatin values to evaluation avarage
    public function generateValuesToChartAverageEvaluate() {
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $allEvaluates = $statisticsDAO->getValuesToChartAverageEvaluate();
        return $allEvaluates;
    }

    //Generating values to single UBS evaluation avarage
    public function generateValuesToChartAverageEvaluateSingleUBS($idUBS) {
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $evaluatesUBS = $statisticsDAO->getValuesToChartAverageEvaluateSingleUBS($idUBS);
        return $evaluatesUBS;
    }

    //Generating statistics of quantity avarage
    public function generateStatisticsOfQuantityAverage() {
        $statisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $statistics = $statisticsDAO->getStatisticsByState();
        return $statistics;
    }
}

?>
