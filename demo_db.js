var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "Bakery"
});
con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM menu WHERE ItemType='Hot'", function (err, result, fields) {
      if (err) throw err;
      console.log(result[0]);
    });
  });