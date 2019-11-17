<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $teamname = $_GET['teamname'];

  $stmt = $conn->prepare("INSERT INTO TeamInfo (TeamName) VALUES (?)");
  $stmt->bind_param("s", $teamname);

  $stmt->execute();
  echo mysqli_error($conn);
  $stmt->close();
?>
