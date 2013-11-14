<?php

include_once '../Model/User.php';

class ControllerUser {

    private static $instanceControllerUser;
    protected $objectUser;

    private function __construct() {
        
    }

    public static function getInstanceControllerUser() {
        if (!isset(self::$instanceControllerUser)) {
            self::$instanceControllerUser = new ControllerUser();
        } else {
            //No action
        }
        return self::$instanceControllerUser;
    }

    public function makeObjectUser($city) {
        $user = new User($city);
        return $user;
    }

    public function takeCity($latUser, $lonUser) {
        $xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=" . $latUser . "," . $lonUser . "&sensor=false");
        $result = $xml->result;
        $vector_address = $result->address_component;

        for ($i = 0; $i < sizeof($vector_address); $i++) {
            if ($vector_address[$i]->type == "locality") {
                //-15.658971399999999,-47.8080235
                $city = $vector_address[$i]->long_name;
                $user = self::$instanceControllerUser->makeObjectUser($city);
                return $user;
            } else {
                //No action
            }
        }
        return false;
    }

}

?>
