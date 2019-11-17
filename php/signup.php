<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $username = $_POST['username'];

  if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "<h1>INVALID EMAIL FUCK OFF</h1>";
    exit(0);
  }

  $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $teamname = $_POST['teamname'];
  $stmt = $conn->prepare("SELECT TeamNumber FROM TeamInfo WHERE TeamName = ?");
  $stmt->bind_param('s', $teamname);

  $stmt->execute();

  $res = $stmt->get_result();
  if ($res) {
    $teamnumber = $res->fetch_assoc();
  } else {
    echo "Couldn't find team number from team name";
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
  }
?>
