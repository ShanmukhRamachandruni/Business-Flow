function validateform(){

  document.getElementById("loginForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission
    
      var username = document.getElementsByName("username")[0].value;
      var password = document.getElementsByName("password")[0].value;
    
      // Assume some authentication logic here
     // var isAuthenticated = authenticate(username, password);
    
      if (username=="user"&&password=="pass") {
        // Redirect to the dashboard page after successful login
        window.location.href = "login.php"; // Replace with the desired page URL
      } 
      
     else if (username=="bill"&&password=="pass") {
        // Redirect to the dashboard page after successful login
        window.location.href = "billing.php"; // Replace with the desired page URL
      } 
      
      
      else {
        alert("Login failed. Please try again.");
      }
    });
  }
   
    function gotomain(){
      window.location.href = "main.php";
    }
  
  function payment(){
    var my_time=new Date();
      short=my_time.toString();
      document.getElementsByName("Payment_time")[0].value=short.substring(3,24);
    alert("Paid");
  }
 
function printDiv() {
     var printContents = document.getElementById('container').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
