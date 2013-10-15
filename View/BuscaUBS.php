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
                $buscaUBS = $_POST["BuscaUBS"];
                $value = $_POST["searchType"];

                require_once '../Controller/ControllerProfileUBS.php';

                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();

                try {
                    $arrayUBS = $controllerProfileUBS->searchUBS($buscaUBS, $value);
                } catch (Exception $e) {
                    echo "Tratar esse erro :/";
                }
                ?>

                <div class="profile">

                    <?php
                    $quantityResult = count($arrayUBS);
                    for ($i = 0; $i < $quantityResult; $i++) {
                        $nameUBS = $arrayUBS[$i]->getNameUBS();
                        $idUBS = $arrayUBS[$i]->getIdUBS();
                        $path = "../view/Perfil.php?id=" . $idUBS . "";
                        echo "<a href=" . $path . "> " . $nameUBS . " </a><br>";
                    }
                    ?>

                </div>
            </div>
            <br /><br /><br /><br /><br /><br /><br />
            <?php require '../view/shared/footer.php'; ?>
        </div>

    </body>
</html>


