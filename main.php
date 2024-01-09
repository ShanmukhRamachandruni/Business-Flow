<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Logo -Recovered--02.jpg">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Nanda's</title>
<style>
    
*,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: whitesmoke;
}

form{
    height: 35  0px;
    width: 500px;
    background-color: #f7ba36;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
    
}
form *{
    font-family: 'Poppins',sans-serif;
    
    
    letter-spacing: 0.5px;
    outline: none;
    border: none;
    
}
form h3{
    font-size: 32px;
    color: #8B0000;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 24px;
    font-weight: 300;
}
::placeholder{
    color: black;
    opacity: 1;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #8B0000;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
  background-color:  #8B0000;
  color: #e5e5e5;
  
}
.column-left{flex: 75%;
    padding: 16px;
  
   
    
}
.column-left img{
    width: 80%;

}
    .column-right{
        flex:25%;
        padding: 100px 50px;
    }
    .forms{
        flex: 50%;
    }
.mainpage{
    display: flex;
    height: 80vh;
    
}
.container-fluid img {
  width: 180px;
  margin-left: 35%;
}
.navbar{
  
  background-color: #f7ba36;
  height: 100px;
}
.border1{
    background-color: #8B0000;
    height: 8px;
}
.container-fluid  .krishna{
    width: 250px;
    margin-left: 0%;
}

</style>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }

      
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


    </script>
    

</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
        <img class="krishna" src="krishna.png">
      <img src="logo1.png" alt="">
      
    
  </div>
</nav>
<div class="border1"></div>
    <div class="mainpage">
    
        <div class="column-left">
           
                <img src="logos.jpg">
                
          
  
            
                
            
        </div>
   
        
        <div class="column-right">
        
            <form id="loginForm">
                <h3>Login Here</h3>
                <input type="text" name="username" autocomplete="off" placeholder="Username"> 
                <input type="password" name="password"  autocomplete="off" placeholder="Password">
                <button type="submit" value="Login" onclick="validateform()" >Login</button>
            </form>
        </div>
    </div>

<script src="index1.js"></script> 
    
</body>
</html>