<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  

    <title>Accounts</title>
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
        $sql_for_bill = "SELECT * FROM stock_to_store;";
        $result_for_bill = mysqli_query($con,$sql_for_bill);
        $sql_for_bill1 = "SELECT * FROM stock_to_store;";
        $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
        
        $tb=0;
        $tc=0;
        while ($row = $result_for_bill1->fetch_assoc()) {
                
        $tc += $row['Total_Cost'];
        $tb += $row['Balance'];}
        

        if(isset($_POST['datesubmit']))
        {
            $selectedDate = $_POST['date'];
            $status = $_POST['status'];
            if($status=='Paid' || $status=='Not Paid')
            
            {        $sql_for_bill = "SELECT * FROM stock_to_store where Date_Purchased='$selectedDate' and payment_status='$status';";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store where Date_Purchased='$selectedDate' and payment_status='$status';";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
            }
            else
            {     $sql_for_bill = "SELECT * FROM stock_to_store where Date_Purchased='$selectedDate';";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store where Date_Purchased='$selectedDate';";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
                
            }
            $tb=0;
        $tc=0;
        while ($row = $result_for_bill1->fetch_assoc()) {
                
        $tc += $row['Total_Cost'];
        $tb += $row['Balance'];
    }
 

            
        }
        if(isset($_POST['allsubmit']))
        {
            
            $status2 = $_POST['status2'];
            if($status2=='Paid' || $status2=='Not Paid')
            
            {        $sql_for_bill = "SELECT * FROM stock_to_store where payment_status='$status2';";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store where payment_status='$status2';";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
            }
            else
            {     $sql_for_bill = "SELECT * FROM stock_to_store ;";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store ;";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
                
            }
            $tb=0;
        $tc=0;
        while ($row = $result_for_bill1->fetch_assoc()) {
                
        $tc += $row['Total_Cost'];
        $tb += $row['Balance'];
    }
 

            
        }
        if(isset($_POST['billsubmit']))
        {
            $billno = $_POST['billno'];
            $sql_for_bill = "SELECT * FROM stock_to_store where Bill_No=$billno;";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store where Bill_No=$billno;";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
            $tb=0;
        $tc=0;
        while ($row = $result_for_bill1->fetch_assoc()) {
                
        $tc += $row['Total_Cost'];
        $tb += $row['Balance'];}
        }
        if(isset($_POST['storesubmit']))
        {
            $storename = $_POST['store'];
            $status1 = $_POST['status1'];
            if($status1=='Paid' || $status1=='Not Paid')
            { $sql_for_bill = "SELECT * FROM stock_to_store where Store_Name='$storename' and payment_status='$status1';";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
             $sql_for_bill1 = "SELECT * FROM stock_to_store where Store_Name='$storename' and payment_status='$status1';";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);
        }
            else
            {     $sql_for_bill = "SELECT * FROM stock_to_store where Store_Name='$storename';";
            $result_for_bill = mysqli_query($con,$sql_for_bill);
            $sql_for_bill1 = "SELECT * FROM stock_to_store where Store_Name='$storename';";
            $result_for_bill1 = mysqli_query($con,$sql_for_bill1);

            }
            
        $tb=0;
        $tc=0;
        while ($row = $result_for_bill1->fetch_assoc()) {
                
        $tc += $row['Total_Cost'];
        $tb += $row['Balance'];}
            
         
        }
        if(isset($_POST['submitpaid']))
    {
        $billno1=$_POST['billno1'];
        $cost =$_POST['cost'];
        $sql_for_balance="SELECT Balance from stock_to_store where Bill_No=$billno1;";
                $result_for_balance=mysqli_query($con,$sql_for_balance);
                while($rows1=$result_for_balance->fetch_assoc())
                {
                            $balance=$rows1['Balance'];
                }
              
                $final_b = $balance - $cost;
                //echo $final_qty;
        $sql = "UPDATE stock_to_store SET Balance=$final_b WHERE Bill_No=$billno1;";
   
        $rs = mysqli_query($con, $sql);
        $sql_for_bill = "SELECT * FROM stock_to_store;";
        $result_for_bill = mysqli_query($con,$sql_for_bill);
    }
        
        $con->close();
        ?>

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
  height: 450px; 
  max-height: 450px;
}
.selection{
  display: block;
}
h6{
  font-size: 20px;
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
      tr{
  font-size: 18px;
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
     
#billsubmit,#submitpaid{
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
#billsubmit:hover,#submitpaid:hover {
  background-color:  #8B0000;
  color: white;
  
}
#billno,#billno1,#cost{
  padding: 10px;
}
      
      
</style>



      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  
      // Load the Google Charts library
     
  </script>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
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
        <li><a href="./accounts.php">Accounts</a></li>
        <li><a href="./raw_materials.php">Raw Materials</a></li>
        <li><a href="main.php">LogOut</a></li>

      
      </div>
    </ul>
  </nav>
  <center>
  <h6>Search by :</h6>
  <input type="radio" name="option" id="AllOption" onclick="showAllSelect()"> <h6 style="display: inline; font-size:15px;">All</h6>
  <input type="radio" name="option" id="billOption" onclick="showBillSelect()"> BillNo
    <input type="radio" name="option" id="dateOption" onclick="showDateInput()"> Date
    <input type="radio" name="option" id="storeOption" onclick="showStoreSelect()"> Store

    <div id="AllSelect" style="display: none;">
            <form method="post" action="accounts.php">
            <select name="status2" id="status2">
            <option value="All">All</option>
            <option value="Paid">Paid</option>
            <option value="Not Paid">Not Paid</option>
        </select>
                
                <input type="submit" name="allsubmit" id="allsubmit" value="Search">

            </form>
            </div>

    <div id="dateInput" style="display:none;">
    <form method="post" action="accounts.php">
        <label for="date">Select a Date:</label>
        <input type="date" id="date" name="date">
        <select name="status" id="status">
            <option value="All">All</option>
            <option value="Paid">Paid</option>
            <option value="Not Paid">Not Paid</option>
        </select>
       
        <input type="submit" id="datesubmit" name="datesubmit" value="Search">
        </form>
    </div>

    <div id="storeSelect" style="display:none;">
    <form method="post" action="accounts.php">
        <label for="store">Select a Store:</label>
        <select id="store" name="store">
        <option value="Nandas_1">Nandas_1</option>
        <option value="Nandas_2">Nandas_2</option>
        <option value="RamBhadra">RamBhadra</option>
        <option value="Geetha">Geetha</option>
        <option value="Local">Local</option>
        </select>
        <select name="status1" id="status1">
            <option value="All">All</option>
            <option value="Paid">Paid</option>
            <option value="Not Paid">Not Paid</option>
        </select>
        <input type="submit" name="storesubmit" id="storesubmit" value="Search">
        </form>
    </div>
            <div id="billSelect" style="display: none;">
            <form method="post" action="accounts.php">
                <input type="number" id="billno" name="billno" placeholder="Bill No">
                <input type="submit" name="billsubmit" id="billsubmit" value="Search">

            </form>
            </div><br>
            <input  type="button" onclick="printDiv()" value="Print" />          
  </center>
  


    <script>
      
      
function printDiv() {
     var printContents = document.getElementById('container').innerHTML;
     var originalContents = document.body.innerHTML;
     
     document.body.innerHTML = printContents;

     window.print();


     document.body.innerHTML = originalContents;
}
        function showDateInput() {
            document.getElementById("dateInput").style.display = "block";
            document.getElementById("storeSelect").style.display = "none";
            document.getElementById("billSelect").style.display = "none";
            document.getElementById("AllSelect").style.display = "none";
        }

        function showStoreSelect() {
            document.getElementById("dateInput").style.display = "none";
            document.getElementById("storeSelect").style.display = "block";
            document.getElementById("billSelect").style.display = "none";
            document.getElementById("AllSelect").style.display = "none";
        }
        function showBillSelect() {
            document.getElementById("billSelect").style.display = "block";
            document.getElementById("storeSelect").style.display = "none";
            document.getElementById("dateInput").style.display = "none";
            document.getElementById("AllSelect").style.display = "none";
        }
        function showAllSelect() {
            document.getElementById("billSelect").style.display = "none";
            document.getElementById("storeSelect").style.display = "none";
            document.getElementById("dateInput").style.display = "none";
            document.getElementById("AllSelect").style.display = "block";
        }
    </script>
           
   
           <div class="container" id="container">
          
           <h6>Total Bill : Rs.<?php echo $tc;?>/-</h6>
        <h6 style="display: inline;">Total Balance : Rs.<?php echo $tb;?>/-</h6>
        
        <center>
           <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Bill No.</th>
                    <th>Date Purchased</th>
                    <th>Store Name</th>
                    <th>Items Purchased</th>
                    <th>Total Bill</th>
                    <th>Balance</th>
                    <th>Last Payment Date</th>
                    <th>Bill Status</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result_for_bill->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows["Bill_No"];?></td>
                                <td><?php echo $rows["Date_Purchased"];?></td>
                                <td><?php echo $rows["Store_Name"];?></td>
                                <td><?php $values = explode(", ", $rows['Items_Purchased']);
                                        foreach ($values as $value) {
                                        echo $value . "<br>";
                                }?></td>
                                <td><?php echo $rows["Total_Cost"];?></td>
                                <td><?php echo $rows["Balance"];?></td>
                                <td><?php echo $rows["last_updated"];?></td>
                                <td><?php echo $rows["payment_status"];?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tr>
                
            </tbody>

        </table>
      
    </div>          
    <div>
                        <center>
      
        <form method="post" action="accounts.php">
                    <input name="billno1" id="billno1" type="number"  autocomplete="off" placeholder="Bill No">
                    <input name="cost" type="number" id="cost" autocomplete="off" placeholder="Amount">
                    <input type="submit" id='submitpaid' name="submitpaid" value='Paid'>    
                </form>
               
        </center>
        
    </div>
   </body>
    </html>



