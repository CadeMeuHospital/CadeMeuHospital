<?php

require_once '/../Model/User.php'; 

class ControllerUser {
    
    private static $instanceControllerUser;
    protected $objectUser;            
    
    private function __construct() {
        
    }

    public static function getInstanceControllerUser() {
        if (!isset(self::$instanceControllerUser)) {
            self::$instanceControllerUser = new ControllerUser();
        }
        return self::$instanceControllerUser;
    }

    public function makeObjectUser ($latUser,$lonUser){
        $city = self::$instanceControllerUser->takeCity($latUser,$lonUser);
        $user = new User($latUser,$lonUser,$city);    
        return $user;
    }
    
    public function takeCity($latUser, $lonUser) {
        $xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=".$latUser.
                ",".$lonUser."&sensor=false");
        $result = $xml->result;
        $vector_address = $result->address_component;
        
        for ($i = 0; $i < sizeof($vector_address); $i++) {
            if ($vector_address[$i]->type == "locality") {
                return $vector_address[$i]->long_name;
            }
        } 
        return false;        
    }
}
?>
