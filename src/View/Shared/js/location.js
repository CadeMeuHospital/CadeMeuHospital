//var x = document.getElementById("getlocation");
//function getLocation()
//{
//    if (navigator.geolocation)
//    {
//        navigator.geolocation.getCurrentPosition(showPosition, showError);
//    }
//    else {
//        x.innerHTML = "Geolocation is not supported by this browser.";
//    }
//}
//
//function showPosition(position)
//{
//    var latlon = position.coords.latitude + "," + position.coords.longitude;
//
//    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
//            + latlon + "&zoom=14&size=400x300&sensor=false";
//    document.getElementById("mapholder").innerHTML = "<img src='" + img_url + "'>";
//}
//
//function showError(error)
//{
//    switch (error.code)
//    {
//        case error.PERMISSION_DENIED:
//            x.innerHTML = "User denied the request for Geolocation."
//            break;
//        case error.POSITION_UNAVAILABLE:
//            x.innerHTML = "Location information is unavailable."
//            break;
//        case error.TIMEOUT:
//            x.innerHTML = "The request to get user location timed out."
//            break;
//        case error.UNKNOWN_ERROR:
//            x.innerHTML = "An unknown error occurred."
//            break;
//    }
//}

function showposUser(position)
{
    var city = geoip_city();
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
//    lat = "-15.8328149"; 
//    lon = "-48.0022667";
    window.location = "ClosestUBS.php?city=" + city + "&lat=" + lat + "&lon=" + lon;
}