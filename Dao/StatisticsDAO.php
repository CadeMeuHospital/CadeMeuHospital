<?php

class StatisticsDAO {
    
    private static $instanceStatisticsDAO;

    private function __construct() {
        
    }

    public static function getInstanceStatisticsDAO() {
        if (!isset(self::$instanceStatisticsDAO)) {
            self::$instanceStatisticsDAO = new StatisticsDAO();
        } else {
            //No action
        }
        return self::$instanceStatisticsDAO;
    }
    
    public function getValuesToChartAverageEvaluate(){
        $instanceStatisticsDAO = StatisticsDAO::getInstanceStatisticsDAO();
        $statisticsArray = array();
        $statisticsVote1 = $instanceStatisticsDAO->getVotes1ToChartAverageEvaluate();
        $statisticsVote2 = $instanceStatisticsDAO->getVotes2ToChartAverageEvaluate();
        $statisticsVote3 = $instanceStatisticsDAO->getVotes3ToChartAverageEvaluate();
        $statisticsVote4 = $instanceStatisticsDAO->getVotes4ToChartAverageEvaluate();
        $statisticsVote5 = $instanceStatisticsDAO->getVotes5ToChartAverageEvaluate();
        array_push($statisticsArray, $statisticsVote1);
        array_push($statisticsArray, $statisticsVote2);
        array_push($statisticsArray, $statisticsVote3);
        array_push($statisticsArray, $statisticsVote4);
        array_push($statisticsArray, $statisticsVote5);
        return $statisticsArray;
    }
    
    public function getVotes1ToChartAverageEvaluate(){
        $sql = "SELECT amount_people, value_vote, amount_people_1, value_vote_1 FROM evaluate";
        $result = mysql_query($sql);
        $return = mysql_fetch_row($result);
    }
    
    public function getVotes2ToChartAverageEvaluate(){
        $sql = "SELECT * FROM evaluate";
        $result = mysql_query($sql);
        $return = mysql_fetch_row($result);
    }
    
    public function getVotes3ToChartAverageEvaluate(){
        $sql = "SELECT * FROM evaluate";
        $result = mysql_query($sql);
        $return = mysql_fetch_row($result);
    }
    
    public function getVotes4ToChartAverageEvaluate(){
        $sql = "SELECT * FROM evaluate";
        $result = mysql_query($sql);
        $return = mysql_fetch_row($result);
    }
    
    public function getVotes5ToChartAverageEvaluate(){
        $sql = "SELECT * FROM evaluate";
        $result = mysql_query($sql);
        $return = mysql_fetch_row($result);
    }
}

?>
