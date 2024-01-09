<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  

    <title>Charts</title>
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
$sqlchart = "SELECT date_format(TDate,'%M') as Category,SUM(amount) as 'Value' from sales GROUP BY month(Tdate);";

$resultchart = $con->query($sqlchart);

$datachart = array();
if ($resultchart->num_rows > 0) {
    while ($row = $resultchart->fetch_assoc()) {
        $datachart[] = $row;
    }
}
foreach ($datachart as &$row) {
    //$row['Category'] = strval($row['Category']);
    $row['Value'] = (int)$row['Value'];

}

$con->close();
$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($datachart, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
fclose($fp); 
        
    ?>
    <script>function printDiv() {
     var printContents = document.getElementById('chart').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function getValue() {
            // Get the <select> element by its ID
            var selectElement = document.getElementById("charttype");

            // Get the selected option's value
            var selectedValue = selectElement.value;}
      
</script>
<style>
  

button{
   margin-top: 10px;
    height: auto;
    width: auto;
    background-color: #ffffff;
    color: #8B0000;
    padding: 10px;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
  background-color:  #8B0000;
  color: white;
  
}
#charttype{
  padding: 10px;
}
    
h1{
    color: red;
}

.table {
  top: 0;
  width: 100%;
}


body{
  overflow: auto;
}
.container{
  margin-top: 50px;
  padding: 0px 20px;
  overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
  height: 300px; 
  max-height: 300px;
}
.selection{
  display: block;
}

a {
        text-decoration: none;
      }
      
      li {
        list-style: none;
      }.navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px;
        background-color: #f7ba36;
        color: #fff;
      }
      .nav-links{
        margin-top: 10px;
      }
      .nav-links a {
        color: #8B0000;
      }
      
      /* LOGO */
      .logo img{
        width: 75px;
        padding: 0px;

      }
      
      /* NAVBAR MENU */
      .menu {
        display: flex;
        gap: 1em;
        font-size: 18px;
      }
      .nav-links a:hover {
        color: white;
      }

      .menu li:hover {
        background-color: #8B0000;
        color: #fff;
        border-radius: 5px;
        transition: 0.3s ease;
      }
      
      .menu li {
        padding: 5px 14px;
      }
      
      /* DROPDOWN MENU */
     
      
      
</style>



      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  
      // Load the Google Charts library
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      // Callback function to draw the chart
      function drawChart() {
          // Fetch the JSON data using AJAX
          var selectElement = document.getElementById("charttype");

            // Get the selected option's value
            var selectedValue = selectElement.value;

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
                  //var x=document.getElementById("charttype");
                 if(selectedValue=='line')
                 {
                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                  chart.draw(data, options);}
                  else if(selectedValue=='bar'){
                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                  }
                  else{
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                  }
                  
              })
              .catch(error => {
                  console.error('Error fetching JSON:', error);
              });
          }
  </script>
      
        <!--    
        <script type="text/javascript">
            window.history.forward();
            function noBack() {
                window.history.forward();
            }
        </script>-->
</head>

                    
        
<body>
<nav class="navbar">
    <!-- LOGO -->
    <div class="logo"><img src="logo1.png"></div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->


      <!-- NAVIGATION MENUS -->
      <div class="menu">

      <li><a href="./login.php">Pricing</a></li>
        <li><a href="./charts.php">Analytics</a></li>
        <li><a href="./billing.php">Billing</a></li>
        <li><a href="./raw_materials.php">Raw Materials</a></li>
        <li><a href="main.php">LogOut</a></li>

      
      </div>
    </ul>
  </nav>
  <h1>Charts</h1>
  <input type="button" onclick="printDiv()" value="Print" />

   
      <select name="charttype" id="charttype">
        <option value="pie">Pie Chart</option>
        <option value="line">Line Chart</option>
        <option value="bar">Bar Chart</option>
      </select>
      <button onclick="drawChart()">Display</button>

     

<div id='chart'>
            
            
    
    <div id="chart_div" style="width: 100%; height: 500px"></div>
         
</body>
    </html>



