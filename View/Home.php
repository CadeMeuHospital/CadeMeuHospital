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
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
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
                        <table>
                            <tr>
                                <th>Geral</th>
                                <td class="align-left">
                                    <input type="radio" name="rank" value="geral" checked/>
                                </td>
                            </tr>
                            <tr>
                                <th>Cidade</th>
                                <td class="align-left">
                                    <input type="radio" name="rank" value="cidade"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Bairro</th>
                                <td class="align-left">
                                    <input type="radio" name="rank" value="bairro"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-left">
                                    <input type="text" name ="textField" />
                                </td>
                            </tr>
                            <tr>
                                <td class="align-left">
                                    <input type="submit" name="submit" value="Enviar"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br><br><br><br><br><br>


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


                    <style> 
                        body{font-family:Calibri, Tahoma, Arial}
                        .TabControl{ width:100%; overflow:hidden; height:400px}
                        .TabControl #header{ width:100%; border: overflow:hidden; cursor:hand}
                        .TabControl #content{ width:100%; border: solid 1px;overflow:hidden; height:100%; }
                        .TabControl .abas{display:inline;}
                        .TabControl .abas li{float:left}
                        .aba{width:100px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
                             text-align:center; padding-top:5px; background:#3A5FCD}
                        .ativa{width:100px; height:30px; border:solid 1 px; border-radius:5px 5px 0 0;
                               text-align:center; padding-top:5px; background:#27408B;}
                        .ativa span,
                        .selected span{color:#fff}
                        .TabControl #content{background:#E5DEE2}
                        .TabControl .conteudo{width:100%; background:#E5DEE2;display:none; height:100%;color:#fff}
                        .selected{width:100px; height:30px; border:solid 1 px; border-radius:5px 5px 0 0;
                                  text-align:center; padding-top:5px; background:#E5DEE2}
                        }
                    </style>

                    <?php
                    $controllerRanking = ControllerRanking::getInstanceControllerRanking();
                    $topFiveArray = array();
                    switch ($rankType) {
                        case "geral":
                            $topFiveUBS = $controllerRanking->makeRank();
                            break;
                        case "cidade":
                            $topFiveUBS = $controllerRanking->makeRankByCity($textField);
                            break;
                        case "bairro":
                            $topFiveUBS = $controllerRanking->makeRankByNeighborhood($textField);
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
                    
                    
                    <div class="TabControl">
                        <div id="header">
                            <ul class="abas">
                                <li>
                                    <div class="aba">
                                        <span>Geral</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="aba">
                                        <span>Estado</span>
                                    </div> 
                                </li>
                                <li>
                                    <div class="aba">
                                        <span>Cidade</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="aba">
                                        <span>Bairro</span>
                                        <?php ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="content">
                            <div class="conteudo">
                            <?php 
                            for($i=0;$i<count($topFiveArray);$i++)
                            {
                                echo $topFiveArray[$i]."<br>";
                            }
                            ?>
                            </div>
                            <div class="conteudo"> Conteúdo da aba 2 </div>
                            <div class="conteudo"> Conteúdo da aba 3 </div>
                            <div class="conteudo"> Conteúdo da aba 4 </div>
                        </div>
                    </div>



                </div>        
            </div>
            <?php require '../view/shared/footer.php'; ?>
        </div>
    </body>
</html>

<?php
?>