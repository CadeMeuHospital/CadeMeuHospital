<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/profile.css" type="text/css">        
        <style>
           #first-tr{background-color:#B22222;} 
           #first-tr2{background-color:#FFFFFF;}
        </style>
        
        <title> Cadê Meu Hospital - Busca</title>
    </head>
    <body>

        <div class="root">

            <?php require '../view/shared/header.php'; ?>
            <?php require '../view/shared/navigation_bar.php'; ?>

            <div class="center">

                <?php
                $value = $_REQUEST['searchType'];
                $buscaUBS = $_REQUEST['BuscaUBS'];

                require_once '../Controller/ControllerProfileUBS.php';

                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                $arrayUBS = $controllerProfileUBS->searchUBS($buscaUBS, $value);
                ?>

                <table>
                    <?php
                    $quantityUBS = count($arrayUBS);
                    echo "Sua pesquisa retornou " . $quantityUBS . " resultados.<br><br>";
                    $quantityPage = ceil($quantityUBS / 10);
                    $currentPage = $_GET['page'];
                    $page = $currentPage * 10;

                    for ($i = ($page - 10); $i < $page; $i++) {


                        if (isset($arrayUBS[$i])) {
                            $nameUBS = $arrayUBS[$i]->getNameUBS();
                            $cityUBS = $arrayUBS[$i]->getDscCidade();
                            $stateUBS = $controllerProfileUBS->takeState(($arrayUBS[$i]->getCodMunic()));
                            $idUBS = $arrayUBS[$i]->getIdUBS();
                            //$average = $controllerProfileUBS->takeAverageUBS($idUBS);

                            $path = "../view/Profile.php?id=" . $idUBS . "";
                            if ($i % 2 == 0) {
                                echo "<tr id='first-tr'><td><a href=" . $path . " class = 'linkBranco'> " . $nameUBS . " </a></td>";
                                echo "<td class = 'linkBranco'><font color = 'white'>" . $cityUBS . "-" . $stateUBS[0] . "</font></td>";
                                if ($arrayUBS[$i]->getAverage() != 0) {
                                    echo "<td>Média das avaliações:</td><td>" . $arrayUBS[$i]->getAverage() . "</td>";
                                } else {
                                    echo "<td>UBS ainda não avaliada.</td></tr>";
                                }
                            } else {
                                echo "<tr id='first-tr2'><td><a href=" . $path . " class = 'linkPreto'> " . $nameUBS . " </a></td>";
                                echo "<td class = 'linkPreto'><font color = 'black'>" . $cityUBS . "-" . $stateUBS[0] . "</font></td>";
                                if ($arrayUBS[$i]->getAverage() != 0) {
                                    echo "<td>Média das avaliações:</td><td>" . $arrayUBS[$i]->getAverage() . "</td>";
                                } else {
                                    echo "<td>UBS ainda não avaliada.</td></tr>";
                                }
                            }
                         //   echo "<tr><td>&nbsp</td></tr>";
                            echo "</div>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div id="pagination">
                    <?php
                    $buscaUBSEncode = urlencode($buscaUBS);
                    $firstPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=1&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                    $lastPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . $quantityPage . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                    $nextPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($currentPage + 1) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                    $prevPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($currentPage - 1) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";
                    if ($currentPage > 1) {
                        echo "<a href=" . $firstPage . ">  [<<]  </a>";
                        echo "<a href=" . $prevPage . ">  [<]  </a>";
                    } else {
                        //Nothing to do.
                    }

                    if ($currentPage >= 6) {

                        for ($i = $currentPage - 6; $i < $currentPage + 5; $i++) {
                            $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i + 1) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";

                            if ($i == $quantityPage - 1) {
                                if ($currentPage == $i + 1) {
                                    echo "<strong>" . ($i + 1) . "</strong>";  // Write only the number of the page without any action
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
                            $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i) . "&BuscaUBS=" . $buscaUBSEncode . "&searchType=" . $value . "";


                            if ($i == $quantityPage) {
                                if ($currentPage == $i) {
                                    echo "<strong>" . ($i) . "</strong>";  // Write only the number of the page without any action
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