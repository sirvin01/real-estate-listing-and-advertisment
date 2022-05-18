<?php 
include "header1.php";


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../contact.css">
</head>
<body style="margin-top: 100px;">
<!-- <marquee behavior="scroll" direction="left"> </marquee> -->
<div class="imgbac">
  <div class="bgimage">
  </div>
</div>
  <section class="house-grid1" style="margin-top: 90px; margin-bottom:60px">
     <?php
          include "../owners/config.php";
          $query = "SELECT * FROM properties WHERE username = '$_SESSION[username]' ";
          $result = mysqli_query($conn,$query);
          $data = mysqli_num_rows($result)>0;
          if($data){
          while($row = mysqli_fetch_array($result)){
                ?>
        <div class="house-preview">
            <div class="house-row">
                <img class="thumbnail" src="../owners/img/<?php echo  $row['house'] ?>" >
            </div>
            <div class="house-grid">
                <div class="house-picture">
                     <img class="profile-picture" src="../profile.jpeg" >
              </div>
                <div class="house-info">
                    <p class="house-title">
                        <?php echo $row['description'] ,str_repeat('&nbsp;',5)?> 
                    </p>
                    <!-- <p class="house-owner" >
                       
                    </p> -->
                    <p class="house-state" style="margin-top: 15px;">
                     City:<?php echo $row['city'] ,str_repeat('&nbsp;',5)?> location: <?php echo $row['location']?> 
                    </p>
                    <p class="house-state" style="margin-top: 15px;">
                      <?php echo $row['status'] ,str_repeat('&nbsp;',5) ?> Price:<?php echo $row['price']?>
                    </p>
                    
                </div>
            </div>
        </div>
        <?php

			// echo  $row['username'];
		}
		}
		else{
			echo "no records";
		}
		?>
  </section>

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