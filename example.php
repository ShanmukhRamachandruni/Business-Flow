<!DOCTYPE html>
<html>
<head>
    <!-- Include Google Charts library -->
    <?php
 $host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "Bakery";

 // creating a connection
 $con = mysqli_connect($host, $username, $password, $dbname);
 if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 }

$sql = "SELECT TDate as Category,SUM(amount) as 'Value' FROM sales GROUP BY TDate";

$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($connection));

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
foreach ($data as &$row) {
    $row['Value'] = (int)$row['Value'];
}

$con->close();
$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
fclose($fp);

?> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <!-- Container for the chart -->
    <div id="chart_div" style="width: 100%; height: 500px"></div>

    <script type="text/javascript">
      
        // Load the Google Charts library
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Callback function to draw the chart
        function drawChart() {
            // Fetch the JSON data using AJAX
            fetch('./data.json')
                .then(response => response.json())
                .then(jsonData => {
                    // Parse the JSON data
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Category');
                    data.addColumn('number', 'Value');

                    // Add data rows
                    jsonData.forEach(item => {
                        data.addRow([item.Category, item.Value]);
                    });

                    // Define chart options
                    var options = {
                        title: 'Chart Title'
                    };

                    // Instantiate and draw the chart
                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                })
                .catch(error => {
                    console.error('Error fetching JSON:', error);
                });
            }
    </script>
</body>
</html>
