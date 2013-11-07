<?php

include_once '/../DAO/RankingDAO.php';

class ControllerRanking {

    private static $instanceControllerRanking;

    private function __construct() {
        
    }

    public static function getInstanceControllerRanking() {
        if (!isset(self::$instanceControllerRanking)) {
            self::$instanceControllerRanking = new ControllerRanking();
        } else {
            //No action
        }
        return self::$instanceControllerRanking;
    }

    public function makeRank() {
        $rankingDAO = new RankingDAO();
        return $rankingDAO->getRank();
    }
    
    public function makeRankByCity($city) {
        $rankingDAO = new RankingDAO();
        return $rankingDAO->getRankByCity($city);
    }

    public function makeRankByNeighborhood($neighborhood){
        $rankingDAO = new RankingDAO();
        return $rankingDAO->getRankByNeighborhood($neighborhood);
    }
}

?>
