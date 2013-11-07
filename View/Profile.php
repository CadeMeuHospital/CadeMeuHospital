<?php
require_once '../Controller/ControllerProfileUBS.php';

if (!isset($_GET['id'])) {
    header("location: ../index.php");
}

$idUBS = $_REQUEST['id'];

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
        <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
        
        <style>
            #mapview{display:none;}
        </style>
        
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
                <div class="evaluate" style="align-center">
                    <h2>Avalie esta UBS!!</h2>
                    <form name="Evaluate" action="EvaluateUBS.php" method="post">
                        <table id="Tabela" >
                            <tr>
                                <th>Ruim!!! D=</th>
                                <td class="align-left">
                                    <input type="radio" name="evaluate" value="1" checked/>
                                </td>
                            </tr>
                            <tr>
                                <th>Regular! )=</th>
                                <td class="align-left">
                                    <input type="radio" name="evaluate" value="2"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Bom .-.</th>
                                <td class="align-left">
                                    <input type="radio" name="evaluate" value="3"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Muito Bom! =D</th>
                                <td class="align-left">
                                    <input type="radio" name="evaluate" value="4"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Excelente!!!*.*</th>
                                <td class="align-left">
                                    <input type="radio" name="evaluate" value="5"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-left">
                                    <input type="submit" name="submitEvaluate" value="Avaliar"/>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="idUBS" value="<?php echo $idUBS; ?>" >
                    </form>
                </div>

                <br><br>

                <br><br>

                <h2>Mapa</h2>
                <div id="mapholder" ></div>
                <div class="content">
                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>			
                    <script>
                        var directionDisplay;
                        var directionsService = new google.maps.DirectionsService();

<?php $latlon = $profileUBS->getLatitudeUBS() . "," . $profileUBS->getLongitudeUBS(); ?>;
                        var myCenter = new google.maps.LatLng(<?php echo $latlon; ?>);
                        function initialize()
                        {
                            directionsDisplay = new google.maps.DirectionsRenderer();
                            var myLatlng = new google.maps.LatLng();

                            var mapProp = {
                                center: new google.maps.LatLng(<?php echo $latlon ?>),
                                zoom: 16,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                            directionsDisplay.setMap(map);
                            directionsDisplay.setPanel(document.getElementById("directionsPanel"));

                            var marker = new google.maps.Marker({
                                position: myCenter,
                                icon: 'Shared/img/cmh.png',
                                animation: google.maps.Animation.BOUNCE
                            });

                            marker.setMap(map);

                        }

                        function calcRoute() {
                            var start = document.getElementById("endereco").value;
                            var end = document.getElementById("destino").value;
                            var request = {
                                origin: start,
                                destination: end,
                                travelMode: google.maps.DirectionsTravelMode.DRIVING
                            };

                            directionsService.route(request, function(response, status) {
                                if (status === google.maps.DirectionsStatus.OK) {
                                    directionsDisplay.setDirections(response);
                                } else {
                                    alert(status);
                                }
                                document.getElementById('mapview').style.display = 'block';
                                document.getElementById('mapview').style.visibility = 'visible';
                            });
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);

                    </script>

                    <div id="googleMap" style="width:900px; height:380px; text-align: center;" ></div>
                    <form action="javascript: void(0);" method="post" onSubmit="calcRoute();">
                        <div onload="getLocation();">
                            <p id="demo">Click the button to get your coordinates:</p>
                            <script>
                                var x = document.getElementById("demo");
                                navigator.geolocation.getCurrentPosition(showpos);
                                function showpos(position) {
                                    var  lat=position.coords.latitude;
                                    var  lon=position.coords.longitude;
                                    var  latlon =lat+','+lon;                 
                                    x.innerHTML = latlon;
                                }
                                
                            </script> 
                            <input type="hidden" size="50" value="<?php echo $latlon; ?>" id="destino" />
                        </div>
                        <div>
                            <?php $latlon2 = "-15.780147999999999, -47.92917"; ?>
                            <input type="hidden" size="50" value="<?php echo $latlon2; ?>" id="endereco" />
                        </div>
                        <input type="submit" name="localizacao" value="Como chegar?"/>
                    </form>

                    <div id="mapview">
                        <!--  <div id="map_canvas" style="float: left; width: 900px; height: 380px;"></div> -->
                        <div class="direcao" style="float: left; width: 900px; height: 380px; overflow: scroll;">
                            <div id="directionsPanel" style="width: 480px; height: 100px"></div>
                        </div>
                    </div>   

                    <br><br>

                    <h2>Deixe a sua Opinião</h2>

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