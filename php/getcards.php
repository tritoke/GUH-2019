<?php
  include "../config.inc.php";

  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  
  $res = $conn->query("SELECT CardID FROM EmployeeInfo WHERE CardID");
  while ($cardid = $res->fetch_assoc())
    echo $cardid['CardID'] . "\n";
?>
