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
        $rankingDAO = self::getInstanceControllerRanking();
        return $rankingDAO->getRank();
    }
    
    public function makeRankByCity($city) {
        $rankingDAO = self::getInstanceControllerRanking();
        return $rankingDAO->getRankByCity($city);
    }

    public function makeRankByNeighborhood($neighborhood){
        $rankingDAO = self::getInstanceControllerRanking();
        return $rankingDAO->getRankByNeighborhood($neighborhood);
    }    
}

?>
