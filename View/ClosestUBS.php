<?php
    require_once '../Controller/ControllerProfileUBS.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link rel="stylesheet" href="css/profile.css" type="text/css">
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
        
        <?php
        if(!isset($_REQUEST['lat'])){
        ?>
        <script onload="getLocation();">
            function getLocation(){
              if (navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(showPosition);
              }
            }
            function showPosition(position){
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                window.location="ClosestUBS.php?lat="+lat+"&lon="+lon;
            }
        </script>
        <?php
    }else{
        ?>
        
        <style>
            #mapview{display:none;}
        </style>
        
        <title> Cadê Meu Hospital - Perfil UBS </title>
    </head>

    <body>
        <div class="root">  
            <?php 
                require '../view/shared/header.php';
                require '../view/shared/navigation_bar.php';
                
                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                $userLat = $_REQUEST['lat'];
                $userLon = $_REQUEST['lon'];
                $menor = 20000;

                for ($i = 1; $i <= 15; $i++) {
                    $currentUBS = $controllerProfileUBS->returnUBS($i);

                    $distance =  $controllerProfileUBS->getDistanceBetweenTwoLatLon($userLat, $userLon ,$currentUBS->getLatitudeUBS() , $currentUBS->getLongitudeUBS());  
       
                    if ($distance < $menor) {
                        $menor = $distance;
                        $closestUBS = $currentUBS;
                    }
                }
            ?>   

            <script>
                window.location="Profile.php?id=<?php echo $closestUBS->getIdUBS();?>";
            </script>
    </body>
</html>

    <?php } ?>