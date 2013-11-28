<?php

require_once '/../Model/User.php'; 

class ControllerUser {
    
    private static $instanceControllerUser;
    protected $objectUser;            
    
    private function __construct() {
        
    }

    //Singleton pattern
    public static function getInstanceControllerUser() {
        if (!isset(self::$instanceControllerUser)) {
            self::$instanceControllerUser = new ControllerUser();
        }
        return self::$instanceControllerUser;
    }

    //Making a user object
    public function makeObjectUser ($latUser,$lonUser){
        $city = self::$instanceControllerUser->takeCity($latUser,$lonUser);
        $user = new User($latUser,$lonUser,$city);    
        return $user;
    }
    
    //Taking one city
    public function takeCity($latUser, $lonUser) {
        $url = "http://maps.google.com/maps/api/geocode/xml?address=".$latUser.",".$lonUser."&sensor=false";
        $xml = simplexml_load_file($url);
        $result = $xml->result;
        $vector_address = $result->address_component;
        
        $sizeVector = sizeof($vector_address);
        
        for ($i = 0; $i < $sizeVector; $i++) {
            if ($vector_address[$i]->type == "locality") {
                return $vector_address[$i]->long_name;
            }
        } 
        return false;        
    }
}
?>
