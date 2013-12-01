<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link rel="shortcut icon" href="Shared/img/favicon.ico">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CMH - Perfil UBS</title>
    </head>    
    <?php
        require_once '/../Controller/ControllerProfileUBS.php';

        $evaluate = $_POST['evaluate'];
        $idUBS = $_POST['idUBS'];

        $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();

        $return = $controllerProfileUBS->evaluateUBS($evaluate, $idUBS);

        if($return != FALSE){
            ?>
                <script language="Javascript" type="text/javascript">
                    alert("Sua avaliação foi gravada com sucesso!!Obrigado!");
                </script>
            <?php
        }else{
            ?>
                <script language="Javascript" type="text/javascript">
                    alert("Sua avaliação não foi gravada com sucesso!!desculpe-nos!");
                </script>
            <?php
        }
        ?>
        <script language="Javascript" type="text/javascript">
            window.location="Profile.php?id=<?php echo $idUBS; ?>";
        </script>
</html>

