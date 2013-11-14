<?php

include_once "/../Utils/dataBaseConnection.php";

class StatisticsDAO {

    private static $instanceStatisticsDAO;

    private function __construct() {
        
    }

    public static function getInstanceStatisticsDAO() {
        if (!isset(self::$instanceStatisticsDAO)) {
            self::$instanceStatisticsDAO = new StatisticsDAO();
        }
        return self::$instanceStatisticsDAO;
    }

    public function getValuesToChartAverageEvaluate() {

        $query = "SELECT SUM(amount_people_1),SUM(amount_people_2),SUM(amount_people_3)
            ,SUM(amount_people_4),SUM(amount_people_5) FROM evaluate";

        $result = mysql_query($query);
        $return = mysql_fetch_array($result);

        return $return;
    }

    public function getValuesToChartAverageEvaluateSigleUBS($idUBS) {

        $query = "SELECT amount_people_1,amount_people_2,amount_people_3,amount_people_4,amount_people_5 FROM evaluate WHERE id_cod_unico='" . $idUBS . "'";
        $result = mysql_query($query);
        $return = mysql_fetch_array($result);

        return $return;
    }

}

?>
