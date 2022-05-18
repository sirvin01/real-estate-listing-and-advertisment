<?php

include 'config.php';
include 'header1.php';

// $id = $_GET['id'];
session_start();
error_reporting(0);

$query = "SELECT * FROM properties WHERE username = '$_SESSION[username]' ";
$data = mysqli_query($conn,$query);
// $total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

if(isset($_POST["submit"])){
   $protype = $_POST['protype'];
  	$username = $_POST['username'];
    $location = $_POST['location'];
    $city = $_POST['city'];
    $propname = $_POST['propname'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    // $house = $_POST['house'];
    $price = $_POST['price'];

  if($_FILES["house"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["house"]["name"];
    $fileSize = $_FILES["house"]["size"];
    $tmpName = $_FILES["house"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO properties (username,protype,city,location,propname,description,price,status,house)
      VALUES('$username','$protype','$city','$location','$propname','$description','$price','$status','$newImageName')";
      mysqli_query($conn, $query);
      
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'property.php';
      </script>
      ";
    
    }
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
    <section class="Contact"  style="margin-bottom: 10px;border-radius:20px;" >
    <div class="container">
    <form action="" method="POST"  enctype="multipart/form-data" id="signup" autocomplete="off" class="login-email">
        <fieldset>
          <div class="input-group">
			    	<input type="hidden"  placeholder="username" value="<?php echo $_SESSION['username']?>" name="username"  required>
		   	</div>
            <div class="input-group">
                <input list="protype" name="protype" type="text" placeholder="Property type" required>
                    <datalist id="protype" >
                        <option value="House">House</option>           
                        <option value="Apartment">Apartment</option>
                        <option value="Office">Office</option>
                        <option value="Room">Room</option>
                    </datalist><br>
            </div>
        <div class="input-group">
				    <input type="text" placeholder="E.g.,Nairobi" name="city"  required>
			  </div>
        <div class="input-group">
          <input type="text" placeholder="E.g., Ngara" name="location"  required>
        </div>
        <div class="input-group">
			    	<input type="text" placeholder="E.g., Cityview plaza" name="propname"  required>
		  	</div>
			  <div class="input-group">
				  <input type="text" placeholder="Property description" name="description" required>
			  </div>
        <div class="input-group">
			    	<input type="text" placeholder="Property price" name="price" required>
			  </div>
        <div class="input-group">
                <input list="stats" type="text" name="status" placeholder="Property status" required>
                    <datalist id="stats" >
                            <option value="Available for sale">Available for sale</option>           
                            <option value="Available for rent">Available for rent</option>
                            <option value="Available for sale/rent">Available for sale/rent</option>
                    </datalist><br>
        </div>
        <div class="input-group">
				   <input type="file" name="house" accept=".png,.gif,.jpg,.webp" placeholder="profile picture">
		   	</div>
		  	<div class="input-group">
				   <button name="submit" class="btn">Register</button>
			  </div> 
    <!-- <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p> -->
      </fieldset>
    </form>
    </div>
    </section>
</center>
 <script src="../script.js"></script>
<center>
<div class="footer">
      <div class="footer1">
          <p>Created by Vincent Mwanzia</p>
          &copy;2022 Second Year project
          <!-- <button><a href="header.php"></a></button> -->
      </div>
    </div>
</center>

</body>
</html>