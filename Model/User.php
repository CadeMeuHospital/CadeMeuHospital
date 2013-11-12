<?php


class User {
    private $city;
    
    function __construct($city) {
        $this->setCity($city);
    }
    public function getCity() {
        return $this->city;
    }
    public function setCity($city) {
        $this->city = $city;
    }



}

?>
