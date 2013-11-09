<!--<html>
<head>
  <script type="text/javascript" src="//j.maxmind.com/js/geoip.js">
  </script>

  <title>JS Example</title>
</head>

<body>

  <dl>

    <dt>City</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_city() );
      </script>
    </dd>

    <dt>Region</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_region() );
      </script>
    </dd>

    <dt>Region Name</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_region_name() );
      </script>
    </dd>

    <dt>Postal Code</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_postal_code() );
      </script>
    </dd>

    <dt>Country Code</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_country_code() );
      </script>
    </dd>

    <dt>Country Name</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_country_name() );
      </script>
    </dd>

    <dt>Latitude</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_latitude() );
      </script>
    </dd>

    <dt>Longitude</dt>
    <dd>
      <script type="text/javascript">
        document.write( geoip_longitude() );
      </script>
    </dd>

  </dl>

</body>
</html>-->
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
        <script type="text/javascript" src="../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <script type="text/javascript" src="//j.maxmind.com/js/geoip.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
        
        <?php
        if(!isset($_REQUEST['lat'])){
        ?>
            <script type="text/javascript"> 
                var city = geoip_city();
                var lat = geoip_latitude();
                var lon = geoip_longitude();
                window.location="ClosestUBS.php?city="+city+"&lat="+lat+"&lon="+lon;
            </script>
        <?php
    }else{
        ?>
        <style>#mapview{display:none;}</style>
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
                $userCity = $_REQUEST['city'];
                $closestUBSs = $controllerProfileUBS->searchUBS($userCity, 2);
                $menor = 20000;

                for ($i = 0; $i < count($closestUBSs); $i++) {
                    $currentUBS = $closestUBSs[$i];

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