<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
      width: 90%;
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
  <script>
   function checkdelete()
   {
       return confirm('Are you sure you want to delete this record?');
   }
</script>
</head>
<body>

<?php
// session_start();
// error_reporting(0);
// if($_SESSION['username']!='admin'){

//     echo
//       "
//       <script>
//         alert('Not logged in as admin');
//         document.location.href = '../owners/logout.php';
//       </script>
//       ";
// }

include "../owners/config.php";
include "header.php";

$query = "SELECT * FROM users ";
$query1  = "SELECT username, COUNT(username) FROM properties GROUP BY username";
$data = mysqli_query($conn,$query);
$data1 = mysqli_query($conn,$query1);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$result1 =  mysqli_fetch_assoc($data1);


if($total != 0){
    ?>
    <table border="3">
     <tr>
        <th>NO</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>PROPERTIES</th>
        <th>ROLE</th>
        <th>OPERATIONS</th>
      </tr>    
     <?php
      while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['username']."</td>                
                <td>".$result['email']."</td>
                <td>".$result1['COUNT(username)']."</td>
                <td>".$result['role']."</td>
                
                <td><a class='update'; href='update.php?id=$result[id]'>Update</a>
                <a class='delete'; href='delete.php?id=$result[id]' onclick = 'return checkdelete()'>Delete</a></td>               
             </tr> 
             ";
      }
}
else{
    echo "No records found";
}
?>
</table>
</body>
</html>