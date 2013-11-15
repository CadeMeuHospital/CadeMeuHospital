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
            require '../view/shared/header.php';
            require '../view/shared/navigation_bar.php';
            require '../Controller/ControllerStatistics.php';

            $controllerStatistics = ControllerStatistics::getInstanceControllerStatistics();
            $arrayStatistics = $controllerStatistics->generateValuesToChartAverageEvaluate();
            $statistics = $controllerStatistics->generateStatisticsOfQuantityAverage();
            $namesOfStates = $statistics[0];
            $averages = $statistics[1];
            $amountUBS = $statistics[2];
            $populations = $statistics[3];
            $areas = $statistics[4];
            ?>

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

                            var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div'));

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
                                    'width': 500,
                                    'height': 500,
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
                            data.addColumn('number', 'Média de Notas');
                            
                            <?php 
                            for ($i = 0; $i < 27; $i++){
                            ?>
                                data.setValue(<?php echo $i; ?>, 0, '<?php echo $namesOfStates[$i]; ?>');
                                data.setValue(<?php echo $i; ?>, 1, <?php echo $amountUBS[$i]; ?>);
                                data.setValue(<?php echo $i; ?>, 2, <?php echo $averages[$i];?>);
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
                    <h2>Estatísticas</h2>

                    <h1>Concentração de UBS por estado no Brasil</h1>
                    <div id="visualization" style=" border-bottom: 1px double #990000; border-top: 1px double #990000;
                         border-left: 1px double #990000; border-right: 1px double #990000;">
                    </div>            
                    <!--Div that will hold the dashboard-->
                    <div id="dashboard_div">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div" style=" display:none;"></div>
                        <div id="chart_div"></div>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>