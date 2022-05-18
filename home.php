<?php

include "header.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <title>All Adverts</title>

    <link rel="stylesheet" href="styles/general.css">
    <!-- <link rel="stylesheet" href="styles/header.css"> -->
    <link rel="stylesheet" href="styles/video.css">
	<link rel="stylesheet" href="overlay.css">
    <script src="script.js"></script>
  </head>
  <body>
    <main>
        <section class="house-grid1" style="margin-top: 90px; margin-bottom:60px">
        <?php
          include "owners/config.php";
          $query = "SELECT * FROM advert ";
          $data = mysqli_query($conn,$query);
          $total = mysqli_num_rows($data);
          // $result1 = mysqli_fetch_assoc($result);

          if($total != 0){
          while($result = mysqli_fetch_assoc($data)){
                ?>


        <div class="house-preview">
            <div class="house-row">
            <a href="viewprop.php?id=<?php echo $result['id']?>">
              <img class="thumbnail" src="owners/img/<?php echo  $result['house'] ?>" >
            </a>
            </div>
            <div class="house-grid">
                <div class="house-picture">
                   <img class="profile-picture" src="profile.jpeg" >
                     <!-- <div class="content">
                        <p>Contact owner</p>
                     <button class="button" type="submit"><a href="contact1.php?id=$result[id]">contact</a></button>
                   </div> -->
              </div>
                <div class="house-info">
                    <p class="house-title">
                        <?php echo $result['description'] ,str_repeat('&nbsp;',5)?> owned by:<?php echo $result['username']?>✔
                    </p>
                    <p class="house-state" style="margin-top: 15px;">
                     City:<?php echo $result['city'] ,str_repeat('&nbsp;',5)?> location: <?php echo $result['location'] ,str_repeat('&nbsp;',5)?> 
                     <!-- <button style="margin-left:250px,"><a href="viewprop.php?id=<?php echo $result['id']?>" >Owner</a></button> -->
                    </p>
                    <p class="house-state" style="margin-top: 15px;">
                      <?php echo $result['status'] ,str_repeat('&nbsp;',5) ?> Price:<?php echo $result['price'] ,str_repeat('&nbsp;',5) ?> 
                    </p>
                    
                </div>
            </div>
        </div>
        <?php
			// echo  $result['username'];
		}
		}
		else{
			echo "no records";
		}
		?>
        </section>
    </main>
    <center>
    <div class="footer" style="margin-bottom: 0%;" >
      <div class="footer1">
          <p>Created by Vincent Mwanzia</p>
          &copy;2022 Second Year project
          <!-- <button><a href="header.php"></a></button> -->
      </div>
    </div>
    </center>
  </body>
</html>