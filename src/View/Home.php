<?php
if (!isset($_POST['submit'])) {
    $rankType = "geral";
} else {
    $rankType = $_POST['rank'];
    $textField = $_POST['textField'];
}
$mensagemErro = "Desculpe-nos! Não há UBS avaliadas neste local! D=";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../view/shared/js/jquery-1.7.2.min.js"></script>

        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <title> CMH - Home</title>
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
                    <br><br><br>

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
                        echo '<br><br>';
                    } else {
                        echo 'Não há UBSs avaliadas. <br><br>';
                    }
                    ?>
                    <right>
                        <div class="Outline1">
                            <div id="text">Classificacao &nbsp <img src="../view/shared/img/cmhRankTitle.png" align="right" /></div>
                            <div class="Outline2">
                                <div class="TabControl">
                                    <div id="header">
                                        <ul class="abas">
                                            <li>
                                                <div class="aba">
                                                    <span style="position: relative; top: 15px; left: 100 px;"> Geral</span>
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

                    </right>

                </div>        
            </div>
            <br>
            <br>
            <?php require '../view/shared/footer.php'; ?>
        </div>
    </body>
</html>