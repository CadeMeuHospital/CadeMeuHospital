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
        $arrayUBS = $controllerProfile->searchUBS($field,$searchType);
        var_dump($arrayUBS[0]->getCity()->getState());
        
        ?>

    </body>
</html>
