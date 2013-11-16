<?php

include_once '/../Dao/StateDAO.php';

class ControllerState {

    private static $instanceControllerState;

    private function __construct() {
        
    }

    public static function getInstanceControllerState() {
        if (!isset(self::$instanceControllerState)) {
            self::$instanceControllerState = new ControllerState();
        } else {
            //No action
        }
        return self::$instanceControllerState;
    }

    
    public function saveAverageEvaluationState($evaluate, $stateAcronym) {
        $stateDAO = new StateDAO();
        return $stateDAO->saveAverageEvaluationStateDAO($evaluate, $stateAcronym);
    }

}
?>
