<?php

class DistanceLatLon {

    //Compute the distance between two Lat/Lon Pairs
    //Haversine_formula
    public static function computeDistance($fromLat, $fromLon, $toLat, $toLon) {

        // Ensure that all are floating pontt values
        $fromLat = floatval($fromLat);
        $fromLon = floatval($fromLon);
        $toLat = floatval($toLat);
        $toLon = floatval($toLon);

        // If the same point
        if (($fromLat == $toLat) && ($fromLon == $toLon)) {
            return 0.0;
        }

        // Compute the distance with the haversine formula
        $distanceRad = acos(sin(deg2rad($fromLat)) * sin(deg2rad($toLat)) +
                cos(deg2rad($fromLat)) * cos(deg2rad($toLat)) * 
                cos(deg2rad($fromLon - $toLon)));

        $distanceDegree = rad2deg($distanceRad);

        // Distance in miles and KM - Add others if needed
        $miles = (float) $distanceDegree * 69.0;
        $kilometers = (float) $miles * 1.61;

        // Return KM = Miles * 1.61
        return round($kilometers, 2);
    }
}

?>  