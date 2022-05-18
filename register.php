<?php 

include 'config.php';
include "header.php";

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	// $number = $_POST['number'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email','$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Registration successful!.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} 
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
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
<section class="Contact"  style="margin-bottom: 50px;border-radius:20px;" >
      <div class="container">
	  <form action="" method="POST" id="signup"  class="login-email">
            <fieldset >
			<div class="input-group">
				<input type="text" placeholder="Username" id="username" name="username" value="<?php echo $username; ?>" ><br>
				<small style="color: red;font-size:medium" ></small>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>" ><br>
				<small style="color: red;font-size:medium"></small>
			</div>
			<!-- <div class="input-group">
				<input type="text" placeholder="number" id="number" name="number" value="<?php echo $number; ?>" ><br>
				<small style="color: red;font-size:medium"></small>
			</div> -->
            <div class="input-group">
				<input type="password" placeholder="Password" id="password" name="password" value="<?php echo $_POST['password']; ?>" ><br>
				<small style="color: red;font-size:medium"></small>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" id="confirm-password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>"><br>
				<small style="color: red;font-size:medium"></small>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" >Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
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