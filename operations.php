<?php

session_start();

include "../admin/header.php";
$user = 'root';
$password = '';
$database = 'coding';
$servername='localhost';

$mysqli = new mysqli($servername, $user,
				$password, $database);


if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

$sql = "SELECT * FROM properties WHERE username = '$_SESSION[username]' ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
	<meta charset="UTF-8">
	<title>Houses</title>
	
	<style>

    
	</style>
	<link rel="stylesheet" href="../contact.css">
</head>

<body>
	<section>
		<h1>HOUSE DETAILS</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Username</th>
				<th>Location</th>
                <th>City</th>
				<th>Status</th>
				<th>Property name</th>
				<th>Price</th>
				<th>Description</th>
                <th>Operations</th>
			</tr>

			<?php 
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
		
				<td><?php echo $rows['username'];?></td>
				<td><?php echo $rows['location'];?></td>
                <td><?php echo $rows['city'];?></td>
				<td><?php echo $rows['status'];?></td>
               <td><?php echo $rows['propname'];?></td>
				<td><?php echo $rows['price'];?></td>
				<td><?php echo $rows['description'];?></td>
                
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	<div class="footer">
      <div class="footer1">
          <p>Created by Vincent Mwanzia</p>
          &copy;2022 Second Year project
          <!-- <button><a href="header.php"></a></button> -->
      </div>
    </div>
</body>

</html>