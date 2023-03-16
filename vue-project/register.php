<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); /* Servern som används skrivs in här
Alltså anger att man kan hantera anrop som kommer från en annan server */
header("Content-Type: application/json; charset=UTF-8"); // Talar om att servern "svarar" med en Json-fil

// Connectar till database loginmain
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginmain";

// Skapar en anslutning till MySQL-databasen loginmain
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) { // Kontrollerar om anslutningen till databasen är korrekt och om den misslyckas skrivs ett felmeddelande ut
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) { // Kontrollerar om alla nödvändiga parametrar har skickats in i HTTP-begäran via metoden
  // Hämtar rätt data från http och lagrar den i rätt variabler
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'"; // Kontrollerar om användarnamn eller e-postadress redan finns i databasen
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $response = array('message' => 'Username or email already taken'); // Om användaren redan finns ges status 409
    http_response_code(409);
  } else {
    // Om användaren inte finns i databasen läggs en ny till och ger 201 "User created ..."
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if(mysqli_query($conn, $sql)) {
      $response = array('message' => 'User created successfully');
      http_response_code(201);
    } else {
      $response = array('message' => 'User creation failed');
      http_response_code(400);
      // Ger 400 om det skulle uppstå problem "User creation ..."
    }
  }
} else {
    // Om det saknas input tex username får man ett meddelande
  $response = array('message' => 'Missing username, password or email');
  http_response_code(400);
}


header('Content-Type: application/json');

echo json_encode($response); // Görs om php till json
mysqli_close($conn); // Den här stänger av anslutningen till MYSQL databasen efter användning - Används av säkerhetsskäl för att inte ha en "öppen" anslutning

?>
