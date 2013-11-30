<?php
require_once '/../Controller/ControllerProfileUBS.php';
require_once '/../Controller/ControllerUser.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title> CMH - UBS Mais Próxima</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/../View/Shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link rel="stylesheet" href="css/profile.css" type="text/css">
        <script type="text/javascript" src="/../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <script type="text/javascript" src="//j.maxmind.com/js/geoip.js"></script>
        <link href="/../Shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" 
              rel="stylesheet" type="text/css" />

        <?php
        if (!isset($_REQUEST['lat'])) {
            ?>
            <script type="text/javascript">
                navigator.geolocation.getCurrentPosition(showposUser);
                function showposUser(position)
                {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    window.location = "ClosestUBS.php?lat=" + lat + "&lon=" + lon;
                }
            </script>
            <?php
        } else {
            ?>
            <style>#mapview{display:none;}</style>
            
        </head>

        <body>

            <div class="root">  

                <?php
                include_once '/../View/Shared/Header.php';
                include_once '/../View/Shared/Navigation_bar.php';

                $controllerUser = ControllerUser::getInstanceControllerUser();
                $currentUser = $controllerUser->makeObjectUser($_REQUEST['lat'], $_REQUEST['lon']);
                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                $closestUBSs = $controllerProfileUBS->searchUBS($currentUser->getCity(), CIDADE);
                $menor = 20000;
                
                $countUBS = count($closestUBSs);
                
                for ($i = 0; $i < $countUBS; $i++) {
                    $currentUBS = $closestUBSs[$i];

                    $distance = $controllerProfileUBS->getDistanceBetweenTwoLatLon($currentUser->getLatitude(),
                            $currentUser->getLongitude(),$currentUBS->getLatitudeUBS(),$currentUBS->getLongitudeUBS());

                    if ($distance < $menor) {
                        $menor = $distance;
                        $closestUBS = $currentUBS;
                    }
                }
                ?>   

                <script>
                    window.location = "Profile.php?id=<?php echo $closestUBS->getIdUBS(); ?>";
                </script>
        </body>
    </html>

<?php } ?>
