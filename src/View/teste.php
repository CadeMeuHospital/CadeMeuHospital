<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
        include_once '../Controller/ControllerProfileUBS.php';
        
        $searchType = 1;
        $field = "taguatinga";
        
        $controllerProfile = ControllerProfileUBS::getInstanceControllerProfileUBS();
        $arrayUBS = $controllerProfile->searchUBSOO($field,$searchType);
        var_dump($arrayUBS[0]);
        
        ?>

    </body>
</html>
