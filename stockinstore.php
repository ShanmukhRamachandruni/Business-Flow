<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

    


     
     if(isset($_POST['submit_to_stock']))
     {
        $s1=$_POST['qty'];
        $item=$_POST['itemcode'];
        try{
        $sql_for_qty="SELECT stock_available from stock_availability where ItemCode='$item';";
        $result_for_qty=$con->query($sql_for_qty);
        while($rows=$result_for_qty->fetch_assoc())
        {
            $qty=$rows['stock_available'];
        }
        $final_qty=$s1+$qty;
        $sql_for_update="UPDATE stock_availability set stock_available=$final_qty where ItemCode='$item';";
        $con->query($sql_for_update);
    }
    catch (Exception $e){
        echo $e;
    }

     }
     $sql_for_stocktable = "SELECT * FROM stock_availability;";
     $result_for_stocktable = $con->query($sql_for_stocktable);
     
     $con->close();
     ?>
<style>
    
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
          body{
      overflow: auto;
    }
    .container{
      
      padding: 0px 20px;
      overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
      height: 600px; 
      max-height: 450px;
    }
    .container thead th {
    position: sticky;
    top: 0px;
  }
  
table{
  border-collapse: collapse;
  top: 0;
}
.table {
  top: 0;
  width: 100%;
}

th,
td {
  padding: 5px 10px;
 }
th {
        background: #eee;
}
.tcontainer{
    padding: 10px;
}
</style>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
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

        <li><a href="billing.php">Billing</a></li>
        <li><a href="stockinstore.php">Stock in Store</a></li>
        <li><a href="main.php">LogOut</a></li>

      
      </div>
    </ul>
  </nav>
  <div class="tcontainer">
  <div class="container" id="container">
      
           <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Stock Available</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result_for_stocktable->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows["ItemCode"];?></td>
                                <td><?php echo $rows["Item"];?></td>
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
    <center>
    <form method="post" action="stockinstore.php">
                    <input name="itemcode"  type="text"  autocomplete="off" placeholder="Item code">
                    <input name="qty" type="number" min="0" value="0" step=".1" autocomplete="off" placeholder="Qty">
                    <input type="submit"  name="submit_to_stock" value='Add Stock'>    
                    
                </form></center>
</body>
</html>


