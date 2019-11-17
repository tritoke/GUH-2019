<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $username = $_POST['username'];

  if (!filter_var($username, FILTER_VALIDATE_EMAIL))
    die("Invalid email.");

  $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO EmployeeInfo (Email, PasswordHash) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $passwordHash);

  $stmt->execute();

  $res = $stmt->get_result();
  if (!$res)
    die(mysqli_error($conn));
  
  header("Location: EmployeeAccount.php");

  $stmt->close();
?>
