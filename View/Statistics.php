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
                    <!--Div that will hold the dashboard-->
                    <div id="dashboard_div">
                        <!--Divs that will hold each control and chart-->
                        <div id="filter_div"></div>
                        <div id="chart_div"></div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>