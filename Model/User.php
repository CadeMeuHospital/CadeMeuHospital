<?php

class User {
    
    private static $instanceUser;
    
    private $latitudeUser;
    private $longitudeUser;
    
    private function __construct() {
        
    }

    public function __clone() {
        
    }
    
    public function getInstanceUser(){
        
        if(!isset(self::$instanceUser)){
            self::$instanceUser = new User();
        } else {
            //No action
        }
        
        return self::$instanceUser;
    }
    
    public function getLatitudeUser() {
        return $this->latitudeUser;
    }

    public function setLatitudeUser($latitudeUser) {
        $this->latitudeUser = $latitudeUser;
    }

    public function getLongitudeUser() {
        return $this->longitudeUser;
    }

    public function setLongitudeUser($longitudeUser) {
        $this->longitudeUser = $longitudeUser;
    }

}

?>
