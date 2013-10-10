<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
		<link rel="stylesheet" href="css/login.css" type="text/css">
		<script type="text/javascript" src="../View/shared/js/jquery-2.0.2.js"></script>
		<script type="text/javascript" src="../View/shared/js/jquery-ui-1.10.3.js"></script>
		<script type="text/javascript" src="../View/shared/js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../View/shared/js/scripts.js"></script>
		<script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
		<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<title> Cadê Meu Hospital - Home</title>
                
                
	</head>
	
        <body>
       <div class="root">                   
           <button onclick="getLocation()"><img src="satellite.png" width="50px" heigth="50px"></button> 
		<?php require '../view/shared/header.php';?>
            
		<?php require '../view/shared/navigation_bar.php';?>
		
		<div class="content">
		<script type="text/javascript" src="../Utils/locateUser.js" ></script>	
               <p id="demo">Click the button to get your coordinates:</p>
           <script>
           var x=document.getElementById("demo");
            function getLocation()
              {
              if (navigator.geolocation)
                {
                navigator.geolocation.getCurrentPosition(showPosition);
                 }
              else{x.innerHTML="Geolocation is not supported by this browser.";}
              }
            function showPosition(position)
              {
              x.innerHTML="Latitude: " + position.coords.latitude + 
              "<br>Longitude: " + position.coords.longitude;
              }
           </script> 
           
</body>
                </div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br />
		<?php require '../view/shared/footer.php';?>
            </div>
    
   
	</div>
</body>
</html>