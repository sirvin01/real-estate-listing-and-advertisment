<?php
include 'config.php';
include "header.php";

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email' ";
		$result = mysqli_query($conn, $sql);
		if ($email == $_POST['email'] And $username == $_POST['username']) {
			$sql = "UPDATE users set password='" . $_POST["Password"] . "' WHERE email ='" .$_POST['email'] . "'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Password updated successfully .')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Doesn`t Exist.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>
