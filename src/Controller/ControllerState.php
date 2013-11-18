<?php

include_once '/../Dao/StateDAO.php';
include_once '/../Model/State.php';

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
    
    public function saveAverageEvaluationState(
            $evaluate, $stateAcronym) {
        $stateDAO = new StateDAO();
        return $stateDAO->saveAverageEvaluationStateDAO($evaluate, $stateAcronym);
    }
    
    public function takeState($codMunic) {
        $stateDAO = new StateDAO();
        return $stateAcronym = $stateDAO->takeUfStateUBS($codMunic);
    }
    
    //Novo metodo de busca

    public function makeObjectState($codMunic){
        $stateDAO = new StateDAO();
        
        $attributeState = $stateDAO->takeStateUBSOO($codMunic);
        
        $acronym = $attributeState[1];
        $amountUBS = $attributeState[2];
        $average = $attributeState[3];
        $name = $attributeState[4];
        $population = $attributeState[5];
        $area = $attributeState[6];
        
        $newState = new State($acronym, $amountUBS, $average, $name, $population, $area);
        
        return $newState;
    }

}
?>
