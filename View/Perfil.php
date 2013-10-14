<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
require_once '../Controller/ControllerProfileUBS.php';

$controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();

if (!isset($_GET['id'])) {
    header("location: ../index.php");
}

try {
    $profileUBS = $controllerProfileUBS->returnUBS($_REQUEST['id']);
} catch (Exception $e) {
    echo($e->getMessage("erro ao capturar id"));
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="../view//shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link rel="stylesheet" href="css/profile.css" type="text/css">
        <title> Cadê Meu Hospital - Perfil UBS <?php echo $profileUBS->getNameUBS(); ?></title>


    </head>

    <body>
        <div class="root">                   
            <?php require '../view/shared/header.php'; ?>

            <?php require '../view/shared/navigation_bar.php'; ?>



            <div class="profile"> 
                <h2 style="text-indent:30px;">
                    <?php echo $profileUBS->getNameUBS(); ?>
                </h2>
                <div class="content">

                    <table id="tabela-dados-UBS" style="text-align: left; width:800px;">
                        <tr>
                            <th>Nome:</th>
                            <td class="align-left"><?php echo $profileUBS->getNameUBS(); ?></td>
                        </tr>
                        <tr>
                            <th>Código do Municipio</th>
                            <td class="align-left"><?php echo $profileUBS->getCodMunic(); ?></td>
                        </tr>
                        <tr>
                            <th>Código CNES:</th>
                            <td class="align-left"><?php echo $profileUBS->getCodCNES(); ?></td>
                        </tr>
                        <tr>
                            <th>Descrição do Endereço:</th>
                            <td class="align-left"><?php echo $profileUBS->getDescEnder(); ?></td>
                        </tr>
                        <th>Bairro: </th>
                        <td class="align-left"><?php echo $profileUBS->getDescBairro(); ?></td>
                        </tr>
                        <th>Cidade:</th>
                        <td class="align-left"><?php echo $profileUBS->getDscCidade(); ?></td>
                        </tr>
                        <th>Telefone:</th>
                        <td class="align-left"><?php echo $profileUBS->getPhoneUBS(); ?></td>
                        </tr>
                        <th>Estrutura Física:</th>
                        <td class="align-left"><?php echo $profileUBS->getPhysicStructureUBS(); ?></td>
                        </tr>
                        <th>Adaptação das Pessoas Idosas:</th>
                        <td class="align-left"><?php echo $profileUBS->getAdapOldPeople(); ?></td>
                        </tr>
                        <th>Ferramentas:</th>
                        <td class="align-left"><?php echo $profileUBS->getDescriTools(); ?></td>
                        </tr>
                        <th>Descrição dos Remédios:</th>
                        <td class="align-left"><?php echo $profileUBS->getDescMedicine(); ?></td>
                        </tr>								
                    </table>

                    <br />

                </div>

                <div id="mapholder"></div>
                <h2>
                    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>				
                    <script>

                        {
                            var latlon =<?php echo $profileUBS->getLatitudeUBS(); ?> + "," +<?php echo $profileUBS->getLongitudeUBS(); ?>;

                            var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
                                    + latlon + "&zoom=14&size=600x400&sensor=false";
                            document.getElementById("mapholder").innerHTML = "<img src='" + img_url + "'>";
                        }
                    </script>
                </h2>
            </div>
            <br /><br /><br /><br /><br /><br /><br />
            <?php require '../view/shared/footer.php'; ?>
        </div>

    </body>
</html>