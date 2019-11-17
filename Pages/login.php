<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT PasswordHash FROM EmployeeInfo WHERE Email = ?");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  if ($res = $stmt->get_result()) {
    $rows = $res->fetch_assoc();
    $hash = array_pop($rows);
    
    if (password_verify($password, $hash)) {
      header("Location: EmployeeAccount.php");
    } else {
      echo "invalid";
    }
  }
?>
