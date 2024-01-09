import express from"express";
import execPhp from "exec-php";

const app = express();

const PORT = 80; // or any port you're using
const IP_ADDRESS = '192.168.84.17'; // Replace with your local IP address
app.get('/', (req, res) => {
    // Path to your PHP file
    const phpFilePath = 'C:/xampp/htdocs/HareKrishna/billing.php';
  
    execPhp(phpFilePath, (error, php, output) => {  
      if (error) {
        res.status(500).send('Error executing PHP code');
      } else {
        res.send(output);
      }
    });
  });
  
//app.use('C:/xampp/htdocs/HareKrishna', express.static(path.join(__dirname, 'C:/xampp/htdocs/HareKrishna')));
app.listen(PORT, IP_ADDRESS, () => {
  console.log(`Server is running at http://${IP_ADDRESS}:${PORT}`);
});
