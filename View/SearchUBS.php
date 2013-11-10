<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/profile.css" type="text/css">        

        <title> Cadê Meu Hospital - Busca</title>

    </head>

<body>

    <div class="root">

        <?php require '../view/shared/header.php'; ?>
        <?php require '../view/shared/navigation_bar.php'; ?>

        <div class="content"> 

            <?php
           
            $value = $_REQUEST['searchType'];
            
            if($value == "2"){
                $buscaUBS = $_REQUEST['SearchUBSbyState'];
            }else{
                $buscaUBS = $_REQUEST['BuscaUBS'];
            }
            
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

                for ($i = 0; $i < $quantityPage; $i++) {
                    if($value == "2"){
                        $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i + 1) . "&SearchUBSbyState=".$buscaUBS."&searchType=".$value."";
                    } else {
                        $pathPage = "http://localhost/CadeMeuHospital/view/SearchUBS.php?page=" . ($i + 1) . "&BuscaUBS=".$buscaUBS."&searchType=".$value."";
                    }
                    echo "<a href=" . $pathPage . "> " . ($i + 1) . " </a><br>";
                }
                ?>

            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br />
        <?php require '../view/shared/footer.php'; ?>
    </div>

</body>
</html>