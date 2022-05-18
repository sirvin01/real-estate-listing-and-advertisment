<?php

include 'config.php';
include 'header.php';

if(isset($_POST["submit"])){
   $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

 if ($password == $cpassword){
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
    
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
            $query = "INSERT INTO users (username,email,password,house)
            VALUES('$username','$email','$password','$newImageName')";
            mysqli_query($conn, $query);
            
            echo
            "
            <script>
                alert('Registartion successful!');
                document.location.href = 'login.php';
            </script>
            ";
    
    }
  }
 }
 }
 else {
    echo "<script>alert('Email Already Exists.')</script>";
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
				<input type="text" placeholder="Username" id="username" name="username"><br>
                <small style="color: red;font-size:medium" ></small>
			</div>
            <div class="input-group">
				<input type="email" placeholder="email" id="email" name="email"><br>
                <small style="color: red;font-size:medium" ></small>
			</div>
            <div class="input-group">
                 <input type="password" placeholder="Password" id="password" name="password"> <br>
                 <small style="color: red;font-size:medium" ></small>
            </div>
            <div class="input-group">
			    <input type="password"  placeholder="Confirm Password" id="confirm-password" name="cpassword"><br>
                <small style="color: red;font-size:medium" ></small>
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
	<div class="footer" style="margin-top:250px;">
      <div class="footer1">
          <p>Created by Vincent Mwanzia</p>
          &copy;2022 Second Year project
          
      </div>
    </div>
</center>
</body>
</html>