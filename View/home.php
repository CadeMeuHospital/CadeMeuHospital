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
                <script src="http://localhost/CadeMeuHospital/Utils/locateUser.js"></script>
		<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<title> Cadê Meu Hospital - Home</title>
                
                <script>  
           function getLocation() {
           navigator.geolocation.getCurrentPosition(showPosition,showError);             
           var latlon=position.coords.latitude+","+position.coords.longitude;          
          alert(latlon);
                }
                 </script>
                
	</head>
	
<body onload = "getLocation();">
	<div class="root">
		
		<?php require '../view/shared/header.php';?>
		
		<?php require '../view/shared/navigation_bar.php';?>
		
		<div class="content">
			
			
			
		</div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br />
		<?php require '../view/shared/footer.php';?>
            </div>
	</div>
</body>
</html>