<?php 

include 'config.php';
include "header.php";

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		 if($row['role'] == 'admin')
		 header("Location: ../admin/login.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
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
	<script>
	function myfunction() {
    var x = document.getElementById("showpass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
	</script>
	<title>Registration</title>
</head>
<body>
<center>
<section class="Contact"  style="margin-bottom: 50px;border-radius:20px;height:100px" >
      <div class="container" >
	  <form action="" method="POST" id="signup"  class="login-email">
            <fieldset style="height: 50%;">
			
			<div class="input-group">
				<input type="email" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>" ><br>
				<small style="color: red;font-size:medium"></small>
			</div>
            <div class="input-group">
				<input type="password" placeholder="Password" id="showpass"  name="password" value="<?php echo $_POST['password']; ?>" ><br>
				<small style="color: red;font-size:medium"></small>
            </div>
			<!-- <div style="display: block;margin-top:0px;margin-left:0px">
				<input type="checkbox" onclick="myfunction()"> Show password
            </div> -->
			<div class="input-group">
				<button name="submit" class="btn" >Login</button>
			</div>
			<p class="login-register-text" style="margin-top: 20px;" >Don't have an account? <a href="signup.php">Register Here</a>.</p>
            </fieldset>
            </form>
      </div>
    </section>
</center>

	<script src="../script.js"></script>
</body>
</html>