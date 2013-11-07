
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
                    <br><br><br>
                    <form name="rankForm" action="Home.php" method="post">
                        <input type="radio" name="rank" value="geral" checked/> Geral <br>
                        <input type="radio" name="rank" value="cidade"/> Cidade <br>
                        <input type="radio" name="rank" value="bairro"/> Bairro <br>
                        <input type="submit" name="submit" value="Enviar"/>
                    </form>
                    <br><br><br><br><br><br>
                    <?php
                        
                        //$rankType = $_POST['submit'];

                        $controllerRanking = ControllerRanking::getInstanceControllerRanking();
//                        switch($rankType){
//                            case "geral":
//                                $topFiveUBS = $controllerRanking->makeRank();
//                                break;
//                            case "cidade":
//                                $topFiveUBS = $controllerRanking->makeRankByCity();
//                                break;
//                            case "bairro":
//                                $topFiveUBS = $controllerRanking->makeRankByNeighborhood();
//                                break;
//                        }
                        $topFiveUBS = $controllerRanking->makeRank();
                        for ($i=0;$i<  mysql_num_rows($topFiveUBS);$i++){
                              $nameUBS = mysql_result($topFiveUBS,$i,"nom_estab" );
                              $idUBS = mysql_result($topFiveUBS,$i,"cod_unico" );
                              $average = mysql_result($topFiveUBS,$i,"average" );

                              $path = "../view/Profile.php?id=" . $idUBS . "";
                              echo "<a href=" . $path . "> " . $nameUBS . " </a> - ".$average."<br>";
                        }
                         
                    ?>
                    
                </div>        
            </div>


            <?php require '../view/shared/footer.php'; ?>
        </div>


    </body>

</html>