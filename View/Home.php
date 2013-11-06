<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <title> Cadê Meu Hospital - Home</title>
    </head>

    <body align="center">
        <div class="root">                   
            <?php 
                require '../view/shared/header.php';
                require '../view/shared/navigation_bar.php';
                require '../Controller/ControllerRanking.php'; 
            ?>            

            <div id="center">
                <div class="content"> 
                    <img src="../view/shared/img/home.jpg" align="center" />
                    
                    <?php
                         $controllerRanking = ControllerRanking::getInstanceControllerRanking();
                         $topFiveUBS = $controllerRanking->makeRank();
                         
                         for ($i=0;$i<5;$i++){
                             ?>
                                
                             <?php
                         }
                         
                    ?>
                    
                </div>        
            </div>


            <?php require '../view/shared/footer.php'; ?>
        </div>


    </body>

</html>