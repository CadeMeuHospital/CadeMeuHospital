<?php
if (!isset($_POST['submit'])) {
    $rankType = "geral";
} else {
    $rankType = $_POST['rank'];
    $textField = $_POST['textField'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../view/shared/js/jquery-1.7.2.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
        <script src="Shared/js/jquery.chocoslider.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="Shared/css/estilo.css"/>
        <script type="text/javascript">
            $(window).load(function() {
                $('#banner').chocoslider({
                    autoPause: true,
                    controlNavigation: true,
                    numberStrips: 10,
                    speedStrip: 1000,
                    sliderDelay: 4000,
                    transparencytitle: 0.6
                });
            });
        </script>
        <title> CMH - Home</title>
    </head>

    <body align="center">
        <div class="root">                       
            <?php
            require '../view/shared/header.php';
            require '../view/shared/navigation_bar.php';
            require '../Controller/ControllerRanking.php';
            ?> 


            <div align="center">
                <div class="content"> 


                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#content div:nth-child(1)").show();
                            $(".abas li:first div").addClass("selected");
                            $(".aba").click(function() {
                                $(".aba").removeClass("selected");
                                $(this).addClass("selected");
                                var indice = $(this).parent().index();
                                indice++;
                                $("#content div").hide();
                                $("#content div:nth-child(" + indice + ")").show();
                            });
                            $(".aba").hover(function() {
                                $(this).addClass("ativa")
                            }, function() {
                                $(this).removeClass("ativa")
                            });
                        });
                        $(elemento).hover(
                                function() {/*função a ser executada ao pôr o cursor sobre o elemento*/
                                },
                                function() {/*função a ser executada ao tirar o cursor do elemento*/
                                }
                        );

                    </script>

                    <?php
                    $controllerRanking = ControllerRanking::getInstanceControllerRanking();
                    $topFiveArray = array();
                    switch ($rankType) {
                        case "geral":
                            $topFiveUBS = $controllerRanking->makeRank();
                            $topFiveUBSG = $topFiveUBS;
                            break;
                        case "cidade":
                            $topFiveUBS = $controllerRanking->makeRankByCity($textField);
                            $topFiveUBSC = $topFiveUBS;
                            break;
                        case "bairro":
                            $topFiveUBS = $controllerRanking->makeRankByNeighborhood($textField);
                            $topFiveUBSB = $topFiveUBS;
                            break;
                    }
                    $numberUBS = mysql_num_rows($topFiveUBS);
                    if ($numberUBS > 0) {
                        for ($i = 0; $i < $numberUBS; $i++) {
                            $nameUBS = mysql_result($topFiveUBS, $i, "nom_estab");
                            $idUBS = mysql_result($topFiveUBS, $i, "cod_unico");
                            $average = mysql_result($topFiveUBS, $i, "average");

                            $path = "../view/Profile.php?id=" . $idUBS . "";
                            $completePath = "<a href=" . $path . "> " . $nameUBS . " </a> - " . $average . "<br>";
                            array_push($topFiveArray, $completePath);
                        }
                    } else {
                        echo 'Não há UBSs avaliadas. ';
                    }
                    ?>
                    <div class="banner" id="banner" >

                        <a href="http://www.fga.unb.br/">
                            <img src="Shared/img/banner1.png" alt="UnB Gama" title="Visite a WebSite da FGA!"/>
                        </a>

                        <a href="http://cnes.datasus.gov.br/" target =" _blank">
                            <img src="Shared/img/banner2.png"alt="Imagem 4" title="CNES"/>
                        </a>

                        <a href="http://www.saudeparatodosdf.com.br/" target =" _blank2">
                            <img src="Shared/img/banner4.png" alt="Imagem 4" title="Saúde para Todos!"/>
                        </a>

                        <a href="http://www2.datasus.gov.br/DATASUS/index.php" target =" _blank1">
                            <img src="Shared/img/banner3.pnng" alt="Imagem 4" title="Data SUS"/>
                        </a>
                    </div>
                    <div class="Outline1">
                        <div id="text">Classificacao &nbsp <img 
                                src="../view/shared/img/cmhRankTitle.png" align="right" /></div>
                        <div class="Outline2">
                            <div class="TabControl">
                                <div id="header">
                                    <ul class="abas">
                                        <li>
                                            <div class="aba">
                                                <span style="position: relative; top: 10px;
                                                      left: 100 px;"> Geral</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="content">
                                    <div class="conteudo">
                                        <?php
                                        $countArray = count($topFiveArray);
                                        for ($i = 0; $i < $countArray; $i++) {
                                            echo '<div class="ubs">';
                                            echo '<div id="h1">';
                                            echo $topFiveArray[$i] . "<br>";
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href='http://portalsaude.saude.gov.br/portalsaude/index.html'>
                        <img src="Shared/img/sus.png"/>
                    </a>
                </div>
                <br>
                <br>
                <br>
                <br>
                <?php require '../view/shared/footer.php'; ?>
            </div>
        </div>
    </body>
</html>