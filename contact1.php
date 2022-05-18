<?php
include "header.php";
include "owners/config.php";


$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id' ";

$data = mysqli_query($conn,$query);
// $total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
    $role = $_POST['role'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

    $query = "UPDATE users set role='$role' WHERE id = $id";

    $data = mysqli_query($conn,$query);
    if($data)
    {  echo
         "
         <script>
           alert('Data updated successfully');
           document.location.href = 'agent1.php';
         </script>
         ";
    }
    else{
        echo "Update  failed";
    }      }
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact owner</title>
     <link rel="stylesheet" href="styl.css">
     
</head>
<body>
    <center>
    <section id="Contact">
        <div class="container">
            <center><h3>Contact owner</h3></center>
            <p>
                Please fill in the form below
            </p>
            <form action="https://formspree.io/f/mlezbzwq" method="POST">
            <fieldset>
                <input type="text" name="name" placeholder="Enter your name" id="">
                <input type="email" name="_replyto" placeholder="Enter your email" id="">
                <textarea name="message" id="" placeholder="Enter message" cols="10" rows="10"></textarea>
                <button>Send</button>
                <!-- <input type="hidden" name="_confirmation" value="Thank you for contacting Us!"> -->
            </fieldset>
            </form>
        </div>

    </section>
    </center>
</body>
</html>
