<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php

require_once '../Controller/ControllerProfileUBS.php';

$controllerProfileUBS =  ControllerProfileUBS::getInstanceControllerProfileUBS();

if(!isset($_GET['id'])) {
	header ("location: ../index.php");
}

try {
	$projeto =  $controllerProfileUBS->returnUBS($_REQUEST['id']);
} catch(Exception $e) {
	echo "Tratar esse erro :/";
}

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
		<link rel="stylesheet" href="css/login.css" type="text/css">
		<script type="text/javascript" src="../View/shared/js/jquery-2.0.2.js"></script>
		<script type="text/javascript" src="../View/shared/js/location.js"></script>
		<script type="text/javascript" src="../View/shared/js/jquery-ui-1.10.3.js"></script>
		<script type="text/javascript" src="../View/shared/js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../View/shared/js/scripts.js"></script>
		<script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
		<link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
		<title> Cadê Meu Hospital - Perfil UBS [<?php echo $profileUBS->$attributesUBS[5];?>]</title>
                
                
	</head>
	
        <body>
       <div class="root">                   
		<?php require '../view/shared/header.php';?>
            
		<?php require '../view/shared/navigation_bar.php';?>
	
		<div class="content"> 

		<?php require '../view/shared/getlocation.php';?>
                </div>
            <br /><br /><br /><br /><br /><br /><br />
		<?php require '../view/shared/footer.php';?>
            </div>
       
	</div>
</body>
</html>