<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/profile.css" type="text/css">        
        <style>#prev{display:none;}</style>
        <title> Cadê Meu Hospital - Busca</title>

    </head>

<body>

    <div class="root">

        <?php require '../view/shared/header.php'; ?>
        <?php require '../view/shared/navigation_bar.php'; ?>

        <div class="content"> 

            <?php
           
            $value = $_REQUEST['searchType'];
            $buscaUBS = $_REQUEST['BuscaUBS'];
            
            require_once '../Controller/ControllerProfileUBS.php';

            $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
            $arrayUBS = $controllerProfileUBS->searchUBS($buscaUBS, $value);
            ?>

            <div class="profile">

                <?php
                $quantityUBS = count($arrayUBS);
                $quantityPage = ceil($quantityUBS / 10);
                $currentPage = $_GET['page'];
                $page = $currentPage * 10;

                for ($i = ($page - 10); $i < $page; $i++) {

                    if (isset($arrayUBS[$i])) {
                        $nameUBS = $arrayUBS[$i]->getNameUBS();
                        $idUBS = $arrayUBS[$i]->getIdUBS();
                        $path = "../view/Profile.php?id=" . $idUBS . "";
                        echo "<a href=" . $path . "> " . $nameUBS . " </a><br>";
                    }
                }
                
                $firstPage= "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=1&BuscaUBS=".$buscaUBS."&searchType=".$value."";
                $lastPage= "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=".$quantityPage."&BuscaUBS=".$buscaUBS."&searchType=".$value."";
                $nextPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($currentPage + 1) . "&BuscaUBS=".$buscaUBS."&searchType=".$value."";
                $prevPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($currentPage - 1) . "&BuscaUBS=".$buscaUBS."&searchType=".$value."";
               if($currentPage > 1){
                   echo "<a href=" . $firstPage . ">  [<<]  </a>"; 
                   echo "<a href=" . $prevPage . ">  [<]  </a>"; 
               } else {
                   //Nothing to do.
               }

                if($currentPage >= 6) {
                    
                    for ($i = $currentPage-6; $i < $currentPage+5; $i++) {
                        $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i + 1) . "&BuscaUBS=".$buscaUBS."&searchType=".$value."";

                        if($i == $quantityPage-1) {
                            if($currentPage == $i+1) {
                                echo "<strong>".($i+1)."</strong>";  // Write only the number of the page without any action
                            } else {
                                echo "<a href=" . $pathPage . "> " . ($i + 1) . " </a>";
                            }
                            break;
                        }
                        
                        if($currentPage == $i+1) {
                            echo "<strong>".($i+1)."</strong>";
                        } else {
                            echo "<a href=" . $pathPage . "> " . ($i + 1) . " </a>";
                        }                                           
                    }
                } else {
                     for ($i = 1; $i < $currentPage+6; $i++) {
                        $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i) . "&BuscaUBS=".$buscaUBS."&searchType=".$value."";

                        if($currentPage == $i) {
                            echo "<strong>".($i)."</strong> "; 
                        } else {
                            echo "<a href=" . $pathPage . "> " . ($i) . " </a>";
                        }
                    }
                }
                if( $currentPage < $quantityPage ) {
                    echo "<a href=" . $nextPage . ">  [>]  </a>";
                    echo "<a href=" . $lastPage . "> [>>] </a>";
                }

                ?>

            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br />
        <?php require '../view/shared/footer.php'; ?>
    </div>

</body>
</html>