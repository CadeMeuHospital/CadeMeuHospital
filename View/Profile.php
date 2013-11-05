<?php
    
    require_once '../Controller/ControllerProfileUBS.php';
    
    if (!isset($_GET['id'])) {
        header("location: ../index.php");
    }
    
    $idUBS=$_REQUEST['id'];
   
    $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
    
    $average = $controllerProfileUBS->takeAverageUBS($idUBS);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link rel="stylesheet" href="css/profile.css" type="text/css">
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <title> Cadê Meu Hospital - Perfil UBS </title>
    </head>
    
    <body>
        <div class="root">  
            <?php require '../view/shared/header.php'; ?>
            <?php require '../view/shared/navigation_bar.php'; ?>
            <?php
                

                //$controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                
                
                try {
                    $profileUBS = $controllerProfileUBS->returnUBS($idUBS);
                } catch (Exception $e) {
                    echo($e->getMessage("erro ao capturar id"));
                }
            ?>   

            <div class="profile"> 

                <h2 style="text-indent:30px;">
                    <?php echo $profileUBS->getNameUBS(); ?>
                </h2>
                <div class="content">

                    <table id="tabela-dados-UBS" style="text-align: left; width:700px;">
                        
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
                        <tr>
                        <th>Bairro: </th>
                        <td class="align-left"><?php echo $profileUBS->getDescBairro(); ?></td>
                        </tr>
                        <tr>
                        <th>Cidade:</th>
                        <td class="align-left"><?php echo $profileUBS->getDscCidade(); ?></td>
                        </tr>
                        <tr>
                        <th>Telefone:</th>
                        <td class="align-left"><?php echo $profileUBS->getPhoneUBS(); ?></td>
                        </tr>
                        <tr>
                        <th>Estrutura Física:</th>
                        <td class="align-left"><?php echo $profileUBS->getPhysicStructureUBS(); ?></td>
                        </tr>
                        <tr>
                        <th>Adaptação das Pessoas Idosas:</th>
                        <td class="align-left"><?php echo $profileUBS->getAdapOldPeople(); ?></td>
                        </tr>
                        <tr>
                        <th>Ferramentas:</th>
                        <td class="align-left"><?php echo $profileUBS->getDescriTools(); ?></td>
                        </tr>
                        <tr>
                        <th>Descrição dos Remédios:</th>
                        <td class="align-left"><?php echo $profileUBS->getDescMedicine(); ?></td>
                        </tr>
                        <tr>
                        <th>Média das avaliações:</th>
                        <td class="align-left"><?php echo $average[0]; ?></td>
                        </tr>
                          
                    </table>

                    <br />

                </div>
            
                <div class="evaluate">
                    <h2>Avalie esta UBS!!</h2>
                    <form name="Evaluate" action="EvaluateUBS.php" method="post">
                        <table id="Tabela" >
                            
                                <th><input type="radio" name="evaluate" value="1" checked/> Ruim</th>
                                <th><input type="radio" name="evaluate" value="2"/> Regular </th>        
                                <th><input type="radio" name="evaluate" value="3"/> Bom </th>
                                <th><input type="radio" name="evaluate" value="4"/> Muito Bom</th>
                                <th><input type="radio" name="evaluate" value="5"/> Excelente! </th>
                                                           
                        </table>
                        <input type="submit" name="submitEvaluate" value="Avaliar"/></tr>
                        <input type="hidden" name="idUBS" value="<?php echo $idUBS; ?>" >
                    </form>
                </div>
                <br><br>
                
               
                <br><br>

                <div id="mapholder"></div>
                <h2>
                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>				
                    <script>



                        <?php $latlon = $profileUBS->getLatitudeUBS() . "," . $profileUBS->getLongitudeUBS(); ?>;
                        var myCenter = new google.maps.LatLng(<?php echo $latlon; ?>);
                    function initialize()
                    {
                    var mapProp = {
                      center:new google.maps.LatLng(<?php echo $latlon?>),
                      zoom:16,
                      mapTypeId:google.maps.MapTypeId.ROADMAP
                      }; 
                    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);


                    var marker = new google.maps.Marker({
                        position: myCenter,
                        icon: 'Shared/img/cmh.png',
                        animation: google.maps.Animation.BOUNCE
                    });

                    marker.setMap(map);

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);


                    </script>

                <div id="googleMap" style="width:900px;height:380px;align:center;" ></div>

                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <div id="fb-root"></div>
                    <div class="fb-comments" data-href="http://localhost/CadeMeuHospital/view/Profile.php?id=<?php echo $_REQUEST['id'] ?>" data-numposts="4" data-width="600"></div>
                </h2>


                <br /><br /><br /><br /><br /><br /><br />
                <?php require '../view/shared/footer.php'; ?>
            </div>
        </div>

    </body>
</html>