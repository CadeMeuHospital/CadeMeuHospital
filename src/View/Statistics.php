<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link rel="shortcut icon" href="Shared/img/favicon.ico">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" href="../View/Shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link href="/../Shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <script type="text/javascript" src="../View/shared/js/jquery.price_format.1.8.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <title>CMH - Estatisticas</title>
    </head>
    <style>
        h2 {
            color: #990000;
            text-decoration: none;
            font-size: 30pt;
            border-bottom: 1px double #990000;
        }
    </style>
    <body align="center">
        <div class="root">
            <?php
                require '../View/Shared/Header.php';
                require '../View/Shared/Navigation_bar.php';
                require '/../Controller/ControllerStatistics.php';

                $controllerStatistics = ControllerStatistics::getInstanceControllerStatistics();
                $arrayStatistics = $controllerStatistics->generateValuesToChartAverageEvaluate();
                $statistics = $controllerStatistics->generateStatisticsOfQuantityAverage();
                $namesOfStates = $statistics[0];
                $amountUBS = $statistics[2];

                if (!isset($_POST['option1'])) {
                    $option = "population";
                } else {
                    $option = $_POST['option1'];
                }
                
                switch($option){
                    case "population":
                        $populations = $statistics[3];
                        $optionToBeCrossed = array();
                        
                        for($i = 0; $i < 27;$i++){
                            $result = $populations[$i]/$amountUBS[$i];
                            $resultFormat = round($result, 2);
                           
                            array_push($optionToBeCrossed, $resultFormat);
                        }
                        $title = "Quantidade de Pessoas por UBS";
                        break;
                    case "average":
                        $optionToBeCrossed = $statistics[1];
                        $title = "Média das Avaliações das UBS do Estado";
                        break;
                    case "area":    
                        $areas = $statistics[4];
                        $optionToBeCrossed = array();
                        
                        for($i = 0; $i < 27;$i++){
                            $result = $areas[$i]/$amountUBS[$i];
                            array_push($optionToBeCrossed, $result);
                        }
                        $title = "Uma UBS a cada (Km²)";
                        break;
                }

            ?>

            <h2>Estatísticas</h2>
            <h1> Escolha as informações a serem cruzadas no mapa:</h1><br><br>
            <form name="Statistics" " method="post">
                <table id="Tabela" >
                    <tr>
                        <th>População por Estado</th>
                        <td class="align-left">
                            <input type="radio" name="option1" value="population" checked/>
                        </td>
                    </tr>
                    <tr>
                        <th>Média das Avaliações por Estado</th>
                        <td class="align-left">
                            <input type="radio" name="option1" value="average"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Área do Estado</th>
                        <td class="align-left">
                            <input type="radio" name="option1" value="area"/>
                        </td>
                    </tr>
                </table>
                <input class="button" type="submit" name="submitCross" style="width:200px" value="Cruzar Informações"/>
            </form>
            <div id="center">
                <div class="content">

                    <script type="text/javascript">
                        google.load('visualization', '1.0', {'packages': ['controls']});
                        google.setOnLoadCallback(drawDashboard);

                        function drawDashboard() {

                            var data = google.visualization.arrayToDataTable([
                                ['Nota', 'Percentual'],
                                ['Ruim', <?php echo $arrayStatistics[0]; ?>],
                                ['Regular', <?php echo $arrayStatistics[1]; ?>],
                                ['Bom', <?php echo $arrayStatistics[2]; ?>],
                                ['Muito bom', <?php echo $arrayStatistics[3]; ?>],
                                ['Excelente', <?php echo $arrayStatistics[4]; ?>],
                            ]);

                            var dashboard = new google.visualization.Dashboard
                            (document.getElementById('dashboard_div'));

                            var donutRangeSlider = new google.visualization.ControlWrapper({
                                'controlType': 'NumberRangeFilter',
                                'containerId': 'filter_div',
                                'options': {
                                    'filterColumnLabel': 'Percentual'
                                }
                            });

                            var pieChart = new google.visualization.ChartWrapper({
                                'chartType': 'PieChart',
                                'containerId': 'chart_div',
                                'options': {
                                    'width': 760,
                                    'height': 400,
                                    'pieSliceText': 'value',
                                    'legend': 'left',
                                }
                            });

                            dashboard.bind(donutRangeSlider, pieChart);
                            dashboard.draw(data);
                        }
                    </script>

                    <script>

                        google.load('visualization', '1', {packages: ['geochart']});
                        function drawVisualization() {
                            var data = new google.visualization.DataTable();
                            data.addRows(27);

                            data.addColumn('string', 'Brasil');
                            data.addColumn('number', 'Quantidade de UBS');
                            data.addColumn('number', '<?php echo $title;?>');

                            <?php 
                            for ($i = 0; $i < 27; $i++){
                            ?>
                                data.setValue(<?php echo $i; ?>, 0, 
                                '<?php echo $namesOfStates[$i]; ?>');
                                data.setValue(<?php echo $i; ?>, 1, 
                                <?php echo $amountUBS[$i]; ?>);
                                data.setValue(<?php echo $i; ?>, 2, 
                                <?php echo $optionToBeCrossed[$i]; ?>);
                            <?php
                            }
                            ?>

                            var options = {};
                            options['region'] = 'BR';
                            options['resolution'] = 'provinces';
                            options['width'] = 760;
                            options['height'] = 480;
                            options['colorAxis'] = {colors: ['#E5DEE2', '#990000']};

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1, 2]);

                            var geochart = new google.visualization.GeoChart(document.getElementById('visualization'));
                            geochart.draw(data, options);
                        }

                        google.setOnLoadCallback(drawVisualization);
                    </script>

                    <h1>Concentração de UBS por estado no Brasil</h1>
                    <div id="visualization" style=" border-bottom: 1px double #990000; border-top: 1px double #990000;
                         border-left: 1px double #990000; border-right: 1px double #990000;">
                    </div>            
                    <!--Div that will hold the dashboard-->
                    <br>
                    <br>
                    <h1>Número de votos de todas as UBS</h1>
                    <div id="dashboard_div"  style=" border-bottom: 1px double #990000; border-top: 1px double #990000;
                         border-left: 1px double #990000; border-right: 1px double #990000;">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div" style=" display:none;"></div>
                        <div id="chart_div"></div>
                    </div>
                </div>
            </div>
            <br>
            <?php require '../View/Shared/Footer.php'; ?>
        </div>
    </body>
</html>
