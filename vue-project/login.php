<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); // Servern som används skrivs in här
header("Content-Type: application/json; charset=UTF-8"); // Talar om att servern "svarar" med en Json-fil

// Connectar till database loginmain med hjälp av mysql
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginmain";


// Kollar om anslutningen till databasen fungerar
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Kollar om cookie med rätt namn från (username) finns i anropet
if (isset($_COOKIE['username'])) {
    // Sparar värdet av cookie i rätt variabel (username)
  $username = $_COOKIE['username'];

  // Hämtar all data från tabellen users i myphp - där användaren matchar
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $data = array(); // Skapar en tom array och lägger till varje rad från resultatet i rätt array
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  $jsonData = json_encode($data); // Gör arrayen till json och skriver ut - Denna gång genom = $jsonData
  echo $jsonData;
} else { // Om det inte finns en cookie med det här namnet hämtas all data från mqsql
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);

  $data = array(); // Skapar tom array och lägger till varje rad från resultat i array
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  $jsonData = json_encode($data); // Samma som rad 31
  echo $jsonData;
}

mysqli_close($conn); // Den här stänger av anslutningen till MYSQL databasen efter användning - Används av säkerhetsskäl för att inte ha en "öppen" anslutning
?>
