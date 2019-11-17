<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $username = $_POST['username'];
<<<<<<< HEAD:Pages/signup.php
  $AllGood = True;

  if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "<h1>Please Try Againy</h1>";
    $AllGood = False;
    exit(0);
  }
=======
  //$username = $_GET['username'];

  if (!filter_var($username, FILTER_VALIDATE_EMAIL))
    die("Invalid email.");
>>>>>>> 10099312848dc15f15d13ca6c2e7b00ce5ec7005:php/signup.php

  $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //$passwordHash = password_hash($_GET['password'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO EmployeeInfo (Email, PasswordHash) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $passwordHash);

  $stmt->execute();
<<<<<<< HEAD:Pages/signup.php

  $res = $stmt->get_result();
  if ($res) {
    $teamnumber = $res->fetch_assoc();
  } else {
    echo "Couldn't find team number from team name";
    $AllGood = False
    exit(0);
  }

  $stmt = $conn->prepare("INSERT INTO EmployeeInfo (Email, PasswordHash, ScoreFood, ScorePaper, ScoreMixedRecyling, ScorePlasticBottles, ScoreBatteries) VALUES");
  $stmt->bind_param('s', $username);

  $stmt->execute();
  $hash = $stmt->get_result()->fetch_assoc();
  
  if (password_verify($password, $hash)) {
    echo "valid";
  } else {
    echo "invalid";
    $AllGood = False;
  }

if($AllGood == True){
  header("Location: EmployeeAccount.php"}

=======
  $stmt->close();
>>>>>>> 10099312848dc15f15d13ca6c2e7b00ce5ec7005:php/signup.php
?>
