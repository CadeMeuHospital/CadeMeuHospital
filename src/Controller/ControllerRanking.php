<?php

require_once '/../DAO/RankingDAO.php';

class ControllerRanking {

    private static $instanceControllerRanking;

    private function __construct() {
        
    }

    public static function getInstanceControllerRanking() {
        if (!isset(self::$instanceControllerRanking)) {
            self::$instanceControllerRanking = new ControllerRanking();
        }
        return self::$instanceControllerRanking;
    }

    public function makeRank() {
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRank();
    }
    
    public function makeRankByCity($city) {
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRankByCity($city);
    }

    public function makeRankByNeighborhood($neighborhood){
        $rankingDAO = RankingDAO::getInstanceRankingDAO();
        return $rankingDAO->getRankByNeighborhood($neighborhood);
    }    
}

?>
