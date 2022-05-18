<?php
include "header.php";
include "owners/config.php";

$id = $_GET['id'];
$query = "SELECT * FROM advert WHERE id = '$id' ";

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
    <link rel="stylesheet" href="contact.css">
    <title>Contact Us</title>
    <script>
        function copyfunction(){
            var copyText = document.getElementById('copy');
            copyText.select();
            copyText.setSelectionRange(0,99999999);
            navigator.clipboard.writeText(copyText.value);
            alert("copied!")
        }
    </script>
</head>
<body>
    <center>
        <section class="Contact">
            <fieldset>
                <h3>Copy the information below about this property and contact property owner</h3> 
                <p>Property details</p>
                <textarea style="font-weight: bold;"  name="" id="copy" cols="10" rows="10">
                    Property id: <?php echo $result['id'] ,str_repeat('&nbsp;',50)?>
                    Property name: <?php echo $result['propname'] ,str_repeat('&nbsp;',50)?>
                    Property location: <?php echo ($result['location']) ,str_repeat('&nbsp;',50)?>
                    Price: <?php echo ($result['price']) ,str_repeat('&nbsp;',50)?>
                    property type: <?php echo ($result['protype']) ,str_repeat('&nbsp;',50) ?>
                    Status: <?php echo ($result['status']) ,str_repeat('&nbsp;',50)?>
                </textarea>
                <button onclick="copyfunction()">copy details</button>
                <a href="mailto:<?php echo ($result['username']) ?>@gmail.com"><button style="margin-top: 20px;">Contact owner</button>
            </a>
            </fieldset>
        </section>
    <section class="Contact"  style="margin-bottom: 50px;" >
      <div class="container">
            <center><h3  style="margin-bottom: 20px;">Contact admin</h3></center>
            <p style="margin-bottom: 20px;">
                Enter your email below.
            </p>
            <form action="https://formspree.io/f/mlezbzwq" method="POST">
            <fieldset>
                <input type="text"  placeholder="Enter your name"  name="name" style="width: 100%;"   id="">
                <input type="email" name="_replyto" placeholder="Enter your email and or any other contact information"  style="width: 100%;"  id="">
                <textarea name="message" id="" placeholder="Copy details above and paste here or write your own message." style="width: 100%;" cols="10" rows="10"></textarea>
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
