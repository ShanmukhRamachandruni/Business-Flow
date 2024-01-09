<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
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

        $sql_for_billno="SELECT Bill_No FROM stock_to_store ORDER BY Bill_No DESC LIMIT 1;";
        $result_for_billno=mysqli_query($con,$sql_for_billno);
        while($rows=$result_for_billno->fetch_assoc())
        {
          $billno=$rows['Bill_No']+1;
        }

     
   

        if(isset($_POST['submit_to_cart']))
        {
        $itemcode=$_POST['itemcode'];
        $qty =$_POST['qty'];
        $sql_for_stock="SELECT stock_available from menu where ItemCode='$itemcode'";
        $result_for_stock = mysqli_query($con,$sql_for_stock);
          while($rows=$result_for_stock ->fetch_assoc())
          {   $a_qty= $rows['stock_available'];}
          if($qty<=$a_qty){
        try{
            $sql_for_insert = "INSERT INTO billing (ItemCode,Qty)VALUES ((select ItemCode from menu where ItemCode='$itemcode' limit 1),$qty) ;";
            
            $result_for_insert = mysqli_query($con, $sql_for_insert);
            
                }
                catch(Exception $e){
                    echo $e; 
                }
              
            if($result_for_insert){
                $sql_for_update = "UPDATE billing SET Item=(SELECT Item from menu where ItemCode='$itemcode'),Cost=(SELECT Qty from billing WHERE ItemCode='$itemcode')*(SELECT Price FROM menu WHERE ItemCode='$itemcode') WHERE ItemCode='$itemcode';";
                $sql_for_ip="UPDATE billing SET ip=( select concat(Item,' X ',Qty,' = ',Cost) from billing where ItemCode='$itemcode') where ItemCode='$itemcode';";
           // $sql = "SELECT * FROM menu";
           
            // send query to the database to add values and confirm if successful
            $result_for_update = mysqli_query($con, $sql_for_update);
            $result_for_ip = mysqli_query($con, $sql_for_ip);
            }
            }
            if($qty>$a_qty)
            {
              echo '<script>alert("Stock limit execeeded");</script>';
            }
             }
  if(isset($_POST['submit_to_delete']))
    {
        $itemcode=$_POST['itemcode'];
        try{
            $sql_for_delete = "DELETE FROM billing WHERE ItemCode='$itemcode';";
            $result_for_delete = mysqli_query($con, $sql_for_delete);
            
          
          }
                catch(Exception $e){
                    echo $e; 
                }
        
    }
  
        
  
    if(isset($_POST['submit_for_updation']))
    {   $storename=$_POST['store'];
        
        try{
            
            $sql2="INSERT INTO stock_to_store(Items_Purchased,Store_Name,Total_Cost,Balance) SELECT GROUP_CONCAT(ip SEPARATOR', '),'$storename',SUM(Cost),SUM(Cost) FROM billing;";
            $result2 = mysqli_query($con,$sql2);
            $sql_for_billing ="SELECT * FROM billing;";
            $result_for_billing=mysqli_query($con,$sql_for_billing);
            while($rows=$result_for_billing->fetch_assoc())
            {   $item=$rows['ItemCode'];
                $sql_for_qty="SELECT stock_available from menu where ItemCode='$item';";
                $result_for_qty=mysqli_query($con,$sql_for_qty);
                while($rows1=$result_for_qty->fetch_assoc())
                {
                            $billing_qty=$rows1['stock_available'];
                }
              //  $final_qty = $billing_qty - $rows['Qty'];
                //echo $final_qty;
                $final_qty = $billing_qty - $rows['Qty'];
                //echo $final_qty;
                $sql_for_finalqty="UPDATE menu set stock_available=$final_qty where ItemCode='$item';";
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
$sql_for_billtable = "SELECT * FROM billing WHERE 1";
$result_for_billtable = $con->query($sql_for_billtable);
$sql_for_sum = "SELECT SUM(Cost) FROM billing ";
$result_for_sum = $con->query($sql_for_sum);
$sql_for_qty = "SELECT SUM(Qty) FROM billing ";
$result_for_qty = $con->query($sql_for_qty);

$sql_for_menutable="SELECT * FROM menu  where 1";      
$result_for_menutable=$con->query($sql_for_menutable);
$con->close(); 
       
    
        
    ?>
    <style>
    
    h1{
        color: red;
    }
    
    .table {
      top: 0;
      width: 100%;
    }
    .container thead th {
  position: sticky;
  top: 0px;
  
}
    
    body{
      overflow: auto;
    }
    .container{
      
      padding: 0px 20px;
      overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
      height: 600px; 
      max-height: 450px;
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
         a{
           width: 100%;
           height: 100%;
         }
          
          .menu li {
            padding: 5px 14px;
          }
          
          /* DROPDOWN MENU */
         
  .outcontainer{
    display: flex;
    height: 60vh;
  }
  .billcontainer{
    flex: 50%;
  }
  .menutable{
    flex: 50%;
  }
 tr{
  font-size: 22px;
 }
 #billimage{
  height: 75px;
  width: 150px;
  margin-bottom: 20px;
 }
 
          
    </style>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function printDiv() {
     var printContents = document.getElementById('billcontainer').innerHTML;
     var originalContents = document.body.innerHTML;
     
     document.body.innerHTML = printContents;

     window.print();


     document.body.innerHTML = originalContents;
}
function payment(){
    var my_time=new Date();
      short=my_time.toString();
      document.getElementsByName("Payment_time")[0].value=short.substring(3,24);
    alert("Paid");
  }
  window.addEventListener('DOMContentLoaded', (event) => {
            const currentDate = new Date();

            // Get day, month, and year components
            const day = String(currentDate.getDate()).padStart(2, '0');
            const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = String(currentDate.getFullYear()).slice(-2);

            const formattedDate = `${day}/${month}/${year}`;
            document.getElementById("current-date").textContent = "Date: " + formattedDate;
        });

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
        <li><a href="./accounts.php">Accounts</a></li>
        <li><a href="./raw_materials.php">Raw Materials</a></li>
        <li><a href="main.php">LogOut</a></li>

      
      </div>
    </ul>
  </nav>
<div class='selection'>
           
                



                <form method="post" action="billing.php">
                    <input name="itemcode"  type="text"  autocomplete="off" placeholder="Item code">
                    <input name="qty" type="number" min="0" step=".1" autocomplete="off" placeholder="Qty">
                    <input type="submit"  name="submit_to_cart" value='Add to Cart'>    
                    <input type="submit" name="submit_to_delete" value='Delete from Cart'>    
                </form>
                
                
               
</div>

    <div class="outcontainer" id="outcontainer">
          <div class="menutable" id="menutable">  
      
   
           <div class="container" id="container">
      
           <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Stock Available</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result_for_menutable->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows["ItemCode"];?></td>
                                <td><?php echo $rows["Item"];?></td>
                                <td><?php echo $rows["Price"];?></td>
                                <td><?php echo $rows["stock_available"];?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tr>
                
            </tbody>

        </table>
    </div>                    
    
    
    </div>
    <div class="billcontainer" id="billcontainer">
      <div class="container" >
        <center><img id="billimage" src="logo1.png"></center>
        <div><h4 style="display: inline;">Bill No.  <?php echo $billno ?></h4>
        <span id="current-date" style="float: right; font-size:20px;font-weight:bold;"></span></div>

        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Item</th>
                    <th>Qty (in kgs.)</th>
                    <th>Cost</th>


                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result_for_billtable->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    
                                    <td><?php echo $rows["Item"];?></td>
                                <td><?php echo $rows["Qty"];?></td>
                                <td><?php echo $rows["Cost"];?></td>
                                
                            </tr>
                    <?php
                        }
                    ?>
                </tr>
                <tr>
                  <td><h5>Total Amount : </h5></td>
                  <td><?php 
                  while($qty=$result_for_qty->fetch_assoc())
                                { $tqty=$qty['SUM(Qty)'];
                                    echo $tqty;
                                }?>
                  </td>
                  <td><?php 
                
                while($sum=$result_for_sum->fetch_assoc())
                                { $amount=$sum['SUM(Cost)'];
                                    echo "Rs. ".$amount;
                                }?></td>
                </tr>
                    
            </tbody>

        </table>
            
      </div>
     
     
      </div>
      
      </div>
  
            <div>
            <form method="post" action="billing.php">
                <input type="hidden" id="Payment_time" name="Payment_time">
                <select name="store">
        <option value="Nandas_1">Nandas_1</option>
        <option value="Nandas_2">Nandas_2</option>
        <option value="RamBhadra">RamBhadra</option>
        <option value="Geetha">Geetha</option>
        <option value="Local">Local</option>
      </select>
                <input type="submit" name="submit_for_updation" value='Confirm' onclick="payment()">    
                <input type="submit" name="submit3" value='Export'> 
                
                </form>
                <input type="button" onclick="printDiv()" value="Print" />
               
                   


            </div>
       
</body>
    </html>