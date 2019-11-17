<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $cardid = $_GET['cardid'];

  $type = $_GET['type'];
  $mappings = array(
     "1" => "ScoreFood",
     "2" => "ScorePaper",
     "3" => "ScorePBottles",
     "4" => "ScoreBatteries"
  );

  if (!array_key_exists($type, $mappings))
    die("Invalid score type.");

  $field = $mappings[$type];

  $stmt = $conn->prepare("SELECT $field,ScoreTotal,TeamID FROM EmployeeInfo WHERE CardId = ?");
  $stmt->bind_param("s", $cardid);

  $stmt->execute();


  if ($res = $stmt->get_result())
    $result = $res->fetch_assoc();

  $old_score = $result[$field];
  $old_total = $result["ScoreTotal"];

  $TeamID = $result["TeamID"];

  $new_score = $old_score + 1;
  $new_total = $old_total + 1;

  $stmt = $conn->prepare("UPDATE EmployeeInfo SET $field = $new_score, ScoreTotal = $new_total WHERE CardId = ?");
  $stmt->bind_param("s", $cardid);

  $stmt->execute();
  $stmt->close();

  $conn->query("UPDATE TeamInfo SET TeamTotal = $new_total WHERE TeamID = $TeamID");
?>
