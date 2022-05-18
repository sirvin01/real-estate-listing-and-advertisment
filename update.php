<?php
require 'config.php';
include 'header1.php';
$id = $_GET['id'];
$query = "SELECT * FROM properties WHERE id = '$id' ";

$data = mysqli_query($conn,$query);
// $total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

if(isset($_POST["update"])){
     $protype = $_POST['protype'];
     $username = $_POST['username'];
    //  $type = $_POST['type'];
     $location = $_POST['location'];
     $city = $_POST['city'];
     $propname = $_POST['propname'];
     $description = $_POST['description'];
     $status = $_POST['status'];
     // $house = $_POST['house'];
     $price = $_POST['price'];
 $query = "UPDATE properties set protype = '$protype',location= '$location',city='$city',propname='$propname',description='$description',status='$status',price='$price' WHERE id = $id";

 $data = mysqli_query($conn,$query);
 if($data)
 {
    
     echo
      "
      <script>
        alert('Data updated successfully');
        document.location.href = 'view.php';
      </script>
      ";
      
 }
 else{
     echo "Update  failed";
 }
   
   }
 
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <style>
        .input-group{
            width: 100%;
            margin-top: 10px;
        }
    </style>
	<title>Update Details</title>
</head>
<body>
	<center>
	<div class="container" style="margin-top: 20px;">
	<div class="form1">
	<!-- <p style=" color: #111;font-weight: 10;font-size: small; "><?php echo "<h3>Hey " . $_SESSION['username'] . " Register property</h3>"; ?></p> -->
		<form action="" method="POST" autocomplete="off" enctype="multipart/form-data" class="login-email">
	    	<!-- <div class="input-group">
			    	<input value="<?php echo $result['username'];?>" type="text" placeholder="username" name="username"  required>
		   	</div> -->
            <div class="input-group">
                <input value="<?php echo $result['protype'];?>"  list="type" name="protype" placeholder="Property type" required>
                    <datalist id="type" >
                            <option value="House">House</option>           
                            <option value="Apartment">Apartment</option>
                            <option value="Office">Office</option>
                            <option value="Room">Room</option>
                    </datalist><br>
            </div>
        <div class="input-group">
				    <input value="<?php echo $result['location'];?>"  type="text" placeholder="E.g.,Nairobi" name="city"  required>
			  </div>
        <div class="input-group">
          <input value="<?php echo $result['city'];?>"  type="text" placeholder="E.g., Ngara" name="location"  required>
        </div>
        <div class="input-group">
			    	<input value="<?php echo $result['propname'];?>"  type="text" placeholder="E.g., Cityview plaza" name="propname"  required>
		  	</div>
			  <div class="input-group">
				  <input value="<?php echo $result['description'];?>"  type="text" placeholder="Property description" name="description" required>
			  </div>
        <div class="input-group">
			    	<input value="<?php echo $result['price'];?>"  type="text" placeholder="Property price" name="price" required>
			  </div>
        <div class="input-group">
                <input value="<?php echo $result['status'];?>"  list="stats" name="status" placeholder="Property status" required>
                    <datalist id="stats" >
                            <option value="Available for sale"
                            
                            >Available for sale</option>           
                            <option value="Available for rent">Available for rent</option>
                            <option value="Available for sale/rent">Available for sale/rent</option>
                    </datalist><br>
        </div>
       <div class="input-group">
			<button name="update" class="btn">Update</button>
	  </div>
		</form>
		</div>
	</div>
	</center>
</body>
</html>