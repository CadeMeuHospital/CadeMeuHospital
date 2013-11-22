<?php

class DistanceLatLon {

    //COMPUTE THE DISTANCE BETWEEN TWO LAT/LON PAIRS
    // MAN PAGE: http://en.wikipedia.org/wiki/Haversine_formula
    public static function compute_distance($from_lat, $from_lon, $to_lat, $to_lon) {

        // ENSURE THAT ALL ARE FLOATING POINT VALUES
        $from_lat = floatval($from_lat);
        $from_lon = floatval($from_lon);
        $to_lat = floatval($to_lat);
        $to_lon = floatval($to_lon);

        // IF THE SAME POINT
        if (($from_lat == $to_lat) && ($from_lon == $to_lon)) {
            return 0.0;
        }

        // COMPUTE THE DISTANCE WITH THE HAVERSINE FORMULA
        $distanceRad = acos
                (sin(deg2rad($from_lat)) * sin(deg2rad($to_lat)) + cos(deg2rad($from_lat)) * 
                cos(deg2rad($to_lat)) * cos(deg2rad($from_lon - $to_lon))
                )
        ;

        $distanceDegree = rad2deg($distanceRad);

        // DISTANCE IN MILES AND KM - ADD OTHERS IF NEEDED
        $miles = (float) $distanceDegree * 69.0;
        $km = (float) $miles * 1.61;

        // RETURN KILOMETERS = MILES * 1.61
        return round($km, 2);
    }

}

?>  