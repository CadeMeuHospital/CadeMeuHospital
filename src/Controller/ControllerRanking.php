<?php

require_once '/../Dao/RankingDAO.php';

class ControllerRanking {

    private static $instanceControllerRanking;

    private function __construct() {
        
    }

    //Singleton Pattern
    public static function getInstanceControllerRanking() {
        if (!isset(self::$instanceControllerRanking)) {
            self::$instanceControllerRanking = new ControllerRanking();
        }
        return self::$instanceControllerRanking;
    }

    //Making a Rank
    public function makeRank() {
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRank();
    }
}

?>
