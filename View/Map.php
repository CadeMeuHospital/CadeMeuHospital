﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../View/shared/js/location.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <title> Cadê Meu Hospital - Mapa</title>


    </head>

    <body align="center">        
        <div class="root">                   
            <?php require '../view/shared/header.php'; ?>

            <?php require '../view/shared/navigation_bar.php'; ?>


            <div class="content"> 
                <?php require '../view/shared/getlocation.php'; ?>
            </div>
            <br /><br /><br /><br /><br /><br /><br />
            <?php require '../view/shared/footer.php'; ?>
        </div>

    </body>
</html>