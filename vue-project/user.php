 <!--
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginmain";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_COOKIE['loggedInUser'])) {
  $loggedInUser = $_COOKIE['loggedInUser'];

  $sql = "SELECT * FROM users WHERE username='$loggedInUser'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $response = array('username' => $row['username'], 'email' => $row['email']);
    http_response_code(200);
  } else {
    $response = array('message' => 'User not found');
    http_response_code(404);
  }
} else {
  $response = array('message' => 'User not logged in');
  http_response_code(401);
}

header('Content-Type: application/json');

echo json_encode($response);
mysqli_close($conn);
*/?> -->
