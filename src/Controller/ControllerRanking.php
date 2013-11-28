<?php

require_once '/../DAO/RankingDAO.php';

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
    
    //Making a Rank By City
    public function makeRankByCity($city) {
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRankByCity($city);
    }

    //Making a Rank By Neighborhood
    public function makeRankByNeighborhood($neighborhood){
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRankByNeighborhood($neighborhood);
    }    
}

?>
