<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../contact.css">
    <link rel="stylesheet" href="../styles/general.css">
    <!-- <link rel="stylesheet" href="styles/header.css"> -->
    <link rel="stylesheet" href="../styles/video.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">ADMIN</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">ADMIN</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="index.php">HOME</a></li>
          <li>
            <a href="requests.php">ADVERT REQUESTS</a>
          </li>
          <li>
            <a href="agent1.php">REGISTERED AGENTS</a>
            <!-- <i class='bx bxs-chevron-down js-arrow arrow '></i> -->
            <ul class="js-sub-menu sub-menu">
              <!-- <li><a href="owners/login.php">Login</a></li>
              <li><a href="owners/register.php">Signup</a></li>
              <li><a href="#">Reset password</a></li> -->
            </ul>
          </li>
           <li><a href="agents.php">VIEW PROPERTY</a></li>
           <li><a href="update.php">UPDATE PROFILE</a></li>
           <li style="margin-right: 0%;">
              <div class="house-grid" style="margin-top: 13px;margin-left: 30px;">
                <div class="house-picture">
                     <img class="profile-picture" src="../pic.jpeg" >
                     <!-- <i class='bx bxs-chevron-down js-arrow arrow  '></i> -->
              </div>
              <ul class="js-sub-menu sub-menu">
              <li><a href="register.php">Update</a></li>
              <li><a href="logout.php">Logout</a></li>
               <li><a href="resetpass.php">Reset Password</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="search-box">
      <!-- <a href="#Search"><i class='bx bx-search'></i></a> -->
        
        <!-- <a href="#about-us">link</a> -->
        <!-- <div class="input-box"> -->
          <!-- <input type="text" placeholder="Search..."> -->
        </div>
      </div>
    </div>
  </nav>
  <script src="../nav.js"></script>
</body>
</html>