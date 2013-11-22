    <?php

require_once '/../Dao/CityDAO.php';
require_once '/../Model/City.php';

class ControllerCity {
    
    private static $instanceControllerCity;

    private function __construct() {
        
    }

    public static function getInstanceControllerCity() {
        
        if (!isset(self::$instanceControllerCity)) {
            self::$instanceControllerCity = new ControllerCity();
        }
        return self::$instanceControllerCity;
    }
    
    public function makeObjectCity($codMunic, $state){
        $cityDao = CityDAO::getInstanceCityDAO();
        $attributeCity = $cityDao->takeCityDatabase($codMunic);
        
        $nameCity = $attributeCity[0];
        
        $city = new City($codMunic, $nameCity, $state);
        
        return $city;
    }
}

?>