<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>House Rental Project </title>

    <link rel="stylesheet" href="styles/general.css">
    <!-- <link rel="stylesheet" href="styles/header.css"> -->
    <link rel="stylesheet" href="styles/video.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="overlay.css">
    <script src="script.js"></script>
    <style>
      .thumbnail:hover img{
        transform: scale(1.3);
      }
    </style>
  </head>
  <body>
    <main>
        <section class="house-grid1" style="margin-top: 90px;">
        <?php
		include "owners/config.php";
		// $query = "SELECT * FROM properties";
		// $result = mysqli_query($conn,$query);
		// $data = mysqli_num_rows($result)>0;
        if(isset($_POST['submit'])){
            $protype = $_POST['protype'];
            $city = $_POST['city'];
            $location = $_POST['location'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];
         
        $query = "SELECT * FROM properties WHERE city = '$city' OR protype = '$protype' OR location = '$location' OR price = '$price' OR status = '$status' OR description = '$description'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_num_rows($result);
        // $total = mysqli_num_rows($data);
        
		if($data){
            while($row = mysqli_fetch_array($result)){
              ?>
        <div class="house-preview">
            <div class="house-row">
            <a href="view.php?id=<?php echo $row['id']?>">
              <img class="thumbnail" src="owners/img/<?php echo  $row['house'] ?>" >
            </a>
                
                <!-- <div class="overlay"> -->
					       <!-- <div class="content">
					          <p>Contact owner</p>
					        	<button class="button" type="submit"><a href="contact1.php?id=$result[id]">contact</a></button>
					        </div> -->
				        <!-- </div> -->
            </div>
            <div class="house-grid">
                <div class="house-picture">
                     <img class="profile-picture" src="profile.jpeg" >
                </div>
                <div class="house-info">
                    <p class="house-title">
                        <?php echo $row['description'] ,str_repeat('&nbsp;',5)?> owned by:<?php echo $row['username']?><img src="" alt="">
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
		}}
		?>
        </section>
    </main>
  </body>
</html>