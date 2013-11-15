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
                                    'legend': 'right'
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
                            //data.addColumn('number', 'População Aproximada');

                            data.setValue(0, 0, 'Acre');
                            data.setValue(0, 1, <?php echo $amountUBS[0]; ?>);
                            data.setValue(0, 2, <?php echo $averages[0]; ?>);
                            //data.setValue(0, 3, <?php echo $populations[0]; ?>);

                            data.setValue(1, 0, 'Alagoas');
                            data.setValue(1, 1, <?php echo $amountUBS[1]; ?>);
                            data.setValue(1, 2, <?php echo $averages[1]; ?>);
                            //data.setValue(1, 3, <?php echo $populations[1]; ?>);

                            data.setValue(2, 0, 'Amapá');
                            data.setValue(2, 1, <?php echo $amountUBS[2]; ?>);
                            data.setValue(2, 2, <?php echo $averages[2]; ?>);
                            //data.setValue(2, 3, <?php echo $populations[2]; ?>);

                            data.setValue(3, 0, 'Amazonas');
                            data.setValue(3, 1, <?php echo $amountUBS[3]; ?>);
                            data.setValue(3, 2, <?php echo $averages[3]; ?>);
                            //data.setValue(3, 3, <?php echo $populations[3]; ?>);

                            data.setValue(4, 0, 'Bahia');
                            data.setValue(4, 1, <?php echo $amountUBS[4]; ?>);
                            data.setValue(4, 2, <?php echo $averages[4]; ?>);
                            //data.setValue(4, 3, <?php echo $populations[4]; ?>);

                            data.setValue(5, 0, 'Ceará');
                            data.setValue(5, 1, <?php echo $amountUBS[5]; ?>);
                            data.setValue(5, 2, <?php echo $averages[5]; ?>);
                            //data.setValue(5, 3, <?php echo $populations[5]; ?>);

                            data.setValue(6, 0, 'Distrito Federal');
                            data.setValue(6, 1, <?php echo $amountUBS[6]; ?>);
                            data.setValue(6, 2, <?php echo $averages[6]; ?>);
                            //data.setValue(6, 3, <?php echo $populations[6]; ?>);

                            data.setValue(7, 0, 'Espírito Santo');
                            data.setValue(7, 1, <?php echo $amountUBS[7]; ?>);
                            data.setValue(7, 2, <?php echo $averages[7]; ?>);
                            //data.setValue(7, 3, <?php echo $populations[7]; ?>);

                            data.setValue(8, 0, 'Goias');
                            data.setValue(8, 1, <?php echo $amountUBS[8]; ?>);
                            data.setValue(8, 2, <?php echo $averages[8]; ?>);
                            //data.setValue(8, 3, <?php echo $populations[8]; ?>);

                            data.setValue(9, 0, 'Maranhão');
                            data.setValue(9, 1, <?php echo $amountUBS[9]; ?>);
                            data.setValue(9, 2, <?php echo $averages[9]; ?>);
                            //data.setValue(9, 3, <?php echo $populations[9]; ?>);

                            data.setValue(10, 0, 'Mato Grosso');
                            data.setValue(10, 1, <?php echo $amountUBS[10]; ?>);
                            data.setValue(10, 2, <?php echo $averages[10]; ?>);
                            //data.setValue(10, 3, <?php echo $populations[10]; ?>);

                            data.setValue(11, 0, 'Mato Grosso do Sul');
                            data.setValue(11, 1, <?php echo $amountUBS[11]; ?>);
                            data.setValue(11, 2, <?php echo $averages[11]; ?>);
                            //data.setValue(11, 3, <?php echo $populations[11]; ?>);

                            data.setValue(12, 0, 'Minas Gerais');
                            data.setValue(12, 1, <?php echo $amountUBS[12]; ?>);
                            data.setValue(12, 2, <?php echo $averages[12]; ?>);
                            //data.setValue(12, 3, <?php echo $populations[12]; ?>);

                            data.setValue(13, 0, 'Pará');
                            data.setValue(13, 1, <?php echo $amountUBS[13]; ?>);
                            data.setValue(13, 2, <?php echo $averages[13]; ?>);
                            //data.setValue(13, 3, <?php echo $populations[13]; ?>);

                            data.setValue(14, 0, 'Paraíba');
                            data.setValue(14, 1, <?php echo $amountUBS[14]; ?>);
                            data.setValue(14, 2, <?php echo $averages[14]; ?>);
                            //data.setValue(14, 3, <?php echo $populations[14]; ?>);

                            data.setValue(15, 0, 'Paraná');
                            data.setValue(15, 1, <?php echo $amountUBS[15]; ?>);
                            data.setValue(15, 2, <?php echo $averages[15]; ?>);
                            //data.setValue(15, 3, <?php echo $populations[15]; ?>);

                            data.setValue(16, 0, 'Pernambuco');
                            data.setValue(16, 1, <?php echo $amountUBS[16]; ?>);
                            data.setValue(16, 2, <?php echo $averages[16]; ?>);
                            //data.setValue(16, 3, <?php echo $populations[16]; ?>);

                            data.setValue(17, 0, 'Piauí');
                            data.setValue(17, 1, <?php echo $amountUBS[17]; ?>);
                            data.setValue(17, 2, <?php echo $averages[17]; ?>);
                            //data.setValue(17, 3, <?php echo $populations[17]; ?>);

                            data.setValue(18, 0, 'Rio de Janeiro');
                            data.setValue(18, 1, <?php echo $amountUBS[18]; ?>);
                            data.setValue(18, 2, <?php echo $averages[18]; ?>);
                            //data.setValue(18, 3, <?php echo $populations[18]; ?>);

                            data.setValue(19, 0, 'Rio Grande do Norte');
                            data.setValue(19, 1, <?php echo $amountUBS[19]; ?>);
                            data.setValue(19, 2, <?php echo $averages[19]; ?>);
                            //data.setValue(19, 3, <?php echo $populations[19]; ?>);

                            data.setValue(20, 0, 'Rio Grande do Sul');
                            data.setValue(20, 1, <?php echo $amountUBS[20]; ?>);
                            data.setValue(20, 2, <?php echo $averages[20]; ?>);
                            //data.setValue(20, 3, <?php echo $populations[20]; ?>);

                            data.setValue(21, 0, 'Rondônia');
                            data.setValue(21, 1, <?php echo $amountUBS[21]; ?>);
                            data.setValue(21, 2, <?php echo $averages[21]; ?>);
                            //data.setValue(21, 3, <?php echo $populations[21]; ?>);

                            data.setValue(22, 0, 'Roraima');
                            data.setValue(22, 1, <?php echo $amountUBS[22]; ?>);
                            data.setValue(22, 2, <?php echo $averages[22]; ?>);
                            //data.setValue(22, 3, <?php echo $populations[22]; ?>);

                            data.setValue(23, 0, 'Santa Catarina');
                            data.setValue(23, 1, <?php echo $amountUBS[23]; ?>);
                            data.setValue(23, 2, <?php echo $averages[23]; ?>);
                            //data.setValue(23, 3, <?php echo $populations[23]; ?>);

                            data.setValue(24, 0, 'São Paulo');
                            data.setValue(24, 1, <?php echo $amountUBS[24]; ?>);
                            data.setValue(24, 2, <?php echo $averages[24]; ?>);
                            //data.setValue(24, 3, <?php echo $populations[24]; ?>);

                            data.setValue(25, 0, 'Sergipe');
                            data.setValue(25, 1, <?php echo $amountUBS[25]; ?>);
                            data.setValue(25, 2, <?php echo $averages[25]; ?>);
                            //data.setValue(25, 3, <?php echo $populations[25]; ?>);

                            data.setValue(26, 0, 'Tocantins');
                            data.setValue(26, 1, <?php echo $amountUBS[26]; ?>);
                            data.setValue(26, 2, <?php echo $averages[26]; ?>);
                            //data.setValue(26, 3, <?php echo $populations[26]; ?>);

                            var options = {};
                            options['region'] = 'BR';
                            options['resolution'] = 'provinces';
                            options['width'] = 800;
                            options['height'] = 800;
                            options['colorAxis'] = {colors: ['#E5DEE2', '#990000']};
                            
                            var view = new google.visualization.DataView(data);
                            view.setColumns([0,1,2]);

                            var geochart = new google.visualization.GeoChart(document.getElementById('visualization'));
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