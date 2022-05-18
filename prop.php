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
    <!-- <link rel="stylesheet" type="text/css" href="../styles/register.css"> -->
	<link rel="stylesheet" href="../contact.css">
	<title>Registration</title>
</head>
<body>
<center>
    <section class="Contact"  >
    <div class="container">
      
    <form action="" method="POST"  enctype="multipart/form-data" id="signup"  class="login-email">
      <fieldset>
        <!-- <div class="input-group">
			    	<input type="text" placeholder="username" name="username"  required>
		   	</div> -->
            <div class="input-group">
                <input list="protype" name="protype" type="text" value="<?php echo $result['protype'];?>" placeholder="Property type" required>
                    <datalist id="protype" >
                            <option value="House">House</option>           
                            <option value="Apartment">Apartment</option>
                            <option value="Office">Office</option>
                            <option value="Room">Room</option>
                    </datalist><br>
            </div>
        <div class="input-group">
				    <input type="text" value="<?php echo $result['city'];?>" placeholder="E.g.,Nairobi" name="city"  required>
			  </div>
        <div class="input-group">
          <input type="text" placeholder="E.g., Ngara" value="<?php echo $result['location'];?>" name="location"  required>
        </div>
        <div class="input-group">
			    	<input type="text" placeholder="E.g., Cityview plaza" value="<?php echo $result['propname'];?>" name="propname"  required>
		  	</div>
			  <div class="input-group">
				  <input type="text" placeholder="Property description" value="<?php echo $result['description'];?>" name="description" required>
			  </div>
        <div class="input-group">
			    	<input type="text" placeholder="Property price" value="<?php echo $result['price'];?>" name="price" required>
			  </div>
        <div class="input-group">
                <input list="stats" type="text" name="status" value="<?php echo $result['status'];?>" placeholder="Property status" required>
                    <datalist id="stats" >
                            <option value="Available for sale">Available for sale</option>           
                            <option value="Available for rent">Available for rent</option>
                            <option value="Available for sale/rent">Available for sale/rent</option>
                    </datalist><br>
        </div>
        <!-- <div class="input-group">
				   <input type="file" name="house" accept=".png,.gif,.jpg,.webp" placeholder="profile picture">
		   	</div> -->
		  	<div class="input-group">
				   <button name="update" class="btn">Update</button>
			  </div> 
    <!-- <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p> -->
          </fieldset>
    </form>
    </div>
    </section>
</center>

	<script src="../script.js
</body>
</html>