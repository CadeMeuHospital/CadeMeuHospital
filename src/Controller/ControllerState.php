<?php

require_once '/../Dao/StateDAO.php';
require_once '/../Model/State.php';

class ControllerState {

    private static $instanceControllerState;

    private function __construct() {
        
    }

    public static function getInstanceControllerState() {
        if (!isset(self::$instanceControllerState)) {
            self::$instanceControllerState = new ControllerState();
        } 
        return self::$instanceControllerState;
    }
    
    public function saveAverageEvaluationState(
            $evaluate, $stateAcronym) {
        $stateDAO = StateDAO::getInstanceStateDAO();
        return $stateDAO->
                saveAverageEvaluationStateDAO($evaluate, $stateAcronym);
    }
    
    public function takeState($codMunic) {
        $stateDAO = StateDAO::getInstanceStateDAO();
        $stateAcronym = $stateDAO->takeUfStateUBS($codMunic);
        return $stateAcronym;
    }
    
    //Novo metodo de busca

    public function makeObjectState($codMunic){
        $stateDAO = StateDAO::getInstanceStateDAO();
        
        $attributeState = $stateDAO->takeStateUBSOO($codMunic);
        
        $acronym = $attributeState[1];
        $amountUBS = $attributeState[2];
        $average = $attributeState[3];
        $name = $attributeState[4];
        $population = $attributeState[5];
        $area = $attributeState[6];
        
        $newState = new State($acronym, $amountUBS,
                $average, $name, $population, $area);
        
        return $newState;
    }

}
?>
