<html>
    <body>
<!--    <p id="demo" align ="center"><font size="09">Click no Botão para gerar a Localizacao</font></p>
    <p align="center"><button onclick="getLocation();" >Gerar Localizacao</button></p>
    <div id="mapholder"></div>
    <script src="http://localhost/CadeMeuHospital/Utils/testlocate.js"></script> -->
        <?php
        header("location: view/home.php");

        include_once "Controller/controllerProfileUBS.php";
        include_once "Model/profileUBS.php";
        include_once "DAO/profileUBSDAO.php";

        $controllerProfileUBS = new ControllerProfileUBS();
        $profileUBS = $controllerProfileUBS->makeObjectUBS(1, "eu", 12, 13, 6811299, 12312312, "bom", "bom", "bom", "bom");
        $profileUBS2 = $controllerProfileUBS->searchUBSByCodCNES($profileUBS);

        echo $profileUBS2->getIdUBS() . "<br>";
        echo $profileUBS2->getNameUBS() . "<br>";
        echo $profileUBS2->getLatitudeUBS() . "<br>";
        echo $profileUBS2->getLongitudeUBS();
        ?>
    </body>
</html>