<?php
include "header1.php";
include "../owners/config.php";

session_start();
error_reporting(0);

$query = "SELECT * FROM users WHERE username = '$_SESSION[username]' ";

$data = mysqli_query($conn,$query);
// $total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contact.css">
    <title>Contact Us</title>
</head>
<body>
    <center>
    <section class="Contact"  style="margin-bottom: 50px;" >
      <div class="container">
            <center><h3  style="margin-bottom: 20px;">Contact admin</h3></center>
            <p style="margin-bottom: 20px;">
                Please contact the admin for assistance.
            </p>
            <form action="https://formspree.io/f/mlezbzwq" method="POST">
            <fieldset>
                <input type="text" name="name" style="width: 100%;" value="<?php echo $result['username'];?>"  id="">
                <input type="email" name="_replyto" style="width: 100%;" value="<?php echo $result['email'];?>" id="">
                <textarea name="message" id="" placeholder="I would like to upgrade my registration status." style="width: 100%;" cols="10" rows="10"></textarea>
                <!-- <input type="file" name="_replyto" style="width: 100%;"  id=""> -->
                <button style="width: 100%;">Send</button>
                <input type="hidden" name="_confirmation" value="Thank you for contacting Us!">
            </fieldset>
            </form>
      </div>
    </section>
    </center>
</body>
</html>
