<?php

require_once "/../Utils/dataBaseConnection.php";

class CityDAO{
    
    private static $instanceCityDAO;

    private function __construct() {
        
    }

    public static function getInstanceCityDAO() {
        
        if (!isset(self::$instanceCityDAO)) {
            self::$instanceCityDAO = new CityDAO();
        } else {
            //No action
        }
        
        return self::$instanceCityDAO;
    }
    
    public function takeCityDatabase($codMunic){
        $querySelCity = "SELECT (municipio) FROM municipios_ibge WHERE codigo = '".$codMunic."'";
        $selCity = mysql_query($querySelCity);
        $resultCity = mysql_fetch_row($selCity);
        
        return $resultCity;
    }
}

?>
