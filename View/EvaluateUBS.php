<?php
    include_once '../Controller/ControllerProfileUBS.php';
    
    $evaluate = $_POST['evaluate'];
    $idUBS = $_POST['idUBS'];

    $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    
    $return = $controllerProfileUBS->evaluateUBS($evaluate, $idUBS);
    
    if($return){
        ?>
            <script language="Javascript" type="text/javascript">
                alert("Sua avaliação foi gravada com sucesso!!Obrigado! =D");
            </script>
        <?php
    }else{
        ?>
            <script language="Javascript" type="text/javascript">
                alert("Sua avaliação não foi gravada com sucesso!!desculpe-nos! D=");
            </script>
        <?php
    }
    ?>
        <script language = "Javascript">
            window.location="https://localhost/CadeMeuHospital/view/Profile.php?id=<?php echo $idUBS; ?>";
        </script>
    <?php
 
?>

    