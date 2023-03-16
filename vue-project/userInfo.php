<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); // Servern som används skrivs in här
header("Content-Type: application/json; charset=UTF-8"); // Talar om att servern "svarar" med en Json-fil

// Connectar till database loginmain med hjälp av mysql
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginmain";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error()); // Om det inte går att ansluta till databasen så kommer det upp ett errormeddelande
}

if(isset($_GET['username'])) { // Kontrollerar om GET parametern är satt (username)
  $username = $_GET['username']; // Hämtar värdet för username

  $sql = "SELECT * FROM users WHERE username='$username'"; //Select här hämtar userdata från databasen (username)
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $response = array('username' => $row['username'], 'email' => $row['email'], );
    http_response_code(200); // Ger status 200 om det finns en user med rätt username, email etc
  } else {
    $response = array('message' => 'User not found'); // Ger 404 om det inte går att hämta rätt user
    http_response_code(404);
  }
} else {
  $response = array('message' => 'Username parameter missing');
  http_response_code(400); // Status 400 om Username parametern saknas
}

mysqli_close($conn); // Den här stänger av anslutningen till MYSQL databasen efter användning - Används av säkerhetsskäl för att inte ha en "öppen" anslutning


echo json_encode($response); // Görs om php till json
?>
