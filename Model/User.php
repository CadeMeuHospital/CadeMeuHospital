<?php


class User {
    private $city;
    
    function __construct($city) {
        $this->city = $city;
    }
    public function getCity() {
        return $this->city;
    }


}

?>
