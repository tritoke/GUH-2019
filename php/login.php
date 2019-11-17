<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  // get password hash to compare against
  // use prepared statements to prevent sqli
  $stmt = $conn->prepare("SELECT PasswordHash FROM EmployeeInfo WHERE email = ?");
  $stmt->bind_param('s', $username);

  $stmt->execute();
  $hash = $stmt->get_result()->fetch_assoc();
  
  if (password_verify($password, $hash)) {
    echo "valid";
    header("Location: EmployeeAccount.php");
  } else {
    echo "invalid";
  }
?>
