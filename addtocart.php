<?php
    // getting all values from the HTML form
   
    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bakery";
    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);
    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    $message='Hi';

    if(isset($_POST['submit']))
    {
        $itemcode=$_POST['itemcode'];
        $qty =$_POST['qty'];
        try{
            $sql = "INSERT INTO billing (ItemCode,Qty)VALUES ((select ItemCode from menu where ItemCode='$itemcode' limit 1),$qty) ;";
            $rs = mysqli_query($con, $sql);
                }
                catch(Exception $e){
                    echo $e; 
                }
            if($rs){
                $sql = "UPDATE billing SET Item=(SELECT Item from menu where ItemCode='$itemcode'),Cost=(SELECT Qty from billing WHERE ItemCode='$itemcode')*(SELECT Price FROM menu WHERE ItemCode='$itemcode') WHERE ItemCode='$itemcode';";
           // $sql = "SELECT * FROM menu";
           
            // send query to the database to add values and confirm if successful
            $rs = mysqli_query($con, $sql);
            }
           
               
        

    }
  if(isset($_POST['submit1']))
    {
        $itemcode=$_POST['itemcode'];
        try{
            $sql = "DELETE FROM billing WHERE ItemCode='$itemcode';";
            $rs = mysqli_query($con, $sql);
                }
                catch(Exception $e){
                    echo $e; 
                }
        
    }
  
        
  
    if(isset($_POST['submit_for_updation']))
    {   
        
        try{
            $sql2="INSERT INTO sales (amount)SELECT SUM(Cost)FROM billing;";
            $result2 = mysqli_query($con,$sql2);
            $sql_for_billing ="SELECT * FROM billing;";
            $result_for_billing=mysqli_query($con,$sql_for_billing);
            while($rows=$result_for_billing->fetch_assoc())
            {   $item=$rows['ItemCode'];
                $sql_for_qty="SELECT stock_available from stock_availability where ItemCode='$item';";
                $result_for_qty=mysqli_query($con,$sql_for_qty);
                while($rows1=$result_for_qty->fetch_assoc())
                {
                            $billing_qty=$rows1['stock_available'];
                }
                $final_qty = $billing_qty - $rows['Qty'];
                echo $final_qty;
                $final_qty = $billing_qty - $rows['Qty'];
                //echo $final_qty;
                $sql_for_finalqty="UPDATE stock_availability set stock_available=$final_qty where ItemCode='$item';";
                $result_for_finalqty=mysqli_query($con,$sql_for_finalqty);

            }
            $sql_for_deleting="DELETE FROM billing";
            $result_for_deleting = mysqli_query($con,$sql_for_deleting);
           
                }
                catch(Exception $e){
                    echo $e; 
                }
            
        
    }

//ng sql to create a data entry query
    
if(isset($_POST['submit3'])){
     
 
    // Fetch records from database 
    $query = $con->query("SELECT * FROM sales"); 
     
    if($query->num_rows > 0){ 
        $delimiter = ","; 
        $filename = "sales-data_" . date('d-m-Y') . ".csv"; 
         
        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 
         
        // Set column headers 
        $fields = array('TID', 'TDate', 'amount'); 
        fputcsv($f, $fields, $delimiter); 
         
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $query->fetch_assoc()){ 
            
            $lineData = array($row['TId'], $row['TDate'], $row['amount']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
         
        // Move back to beginning of file 
        fseek($f, 0); 
         
        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
         
        //output all remaining data on a file pointer 
        fpassthru($f); 
    } 
    exit; 
     
}
    
   


    // close connection
    mysqli_close($con);
   header("Location: billing.php", true, 301);
exit();

?>



