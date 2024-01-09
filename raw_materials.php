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
        $updatetype=$_POST['updatetype'];
        
        try{
        //$sql_for_qty="SELECT stock_available from raw_materials where ItemCode='$item';";
        //$result_for_qty=$con->query($sql_for_qty);
        //while($rows=$result_for_qty->fetch_assoc())
        //{            $qty=$rows['stock_available'];}
        //$final_qty=$s1+$qty;
        $sql_for_update=" UPDATE raw_materials set $updatetype =$s1 where ItemCode='$item';";
        $con->query($sql_for_update);
    }
    catch (Exception $e){
        echo $e;
    }

     }


    
        $sql = "SELECT * FROM raw_materials order by ItemCode asc";
        
        $result = $con->query($sql);
  
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

.container thead th {
  position: sticky;
  top: 0px;
  
}
table{
  border-collapse: collapse;
  top: 0;
}
th,
td {
  padding: 5px 10px;
 }
th {
        background: #eee;
}
a {
        text-decoration: none;
      }
      
      li {
        list-style: none;
      }
.navbar {
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
        font-size: 20px;
      }
      
      /* DROPDOWN MENU */
      .services {
        position: relative; 
      }
      
      .dropdown {
        background-color: rgb(1, 139, 139);
        padding: 1em 0;
        position: absolute; /*WITH RESPECT TO PARENT*/
        display: none;
        border-radius: 8px;
        top: 35px;
      }
      
      .dropdown li + li {
        margin-top: 10px;
      }
      
      .dropdown li {
        padding: 0.5em 1em;
        width: 8em;
        text-align: center;
      }
      
      .dropdown li:hover {
        background-color: #4c9e9e;
      }
      
      .services:hover .dropdown {
        display: block;
      }
      .services img{
        width: 50px;
      }
.selection .itemtype{
  visibility: hidden;
}


#submitupdate{
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
#submitupdate:hover {
  background-color:  #8B0000;
  color: white;
  
}
.updation{
  padding: 10px;
}
.updation input,select{
  padding: 10px;
}
</style>

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
        <li><a href="./billing.php">Raw Materials</a></li>
        <li><a href="main.php">LogOut</a></li>

       <!--  <li class="services">
          <a href="/"><img name="user" src="user.png"></a>

          DROPDOWN MENU 
          <ul class="dropdown">
            <li><a href="/">Dropdown 1 </a></li>
            <li><a href="/">Dropdown 2</a></li>
            <li><a href="/">Dropdown 2</a></li>
            <li><a href="/">Dropdown 3</a></li>
            <li><a href="/">Dropdown 4</a></li>
          </ul>

        </li>-->
      </div>
    </ul>
  </nav>

            <div class='selection'>
            <div class="updation">
            <center>
                <form method="post" action="raw_materials.php">
                    <input name="itemcode"  type="text"  autocomplete="off" placeholder="Item code">
                    <select name="updatetype">
                      <option value="stock_available">Stock</option>
                      <option value="cost">Cost</option>
                    </select>
                    <input name="qty" type="number" autocomplete="off" placeholder="Updated Value">
                    
                    <input type="submit" id='submitupdate' name="submit_to_stock" value='Update'>    
                </form>
                
                    
                </center></div>
               
                </form>
               
            </div>
       
    <div class="container" id="container">
        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Stock Available</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
                    <?php
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows["ItemCode"];?></td>
                                <td><?php echo $rows["Item"];?></td>
                                <td><?php echo $rows["stock_available"];?></td>
                                <td><?php echo $rows["cost"];?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tr>
            </tbody>

        </table>
    </div>                
               

            
    <input type="button" onclick="printDiv()" value="Print" />
    
            <script src="index1.js"></script> 
</body>
    </html>