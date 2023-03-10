<?php

if (isset($_COOKIE['username'])) {

  $username = $_COOKIE['username'];// Hämtar user från database
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    echo json_encode($user);
  } else {
    echo json_encode(array('error' => 'User not found')); // utan user så får man error message
  }
} else {
  echo json_encode(array('error' => 'User not logged in')); // ger error om man inte är inloggad
}
?>
