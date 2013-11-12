<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" href="../view/shared/css/style.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link href="../shared/css/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <script type="text/javascript" src="../V.iew/shared/js/jquery.price_format.1.8.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <title> Cadê Meu Hospital - Home</title>
    </head>

    <body align="center">
        <div class="root">
            <?php
                require '../view/shared/header.php';
                require '../view/shared/navigation_bar.php';
                require '../Controller/ControllerStatistics.php';
                require '../Controller/ControllerProfileUBS.php';

                $controllerStatistics = ControllerStatistics::getInstanceControllerStatistics();
                $controllerProfileUBS = ControllerProfileUBS::getInstanceControllerProfileUBS();
                $arrayStatistics = $controllerStatistics->generateValuesToChartAverageEvaluate();
                $arrayStates = ["AC","AL","AP","AM","BA","CE","DF","ES","GO","MA",
                                "MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN",
                                "RS","RO","RR","SC","SP","SE","TO"];//MELHORAR ISSO FUTURAMENTE!!
                
                $numberOfUBSByState = array();
                $averageOfUBSByState = array();
                for($i = 0; $i < count($arrayStates); $i++){
                    $arrayUBS = $controllerProfileUBS->searchUBS($arrayStates[$i], 4);
                    $quantityOfUBSByState = count($arrayUBS);
                    $soma = array();
                    $quantityOfValidUBSByState = 0;
                    
                    for($j = 0; $j < $quantityOfUBSByState; $j++){
                        $ubs = $arrayUBS[$j];    
                        $average = $ubs->getAverage();
                        if($average != 0){   
                            $quantityOfValidUBSByState++;
                            array_push($soma, $average); 
                        }
                    }
                    
                    if($quantityOfValidUBSByState == 0){
                       $quantityOfValidUBSByState = 1; 
                    }
                    
                    $averageByState = array_sum($soma) / $quantityOfValidUBSByState;
                    array_push($numberOfUBSByState, $quantityOfUBSByState);
                    array_push($averageOfUBSByState, $averageByState);
                }
            ?>

            <div id="center">
                <div class="content">

                    <script type="text/javascript">
                        // Load the Visualization API and the controls package.
                        google.load('visualization', '1.0', {'packages': ['controls']});

                        // Set a callback to run when the Google Visualization API is loaded.
                        google.setOnLoadCallback(drawDashboard);

                        // Callback that creates and populates a data table,
                        // instantiates a dashboard, a range slider and a pie chart,
                        // passes in the data and draws it.
                        function drawDashboard() {

                            // Create our data table.
                            var data = google.visualization.arrayToDataTable([
                                ['Nota', 'Percentual'],
                                ['Ruim', <?php echo $arrayStatistics[0]; ?>],
                                ['Regular', <?php echo $arrayStatistics[1]; ?>],
                                ['Bom', <?php echo $arrayStatistics[2]; ?>],
                                ['Muito bom', <?php echo $arrayStatistics[3]; ?>],
                                ['Excelente', <?php echo $arrayStatistics[4]; ?>],
                            ]);

                            // Create a dashboard.
                            var dashboard = new google.visualization.Dashboard(
                                    document.getElementById('dashboard_div'));

                            // Create a range slider, passing some options
                            var donutRangeSlider = new google.visualization.ControlWrapper({
                                'controlType': 'NumberRangeFilter',
                                'containerId': 'filter_div',
                                'options': {
                                    'filterColumnLabel': 'Percentual'
                                }
                            });

                            // Create a pie chart, passing some options
                            var pieChart = new google.visualization.ChartWrapper({
                                'chartType': 'PieChart',
                                'containerId': 'chart_div',
                                'options': {
                                    'width': 300,
                                    'height': 300,
                                    'pieSliceText': 'value',
                                    'legend': 'right'
                                }
                            });

                            // Establish dependencies, declaring that 'filter' drives 'pieChart',
                            // so that the pie chart will only display entries that are let through
                            // given the chosen slider range.
                            dashboard.bind(donutRangeSlider, pieChart);

                            // Draw the dashboard.
                            dashboard.draw(data);
                        }
                    </script>

                    <script>

                        google.load('visualization', '1', {packages: ['geochart']});
                        function drawVisualization() {
                            var data = new google.visualization.DataTable();
                            data.addRows(28);

                            data.addColumn('string', 'Brasil');
                            data.addColumn('number', 'Quantidade de UBS');
                            data.addColumn('number', 'Média de Notas');

                            data.setValue(0, 0, 'Acre');
                            data.setValue(0, 1, <?php echo $numberOfUBSByState[0]; ?>);
                            data.setValue(0, 2, <?php echo $averageOfUBSByState[0]; ?>);

                            data.setValue(1, 0, 'Alagoas');
                            data.setValue(1, 1, <?php echo $numberOfUBSByState[1]; ?>);
                            data.setValue(1, 2, <?php echo $averageOfUBSByState[1]; ?>);
                            
                            data.setValue(2, 0, 'Amapá');
                            data.setValue(2, 1, <?php echo $numberOfUBSByState[2]; ?>);
                            data.setValue(2, 2, <?php echo $averageOfUBSByState[2]; ?>);
                            
                            data.setValue(3, 0, 'Amazonas');
                            data.setValue(3, 1, <?php echo $numberOfUBSByState[3]; ?>);
                            data.setValue(3, 2, <?php echo $averageOfUBSByState[3]; ?>);

                            data.setValue(4, 0, 'Bahia');
                            data.setValue(4, 1, <?php echo $numberOfUBSByState[4]; ?>);
                            data.setValue(4, 2, <?php echo $averageOfUBSByState[4]; ?>);

                            data.setValue(5, 0, 'Ceará');
                            data.setValue(5, 1, <?php echo $numberOfUBSByState[5]; ?>);
                            data.setValue(5, 2, <?php echo $averageOfUBSByState[5]; ?>);

                            data.setValue(6, 0, 'Distrito Federal');
                            data.setValue(6, 1, <?php echo $numberOfUBSByState[6]; ?>);
                            data.setValue(6, 2, <?php echo $averageOfUBSByState[6]; ?>);

                            data.setValue(7, 0, 'Espírito Santo');
                            data.setValue(7, 1, <?php echo $numberOfUBSByState[7]; ?>);
                            data.setValue(7, 2, <?php echo $averageOfUBSByState[7]; ?>);

                            data.setValue(8, 0, 'Goias');
                            data.setValue(8, 1, <?php echo $numberOfUBSByState[8]; ?>);
                            data.setValue(8, 2, <?php echo $averageOfUBSByState[8]; ?>);

                            data.setValue(9, 0, 'Maranhão');
                            data.setValue(9, 1, <?php echo $numberOfUBSByState[9]; ?>);
                            data.setValue(9, 2, <?php echo $averageOfUBSByState[9]; ?>);

                            data.setValue(10, 0, 'Mato Grosso');
                            data.setValue(10, 1, <?php echo $numberOfUBSByState[10]; ?>);
                            data.setValue(10, 2, <?php echo $averageOfUBSByState[10]; ?>);

                            data.setValue(11, 0, 'Mato Grosso do Sul');
                            data.setValue(11, 1, <?php echo $numberOfUBSByState[11]; ?>);
                            data.setValue(11, 2, <?php echo $averageOfUBSByState[11]; ?>);

                            data.setValue(12, 0, 'Minas Gerais');
                            data.setValue(12, 1, <?php echo $numberOfUBSByState[12]; ?>);
                            data.setValue(12, 2, <?php echo $averageOfUBSByState[12]; ?>);
                            
                            data.setValue(13, 0, 'Pará');
                            data.setValue(13, 1, <?php echo $numberOfUBSByState[13]; ?>);
                            data.setValue(13, 2, <?php echo $averageOfUBSByState[13]; ?>);

                            data.setValue(14, 0, 'Paraíba');
                            data.setValue(14, 1, <?php echo $numberOfUBSByState[14]; ?>);
                            data.setValue(14, 2, <?php echo $averageOfUBSByState[14]; ?>);

                            data.setValue(15, 0, 'Paraná');
                            data.setValue(15, 1, <?php echo $numberOfUBSByState[15]; ?>);
                            data.setValue(15, 2, <?php echo $averageOfUBSByState[15]; ?>);

                            data.setValue(16, 0, 'Pernambuco');
                            data.setValue(16, 1, <?php echo $numberOfUBSByState[16]; ?>);
                            data.setValue(16, 2, <?php echo $averageOfUBSByState[16]; ?>);

                            data.setValue(17, 0, 'Piaui');
                            data.setValue(17, 1, <?php echo $numberOfUBSByState[17]; ?>);
                            data.setValue(17, 2, <?php echo $averageOfUBSByState[17]; ?>);

                            data.setValue(18, 0, 'Rio de Janeiro');
                            data.setValue(18, 1, <?php echo $numberOfUBSByState[18]; ?>);
                            data.setValue(18, 2, <?php echo $averageOfUBSByState[18]; ?>);

                            data.setValue(19, 0, 'Rio Grande do Norte');
                            data.setValue(19, 1, <?php echo $numberOfUBSByState[19]; ?>);
                            data.setValue(19, 2, <?php echo $averageOfUBSByState[19]; ?>);

                            data.setValue(20, 0, 'Rio Grande do Sul');
                            data.setValue(20, 1, <?php echo $numberOfUBSByState[20]; ?>);
                            data.setValue(20, 2, <?php echo $averageOfUBSByState[20]; ?>);
                            
                            data.setValue(21, 0, 'Rondônia');
                            data.setValue(21, 1, <?php echo $numberOfUBSByState[21]; ?>);
                            data.setValue(21, 2, <?php echo $averageOfUBSByState[21]; ?>);

                            data.setValue(22, 0, 'Roraima');
                            data.setValue(22, 1, <?php echo $numberOfUBSByState[22]; ?>);
                            data.setValue(22, 2, <?php echo $averageOfUBSByState[22]; ?>);

                            data.setValue(23, 0, 'Santa Catarina');
                            data.setValue(23, 1, <?php echo $numberOfUBSByState[23]; ?>);
                            data.setValue(23, 2, <?php echo $averageOfUBSByState[23]; ?>);

                            data.setValue(24, 0, 'São Paulo');
                            data.setValue(24, 1, <?php echo $numberOfUBSByState[24]; ?>);
                            data.setValue(24, 2, <?php echo $averageOfUBSByState[24]; ?>);

                            data.setValue(25, 0, 'Sergipe');
                            data.setValue(25, 1, <?php echo $numberOfUBSByState[25]; ?>);
                            data.setValue(25, 2, <?php echo $averageOfUBSByState[25]; ?>);

                            data.setValue(26, 0, 'Tocantins');
                            data.setValue(26, 1, <?php echo $numberOfUBSByState[26]; ?>);
                            data.setValue(26, 2, <?php echo $averageOfUBSByState[26]; ?>);

                            var options = {};
                            options['region'] = 'BR';
                            options['resolution'] = 'provinces';
                            options['width'] = 556;
                            options['height'] = 347;
                            options['colorAxis'] = {colors: ['#E5DEE2', '#990000']};


                            var geochart = new google.visualization.GeoChart(
                                    document.getElementById('visualization'));
                            geochart.draw(data, options);
                        }

                        google.setOnLoadCallback(drawVisualization);
                    </script>

                    <!--Div that will hold the dashboard-->
                    <div id="dashboard_div">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div"></div>
                        <div id="chart_div"></div>
                    </div>

                    <div id="visualization"></div>
                </div>
            </div>
        </div>
    </body>
</html>