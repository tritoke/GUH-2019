<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  // needs username, recyling type, amount
  //$username = $_POST['username'];
  $username = $_GET['username'];

  if (!filter_var($username, FILTER_VALIDATE_EMAIL))
    die("Invalid email.");


  $type = $_GET['type'];
  mappings = array(
     "1" => "ScoreFood",
     "2" => "ScorePaper",
     "3" => "ScorePBottles",
     "4" => "ScoreBatteries"
  );

  if (!array_key_exists($type, $mappings))
    die("Invalid score type.");

  $field = $mappings[$type];

  $stmt = $conn->prepare("SELECT $field FROM EmployeeInfo WHERE Email = ?");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $res = $stmt->get_result();

  $stmt.close();

  $old_score = $res->fetch_assoc()[$field];

  var_dump($old_score);

  $new_score = $old_score + 1;

  $stmt = $conn->prepare("UPDATE EmployeeInfo SET $field = $new_score WHERE Email = ?");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $stmt->close();
?>
