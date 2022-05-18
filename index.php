<?php
include "header.php";
session_start();
error_reporting(0);

// if($_SESSION['username']!='admin'){

//   echo
//     "
//     <script>
//       alert('Not logged in as admin');
//       document.location.href = 'logout.php';
//     </script>
//     ";
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>welcome admin </title>

    <link rel="stylesheet" href="../styles/general.css">
    <!-- <link rel="stylesheet" href="styles/header.css"> -->
    <link rel="stylesheet" href="../styles/video.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <script src="script.js"></script>
  </head>
  <body>
    <main>
        <section class="house-grid1" style="margin-top: 90px; margin-bottom:60px">
        <?php
          include "../owners/config.php";
          $query = "SELECT * FROM properties ORDER BY username";
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
                        <?php echo $row['description'] ,str_repeat('&nbsp;',5)?> owned by:<?php echo $row['username']?>
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
    </main>
    
    <center>
    <div class="footer" style="margin-bottom:0;" >
      <div class="footer1">
          <p>Created by Vincent Mwanzia</p>
          &copy;2022 Second Year project
          <!-- <button><a href="header.php"></a></button> -->
      </div>
    </div>
    </center>
  </body>
</html>