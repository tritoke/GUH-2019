<!DOCTYPE html>
<?php
include "../config.inc.php";
 $conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
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
		<table>
		 <?php
		 $results = mysql_query("SELECT ScoreFood, ScorePaper, ScoreMixedR, ScorePBottles, ScoreBatteries FROM TeamsInfo");
		 while($row = mysql_fetch_array($results)) {
		 	?>
                 <tr>
                    <td>Food Recycling:</td>
                    <td><?php echo $row['ScoreFood']?></td>
                </tr>
                 <tr>
                    <td>Paper Recycling:</td>
                    <td><?php echo $row['ScorePaper']?></td>
                </tr>
                 <tr>
                    <td>Mixed Recycling:</td>
                    <td><?php echo $row['ScoreMixedR']?></td>
                </tr>
                 <tr>
                    <td>Plastic Bottles Recycling:</td>
                    <td><?php echo $row['ScorePBottles']?></td>
                </tr>
                 <tr>
                    <td>Batteries Recycling:</td>
                    <td><?php echo $row['ScoreBatteries']?></td>
                </tr>
         <?php
            }
            ?>
        </tbody>
        </table>			
	</div>
	<div class="col LeaderBoard">
		 <table>
			<thead>
			<tr>
				<td> Team </td>
				<td> Points </td>
			</tr>
		</thead>
		<tbody>>
             <?php
		 $results = mysql_query("SELECT TeamID, (ScoreFood + ScorePaper + ScoreMixedR + ScorePBottles + ScoreBatteries) as TotalRecycle FROM EmployeeInfo ORDER BY TotalRecycle DECS");
		 while($row = mysql_fetch_array($results)) {
		 	?>
                 <tr>
                    <td><?php echo $row['TeamId']?></td>
                    <td><?php echo $row['TotalRecycke']?></td>
                </tr>
         <?php
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
