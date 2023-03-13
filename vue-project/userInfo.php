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

if(isset($_GET['username'])) {
  $username = $_GET['username'];

  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $response = array('username' => $row['username'], 'email' => $row['email'], );
    http_response_code(200);
  } else {
    $response = array('message' => 'User not found');
    http_response_code(404);
  }
} else {
  $response = array('message' => 'Username parameter missing');
  http_response_code(400);
}

mysqli_close($conn);

echo json_encode($response);
?>
