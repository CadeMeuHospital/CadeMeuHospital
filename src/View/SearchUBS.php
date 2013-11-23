<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/profile.css" type="text/css">        
        <style>
            #first-tr{
                background-color:#B22222;
                text-align:center;
            } 
            #first-tr2{
                background-color:#FFFFFF;
                text-align:center;   

            }
        </style>

        <title> CMH - Buscar UBS</title>
    </head>
    <body>

        <div class="root">

            <?php require '../view/shared/header.php'; ?>
            <?php require '../view/shared/navigation_bar.php'; ?>

            <div class="center" >

                <?php
                $value = $_REQUEST['searchType'];
                $buscaUBS = $_REQUEST['BuscaUBS'];

                require_once '../Controller/ControllerProfileUBS.php';

                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                $arrayUBS = $controllerProfileUBS->searchUBS($buscaUBS, $value);
                ?>

                <table style="min-width:760px;">
                    <?php
                    $quantityUBS = count($arrayUBS);
                    echo "<br><p align = 'center'>Sua pesquisa retornou " . $quantityUBS . " resultados.</p><br><br>";

                    $quantityPage = ceil($quantityUBS / 10);
                    $currentPage = $_GET['page'];
                    $page = $currentPage * 10;

                    for ($i = ($page - 10); $i < $page; $i++) {


                        if (isset($arrayUBS[$i])) {
                            $nameUBS = $arrayUBS[$i]->getNameUBS();
                            $cityUBS = $arrayUBS[$i]->getCity()->getDscCidade();
                            $stateUBS = $arrayUBS[$i]->getCity()->getState()->getAcronym();
                            $idUBS = $arrayUBS[$i]->getIdUBS();

                            $path = "../view/Profile.php?id=" . $idUBS . "";
                            if ($i % 2 == 0) {
                                echo "<tr id='first-tr'><td><a href=" . $path . " class = 
                                    'linkBranco'> " . $nameUBS . " </a></td>";
                                echo "<td class = 'linkBranco'><font color = 'white'>" .
                                $cityUBS . "-" . $stateUBS . "</font></td>";
                                if ($arrayUBS[$i]->getAverage() != 0) {
                                    echo "<td><font color = 'white'>Média das avaliações:" .
                                    $arrayUBS[$i]->getAverage() . "</font></td>";
                                } else {
                                    echo "<td><font color = 'white'>UBS ainda não avaliada.</font></td></tr>";
                                }
                            } else {
                                echo "<tr id='first-tr2'><td><a href=" . $path . " class = 'linkPreto'> " .
                                $nameUBS . " </a></td>";
                                echo "<td class = 'linkPreto'><font color = 'black'>" . $cityUBS .
                                "-" . $stateUBS . "</font></td>";
                                if ($arrayUBS[$i]->getAverage() != 0) {
                                    echo "<td><font color = 'black'>Média das avaliações:" .
                                    $arrayUBS[$i]->getAverage() . "</font></td>";
                                } else {
                                    echo "<td><font color = 'black' align = 'center'>
                                        UBS ainda não avaliada.</font></td></tr>";
                                }
                            }

                            echo "</div>";
                        }
                    }
                    ?>
                </table>
            </div>
            <br>
            <div id="pagination">
                <?php
                $buscaUBSEncode = urlencode($buscaUBS);
                $firstPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.
                        php?page=1&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                $lastPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.php?page=" .
                        $quantityPage . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                $nextPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.php?page=" .
                        ($currentPage + 1) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                $prevPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.php?page=" .
                        ($currentPage - 1) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                if ($currentPage > 1) {
                    echo "<a href=" . $firstPage . ">  [<<]  </a>";
                    echo "<a href=" . $prevPage . ">  [<]  </a>";
                }

                if ($currentPage >= 6) {

                    for ($i = $currentPage - 6; $i < $currentPage + 5; $i++) {
                        $pathPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.php?page=" . ($i + 1) .
                                "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";

                        if ($i == $quantityPage - 1) {
                            if ($currentPage == $i + 1) {
                                // Write only the number of the page without any action
                                echo "<strong>" . ($i + 1) . "</strong>";
                            } else {
                                echo "<a href=" . $pathPage . "> " . ($i + 1) . " </a>";
                            }
                            break;
                        }

                        if ($currentPage == $i + 1) {
                            echo "<strong>" . ($i + 1) . "</strong>";
                        } else {
                            echo "<a href=" . $pathPage . "> " . ($i + 1) . " </a>";
                        }
                    }
                } else {
                    for ($i = 1; $i < $currentPage + 6; $i++) {
                        $pathPage = "http://localhost/CadeMeuHospital/src/view/SearchUBS.php?page=" .
                                ($i) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";


                        if ($i == $quantityPage) {
                            if ($currentPage == $i) {
                                // Write only the number of the page without any action
                                echo "<strong>" . ($i) . "</strong>";
                            } else {
                                echo "<a href=" . $pathPage . "> " . ($i) . " </a>";
                            }
                            break;
                        }

                        if ($currentPage == $i) {
                            echo "<strong>" . ($i) . "</strong> ";
                        } else {
                            echo "<a href=" . $pathPage . "> " . ($i) . " </a>";
                        }
                    }
                }
                if ($currentPage < $quantityPage) {
                    echo "<a href=" . $nextPage . ">  [>]  </a>";
                    echo "<a href=" . $lastPage . "> [>>] </a>";
                }
                ?>

            </div>
            <br /><br /><br /><br /><br /><br /><br />
            <?php require '../view/shared/footer.php'; ?>
        </div>

    </body>
</html>