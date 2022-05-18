<?php 
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$query = "SELECT * FROM users WHERE username = '$_SESSION[username]' ";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data)
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../contact.css">
    <!-- <link rel="stylesheet" href="../styles/general.css">-->
    <link rel="stylesheet" href="../styles/video.css"> 
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#"><?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?></a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name"><?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?></span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="welcome.php">HOME</a></li>
          <li>
            <a href="#">ADVERTISE</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="advertise.php">advertise</a></li>
              <li><a href="adview.php">view adverts</a></li>
              <li class="more">
                <!-- <span><a href="#">More</a> -->
                <!-- <i class='bx bxs-chevron-right arrow more-arrow'></i> -->
              </span>
                <ul class="more-sub-menu sub-menu">
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Office Space</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
          <a href="property.php">REGISTER PROPERTY</a>
            <!-- <i class='bx bxs-chevron-down htmlcss-arrow arrow '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="property.php">Houses</a></li>
              <li><a href="#">Apartments</a></li>
              <li><a href="#">Rooms</a></li>
              <li><a href="#">Office Space</a></li>
            </ul> -->
          </li>
          <li>
            <a href="view.php">VIEW PROPERTY</a>
            <!-- <i class='bx bxs-chevron-down htmlcss-arrow arrow '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="">Houses</a></li>
              <li><a href="#">Apartments</a></li>
              <li><a href="#">Rooms</a></li>
              <li><a href="#">Office Space</a></li>
            </ul> -->
          </li>
          
          <li><a href="c_admin.php">UPGRADE</a></li>
          <li style="margin-right: 0%;">
              <div class="house-grid"  style="margin-top: 13px;margin-left: 30px;">
                <div class="house-picture">
                   <img class="profile-picture" src="img/<?php echo  $result['house'] ?>" >
              </div>
              <ul class="js-sub-menu sub-menu">
              <!-- <li><a href="register.php">Update</a></li> -->
              <li><a href="logout.php">Logout</a></li>
               <li><a href="resetpass.php">Reset Password</a></li>
            </ul> 
          </li>
        </ul>

      </div>
      <div class="search-box" style="background-color: beige;">
            <!-- <a href="#about-us"><i class='bx bx-search'></i></a> -->
      </div>
    </div>
  </nav>
  <script src="../nav.js"></script>
</body>
</html>
