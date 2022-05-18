<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
            width: 100%;
                margin-top: 90px;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: beige;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
        .update, .delete{
        background-color: green;
        text-decoration: none;
        color: white;
        border-radius: 7px;
        border: 0;
        outline: none;
        height: 23px;
        width: 80px;
        font-weight: bold;
        cursor: pointer;
        }
        .delete{
        background-color: red;
        
        }
    
	</style>
</head>
<body>

<?php


include "owners/config.php";
include "header.php";

if(isset($_POST['submit'])){
    $protype = $_POST['protype'];
    $city = $_POST['city'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
 
$query = "SELECT * FROM properties WHERE city = '$city' OR protype = '$protype' OR location = '$location' OR price = '$price' OR status = '$status' OR description = '$description'";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);


}

if($total != 0){
    ?>
    <table border="3",cellspacing = "7">
     <tr>
        <th>Type</th>
        <th>Location</th>
        <th>City</th>
        <th>Status</th>
        
        <th>Price</th>
        <th>Description</th>
        <th>Operations</th>
      </tr>    
     <?php
      while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$result['protype']."</td>
                <td>".$result['location']."</td>
                <td>".$result['city']."</td>
                <td>".$result['status']."</td>
                <td>".$result['price']."</td>
                <td>".$result['description']."</td>
                <td><a class='update'; href='prop.php?id=$result[id]'>View</a>
                <a class='update'; href='delete.php?id=$result[id]'>Owner</a></td>
            </tr> 
             ";
      }
}
else{
    echo "<tr>
    <td>No records </td>
    </tr>";
}
?>
</table>
</body>
</html>