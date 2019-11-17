<!DOCTYPE html>
<?php
  include "../config.inc.php";
  $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
  if (!$conn)
    die(mysqli_error($conn));
?>
<html>
<head>
  <title>Bin Battle Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="General.css">

</head>
<body>
  <!--Navbar/Header (Stick on viewpoint-->

  <div class="header">
  
    <a href="login.html">
      <img style="float: left;" src="account.png">
    </a>
    <h1>Bin Battles</h1>
  </div>
  
  <div class="col stats">
    <p></p>
  </div>
  <div class="col LeaderBoard">
  <table>
    <thead>
      <tr>
        <td> Team </td>
        <td> Points </td>
      </tr>
    </thead>
    <tbody>
<?php
  $results = $conn->query("SELECT TeamName, TeamTotal FROM TeamInfo ORDER BY TeamTotal DESC");
  while($row = $results->fetch_assoc()) {
    echo "<tr><td>$row[TeamName]</td>";
    echo "<td>$row[TeamTotal]</td></tr>";
  }
?>
    </tbody>
    </table>  
  </div>

  <div class="footer">
    <img src="facebook.png">
    <img src="twitter.png">
    <img src="linkedin.png">
    <img src="insta.png">
  </div>
</body>
</html>
