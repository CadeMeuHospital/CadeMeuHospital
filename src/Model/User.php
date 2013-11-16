<?php


class User {
    
    private $latitude;
    private $longitude;
    private $city;
    
    function __construct($latitude, $longitude, $city) {
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
        $this->setCity($city);
    }
    
    public function getCity() {
        return $this->city;
    }
    public function setCity($city) {
        $this->city = $city;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

}

?>
