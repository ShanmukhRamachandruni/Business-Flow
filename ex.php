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

$sql = "SELECT Item as Category,Price as 'Value' FROM menu";

$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($connection));

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}foreach ($data as &$row) {
    $row['Value'] = (int)$row['Value'];
}
$json_output = json_encode($data, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
    // Convert to JSON
    $json = json_encode($data);

    // Set headers and output JSON
   
    echo $json;
// Close the connection
$con->close();
$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($data));
fclose($fp);
?> 