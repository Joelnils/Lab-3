<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); // Servern som används skrivs in här
header("Content-Type: application/json; charset=UTF-8");

// Connectar till database loginmain
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginmain";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $response = array('message' => 'Username or email already taken');
    http_response_code(409);
  } else {
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if(mysqli_query($conn, $sql)) {
      $response = array('message' => 'User created successfully');
      http_response_code(201);
    } else {
      $response = array('message' => 'User creation failed');
      http_response_code(400);
    }
  }
} else {
  $response = array('message' => 'Missing username, password or email');
  http_response_code(400);
}


header('Content-Type: application/json');

echo json_encode($response);
mysqli_close($conn);

?>
