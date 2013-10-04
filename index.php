<?php
    //header("location: view/home.php");

    include_once "Controller/controllerProfileUBS.php";
    include_once "Model/profileUBS.php";
    include_once "DAO/profileUBSDAO.php";
    
    $t = new controllerProfileUBS();
    $profileUBS = $t->makeObjectUBS(1, "eu", 12, 13, 6811299, 12312312, "bom", "bom", "bom", "bom");
    $a = $t->searchUBSByCodCNES($profileUBS);
    echo $a;
?>