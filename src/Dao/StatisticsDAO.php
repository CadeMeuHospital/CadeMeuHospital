<?php

require_once "/../Utils/DataBaseConnection.php";

class StatisticsDAO {
    
    private static $instanceStatisticsDAO;

    public static function getInstanceStatisticsDAO() {

        if (!isset(self::$instanceStatisticsDAO)) {
            self::$instanceStatisticsDAO = new StatisticsDAO();
        }

        return self::$instanceStatisticsDAO;
    }

    public function getValuesToChartAverageEvaluate() {

        $query = "SELECT SUM(amount_people_1),SUM(amount_people_2),
            SUM(amount_people_3), 
            SUM(amount_people_4),SUM(amount_people_5) FROM evaluate";
        $result = mysql_query($query);
        $sum = mysql_fetch_row($result);
        return $sum;
    }

    public function getValuesToChartAverageEvaluateSingleUBS($idUBS) {

        $query = "SELECT amount_people_1,amount_people_2,amount_people_3,
            amount_people_4,amount_people_5 FROM evaluate 
            WHERE id_cod_unico='" . $idUBS . "'";
        $result = mysql_query($query);
        $chartValue = mysql_fetch_row($result);
        return $chartValue;
    }

    public function getStatisticsByState() {

        $statistics = array();
        $names = array();
        $averages = array();
        $amounts = array();
        $populations = array();
        $areas = array();

        for ($i = 1; $i < 28; $i++) {
            $stats = "SELECT name, amount_ubs, average, 
                    population, area FROM state WHERE id_state = '" . $i . "'";
            $result = mysql_query($stats);
            $return = mysql_fetch_row($result);
            array_push($names, $return[0]);
            array_push($averages, $return[1]);
            array_push($amounts, $return[2]);
            array_push($populations, $return[3]);
            array_push($areas, $return[4]);
        }
        array_push($statistics, $names);
        array_push($statistics, $amounts);
        array_push($statistics, $averages);
        array_push($statistics, $populations);
        array_push($statistics, $areas);

        return $statistics;
    }

}

?>
