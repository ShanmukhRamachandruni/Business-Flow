<!DOCTYPE html>
<html lang="en">
<head >
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

        if(isset($_POST['submitupdate']))
    { $attr=$_POST['attr'];
        $itemcode=$_POST['itemcode'];
        $value =$_POST['value'];
        $sql = "UPDATE menu SET $attr='$value' WHERE ItemCode='$itemcode'";
   
        $rs = mysqli_query($con, $sql);
    }

        $itemtype=1;
        $sql = "SELECT * FROM menu WHERE 1";
        if(isset($_POST['submit']))
        {

        $itemtype=$_POST['itemtype'];
        if($itemtype!="All")
        { $sql = "SELECT * FROM menu WHERE ItemType='$itemtype'";}
        else{$sql = "SELECT * FROM menu WHERE 1";}
        }
        $result = $con->query($sql);
        $sql_for_sum = "SELECT cost FROM raw_materials order by ItemCode asc;";
        $result_for_sum = $con->query($sql_for_sum);
       // echo $result_for_sum['cost'][0];
        $costs=array();
        while($sum=$result_for_sum->fetch_assoc())
        {
            $x=$sum['cost'];
            array_push($costs,$x);
            //echo $x;
        }
        
        
        
        $Ilachi=$costs[0];
        $Verusenaga_pappu=$costs[1];
        $Vamu=$costs[2];
        $Usirikai=$costs[3];
        $Tomato=$costs[4];
        $Talinpu_Ginjalu=$costs[5];
        $Sugar=$costs[6];
        $Sonti=$costs[7];
        $Senaga_pappu=$costs[8];
        $senaga_Flour=$costs[9];
        $Salt=$costs[10];
        $Sajjalu=$costs[11];
        $Saggu_Biyam=$costs[12];
        $Rocksalt=$costs[13];
        $Rice_Flour=$costs[14];
        $Rice=$costs[15];
        $Aamudam=$costs[16];
        $Rathipuvu=$costs[17];
        $Ragulu=$costs[18];
        $Podina=$costs[19];
        $Wheat_Flour=$costs[20];
        $Pipallu=$costs[21];
        $Pandumirchi=$costs[22];
        $Pachi_pappu=$costs[23];
        $Org_Bellam=$costs[24];
        $Oil=$costs[25];
        $Nuvulu=$costs[26];
        $Nalla_Nugulu=$costs[27];
        $munagaku=$costs[28];
        $Miriyalu=$costs[29];
        $Mirchi_Powder=$costs[30];
        $Minumulu=$costs[31];
        $Minapappu=$costs[32];
        $Menthi_Pindi=$costs[33];
        $Maratimogga=$costs[34];
        $Mamidi_Allam=$costs[35];
        $Maida=$costs[36];
        $Kothimera=$costs[37];
        $kobbari=$costs[38];
        $Karivepaku=$costs[39];
        $Kandi_papu=$costs[40];
        $Kakarakai=$costs[41];
        $Kaju=$costs[42];
        $JonnaFlour=$costs[43];
        $Jeera=$costs[44];
        $Groundnut_Oil=$costs[45];
        $Groundnut=$costs[46];
        $Green_Chilli=$costs[47];
        $Gongoora=$costs[48];
        $Ghee=$costs[49];
        $Gasalu=$costs[50];
        $Dry_fruits=$costs[51];
        $Dry_Cocont=$costs[52];
        $Dosaginjalu=$costs[53];
        $Daniyalu=$costs[54];
        $coconuts=$costs[55];
        $Chekrala_pindi=$costs[56];
        $Chekka=$costs[57];
        $Bombay_Ravva=$costs[58];
        $Avisaginjalu=$costs[59];
        $Aloo=$costs[60];
        $Allam=$costs[61];
        $Aavapindi=$costs[62];
        $Aavalu=$costs[63];
        $Chintapandu=$costs[64];
  
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
  height: 450px; 
  max-height: 450px;
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
tr{
  font-size: 22px;
 }





#submitupdate,#submitdisplay{
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
#submitupdate:hover,#submitdisplay:hover {
  background-color:  #8B0000;
  color: white;
  
}
.updation{
  padding: 10px;
}
.updation input{
  padding: 10px;
}
#itemtype{
  padding: 10px;
}
#attr{
  padding: 15px;
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
        <li><a href="./accounts.php">Accounts</a></li>
        <li><a href="./raw_materials.php">Raw Materials</a></li>
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
                <form method="post" action="login.php">
                  <select name="attr", id="attr">
                    <option value="Price">Price</option>
                    <option value="stock_available">Stock</option>
                  </select>
                    <input name="itemcode"  type="text"  autocomplete="off" placeholder="Item code">
                    <input name="value" type="number" autocomplete="off" placeholder="Value">
                    <input type="submit" id='submitupdate' name="submitupdate" value='Update'>    
                </form>
                <form method="post"  action="login.php">
                        <select name='itemtype' id="itemtype">
                            <option value='Hot'>Hot</option>
                            <option value='Sweet'>Sweet</option>
                            <option value='Powders'>Powders</option>
                            <option value='Pickle'>Pickle</option>
                            <option value='Papads'>Papads</option>
                            <option value='All'>All</option>
                        </select>
                        
                        <input type="submit" id='submitdisplay' name="submit" value='Display'>    
                    
                </center></div>
               
                </form>
               
            </div>
       
    <div class="container" id="container">
        <table border="1" class="table table-hover">
            <thead class="tablehead">

                <tr>
                    <th>Item Code</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Production Cost</th>
                    <th>Stock Available</th>
                </tr>
            </thead>
            <tbody class="tablebody">

                <tr>
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
                                // LOOP TILL END OF DATA
                                while($rows=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                                <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows["ItemCode"];?></td>
                                <td><?php echo $rows["Item"];?></td>
                                <td><?php echo $rows["Price"];?></td>
                                <td><?php 
                                  

                                switch($rows['ItemCode']){
                                  case 'H01':
                                    $pcost=(($Chekrala_pindi*2)+($Salt*0.1)+($Mirchi_Powder*0.1)+($Vamu*0.05)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/2.75,2);
                                    echo $pcost;
                                break;
                                case 'H02':
                                    $pcost=(($Chekrala_pindi*2)+($Salt*0.1)+($Mirchi_Powder*0.1)+($Vamu*0.05)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/2.75,2);
                                    echo $pcost;
                                break;
                                case 'H03':
                                  $pcost=(($JonnaFlour*2)+($Salt*0.1)+($Mirchi_Powder*0.1)+($Vamu*0.05)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/2.75,2);
                                    echo $pcost;
                                break;
                                case 'H04':
                                  $pcost=(($Rice_Flour*2)+($Jeera*0.1)+($Pachi_pappu*0.1)+($Saggu_Biyam*0.1)+($Salt*0.1)+($Green_Chilli*0.25)+($Allam*0.1)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/3,2);
                                    echo $pcost;
                                break;
                                case 'H05':
                                  $pcost=(($JonnaFlour*2)+($Jeera*0.1)+($Pachi_pappu*0.1)+($Saggu_Biyam*0.1)+($Salt*0.1)+($Green_Chilli*0.25)+($Allam*0.1)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/2.75,2);
                                    echo $pcost;
                                break;
                                case 'H06':
                                  $pcost=(($Sajjalu*2)+($Jeera*0.1)+($Pachi_pappu*0.1)+($Saggu_Biyam*0.1)+($Salt*0.1)+($Green_Chilli*0.25)+($Allam*0.1)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/2.75,2);
                                    echo $pcost;
                                break;
                                case 'H07':
                                  $pcost=(($Maida*2)+($Wheat_Flour*0.5)+($Bombay_Ravva*0.2)+($Ghee*0.25)+($Salt*0.1)+($Mirchi_Powder*0.25)+($Vamu*0.1)+($Oil*1.5) )+50;
                                    $pcost = $pcost+($pcost*0.1);
                                    $pcost = $pcost+($pcost*0.12);
                                    $pcost = round($pcost/3,2);
                                    echo $pcost;
                                break;
                                case 'Pi01':
                                  $pcost=(($Allam*2)+($Chintapandu*2)+($Org_Bellam*2)+($Salt*2)+($Mirchi_Powder*2)+($Groundnut_Oil*2)+($Menthi_Pindi*0.1)+($Talinpu_Ginjalu*0.25))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                   $pcost = $pcost+($pcost*0.12);
                                   $pcost = round($pcost/7,2);
                                   echo $pcost;
                                    
                                break;
                                case 'Pi02':
                                  $pcost=(($Gongoora*20)+($Chintapandu*0.3)+($Salt*2)+($Mirchi_Powder*1.5)+($Groundnut_Oil*2)+($Aavapindi*0.2)+($Talinpu_Ginjalu*0.25))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/5,2);
                                   echo $pcost;
                                break;
                                case 'Pi03':
                                  $pcost=(($Kothimera*15)+($Chintapandu*0.75)+($Salt*2)+($Mirchi_Powder*1.5)+($Groundnut_Oil*1.5)+($Aavapindi*0.2)+($Talinpu_Ginjalu*0.25))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/7.5,2);
                                   echo $pcost;
                                break;
                                case 'Pi04':
                                  $pcost=(($Pandumirchi*50)+($Chintapandu*11)+($Salt*25)+($Mamidi_Allam*5)+($Aamudam*1))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/75,2);
                                   echo $pcost;
                                break;
                                case 'Pi05':
                                  $pcost=(($Tomato*5)+($Chintapandu*0.5)+($Salt*2)+($Mirchi_Powder*1.5)+($Groundnut_Oil*2)+($Aavapindi*0.1)+($Menthi_Pindi*0.05)+($Talinpu_Ginjalu*0.25))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/5,2);
                                   echo $pcost;
                                break;
                                case 'Pi06':
                                  $pcost=(($Usirikai*10)+($Chintapandu*1)+($Salt*3)+($Mirchi_Powder*2)+($Groundnut_Oil*5)+($Menthi_Pindi*0.1)+($Talinpu_Ginjalu*0.25))+110;
                                 $pcost = $pcost+($pcost*0.1);
                                 $pcost = $pcost+($pcost*0.12);
                                 $pcost = round($pcost/14,2);
                                   echo $pcost;
                                break;
                                case 'Pi07':
                                  $pcost=(($Kakarakai*5)+($Chintapandu*1)+($Org_Bellam*0.5)+($Salt*1.5)+($Mirchi_Powder*2)+($Groundnut_Oil*4)+($Menthi_Pindi*0.1)+($Talinpu_Ginjalu*0.25))+110;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/7.5,2);
                                   echo $pcost;
                                break;

                                case 'P01':
                                  $pcost=(($Avisaginjalu*0.6)+($Jeera*0.05)+($Pachi_pappu*0.15)+($Minapappu*0.15)+($Mirchi_Powder*0.05)+65);
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P02':
                                  $pcost=(($Sonti*0.35)+($Org_Bellam*0.4)+($Ilachi*0.03)+($Chekka*0.15))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P03':
                                  $pcost=(($Daniyalu*0.8)+($Jeera*0.1)+($Mirchi_Powder*0.05)+($Karivepaku*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P04':
                                  $pcost=(($Dosaginjalu*0.5)+($Jeera*0.05)+($Pachi_pappu*0.15)+($Minapappu*0.1)+($Mirchi_Powder*0.05)+($Verusenaga_pappu*0.1)+($Chintapandu*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P05':
                                  $pcost=(($Kandi_papu*0.8)+($Jeera*0.05)+($Chintapandu*0.1)+($Mirchi_Powder*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P06':
                                  $pcost=(($Daniyalu*0.3)+($Jeera*0.05)+($Pachi_pappu*0.25)+($Minapappu*0.2)+($Mirchi_Powder*0.05)+($Chintapandu*0.1)+($Karivepaku*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P07':
                                  $pcost=(($kobbari*0.75)+($Jeera*0.05)+($Mirchi_Powder*0.05)+65);
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P08':
                                  $pcost=(($Pachi_pappu*0.25)+($Jeera*0.05)+($Mirchi_Powder*0.05)+($Chintapandu*0.1)+($munagaku*0.05)+($Kandi_papu*0.2)+($Daniyalu*0.25)+($Karivepaku*0.02))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P09':
                                  $pcost=(($Daniyalu*0.7)+($Jeera*0.1)+($Mirchi_Powder*0.05)+($Chintapandu*0.1)+(+$Karivepaku*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P10':
                                  $pcost=(($Nuvulu*0.25)+($kobbari*0.2)+($Jeera*0.05)+($Mirchi_Powder*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P11':
                                  $pcost=(($Senaga_pappu*0.75)+($Jeera*0.05)+($Mirchi_Powder*0.05)+($kobbari*0.05))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P12':
                                  $pcost=(($Verusenaga_pappu*0.8)+($Jeera*0.025)+($Mirchi_Powder*0.05)+($Podina*0.05)+($Chintapandu*0.07))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P13':
                                  $pcost=(($Kandi_papu*0.2)+($Pachi_pappu*0.2)+($Minapappu*0.2)+($Daniyalu*0.25)+($Jeera*0.05)+($Miriyalu*0.01)+($Rathipuvu*0.01)+($Maratimogga*0.01)+($Mirchi_Powder*0.02)+($Rice*0.05)+($Karivepaku*0.01))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                               
                                case 'P14':
                                  $pcost=(($Kandi_papu*0.15)+($Pachi_pappu*0.2)+($Minapappu*0.15)+($Daniyalu*0.3)+($Jeera*0.05)+($Miriyalu*0.02)+($Aavalu*0.02)+($Nuvulu*0.05)+($Mirchi_Powder*0.03)+($Rice*0.02)+($Karivepaku*0.02))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P15':
                                  $pcost=(($Verusenaga_pappu*0.75)+($Jeera*0.05)+($Mirchi_Powder*0.25))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                               
                                case 'P16':
                                  $pcost=(($Sonti*1)+($Jeera*0.1)+($Mirchi_Powder*0.25)+($Salt*0.2)+($Ghee*0.25))+65;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'P17':
                                  $pcost=(($Pipallu*0.25)+($Jeera*0.25)+($Rocksalt*0.25))+115;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                                case 'S01':
                                  $pcost=(($Rice*1)+($Org_Bellam*0.75)+($Ilachi*0.01)+($Dry_Cocont*0.1)+($Ghee*0.25)+($Kaju*0.05))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2.5,2);
                                   echo $pcost;
                                  break;
                                case 'S02':
                                  $pcost=(($Rice*2)+($Org_Bellam*1.75)+($Ilachi*0.1)+($Nuvulu*0.1)+($Oil*1))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/4,2);
                                   echo $pcost;
                                  break;
                                case 'S03':
                                  $pcost=(($Rice*2)+($Org_Bellam*1.75)+($Ilachi*0.1)+($Nuvulu*0.1)+($Ghee*1))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/4,2);
                                   echo $pcost;
                                  break;
                                case 'S04':
                                  $pcost=(($Senaga_pappu*1)+($Org_Bellam*1.5)+($Ilachi*0.1)+($Nuvulu*0.1)+($Dry_Cocont*0.5)+($Maida*1)+($Bombay_Ravva*0.1)+($Oil*0.5))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/4.5,2);
                                  echo $pcost;
                                  break;
                                case 'S05':
                                  $pcost=(($Sugar*1)+($Ilachi*0.1)+($Gasalu*0.1)+($Kaju*0.15)+($Dry_Cocont*1)+($Maida*1)+($Bombay_Ravva*0.1)+($Oil*0.5))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/3.5,2);
                                  echo $pcost;
                                  break;
                                case 'S06':
                                  $pcost=(($coconuts*6)+($Ilachi*0.1)+($Org_Bellam*2.5)+($Ghee*0.25))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2.75,2);
                                  echo $pcost;
                                  break;
                                case 'S07':
                                  $pcost=(($Sajjalu*2)+($Dry_Cocont*0.2)+($Org_Bellam*1)+($Ilachi*0.1)+($Oil*1))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/3,2);
                                  echo $pcost;
                                  break;
                                case 'S08':
                                  $pcost=(($Maida*1.5)+($Wheat_Flour*0.5)+($Org_Bellam*1.5)+($Ilachi*0.1)+($Oil*1.5)+($Bombay_Ravva*0.2)+($Ghee*0.25))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/4,2);
                                  echo $pcost;
                                  break;
                                case 'S09':
                                  $pcost=(($Groundnut*1)+($Org_Bellam*0.75)+($Ilachi*0.01)+($Dry_Cocont*0.2))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/1.75,2);
                                  echo $pcost;
                                  break;
                                case 'S10':
                                  $pcost=(($Ragulu*1)+($Org_Bellam*1)+($Ghee*0.5)+($Kaju*0.15))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2.3,2);
                                  echo $pcost;
                                  break;
                                case 'S11':
                                  $pcost=(($Avisaginjalu*1)+($Org_Bellam*1)+($Nalla_Nugulu*0.2)+($Kaju*0.15)+($Groundnut*0.2))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2.3,2);
                                  echo $pcost;
                                  break;
                               
                                case 'S12':
                                  $pcost=(($Nalla_Nugulu*1)+($Org_Bellam*1)+($Groundnut*0.25)+($Dry_Cocont*0.1)+($Ilachi*0.01))+50;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2,2);
                                  echo $pcost;
                                  break;
                                case 'S14':
                                  $pcost=(($Minumulu*2)+($Org_Bellam*1)+($Ghee*0.5))+80;
                                  $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/2,2);
                                  echo $pcost;
                                  break;
                                  case 'S15':
                                  $pcost=(($Rice*2)+($Org_Bellam*1.75)+($Ilachi*0.1)+($Nuvulu*0.1)+($Oil*1)+($Dry_fruits*0.25))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/4,2);
                                   echo $pcost;
                                  break;
                                  case 'S16':
                                  $pcost=(($Kaju*1)+($Org_Bellam*0.6)+($Ilachi*0.1)+($Ghee*0.5))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/1.5,2);
                                   echo $pcost;
                                  break;
                                  case 'S17':
                                  $pcost=(($Groundnut*1)+($Org_Bellam*0.75)+($Ilachi*0.1))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/1.75,2);
                                   echo $pcost;
                                  break;
                                  case 'S18':
                                  $pcost=(($senaga_Flour*1)+($Org_Bellam*2)+($Ilachi*0.01)+($Oil*1))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/3,2);
                                   echo $pcost;
                                  break;
                               
                                  case 'S19':
                                  $pcost=(($Rice*1)+($Org_Bellam*0.75)+($Dry_Cocont*0.25))+50;
                                   $pcost = $pcost+($pcost*0.1);
                                  $pcost = $pcost+($pcost*0.12);
                                  $pcost = round($pcost/0.9,2);
                                   echo $pcost;
                                  break;
                               
                                default:
                                echo " ";

                              }
                                ?></td>
                                <td><?php echo $rows["stock_available"];?></td>
                            </tr>
                    <?php
                        }
                        $con->close();
                    ?>
                </tr>
            </tbody>

        </table>
    </div>                
               

            
    <input type="button" onclick="printDiv()" value="Print" />
    
            <script src="index1.js"></script> 
</body>
    </html>