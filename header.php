<?php 
  if (!isset($_SESSION)) 
  {
    session_start();
  }

require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/connection.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/doc.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');

$doc = new docQuery\doc;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;

?>

<!DOCTYPE html>
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <base href="http://ipcs/">
      <title>IPCS</title>
      <link rel="icon" type="image/ico" href="images/logo1.jpg"> 
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- MY Custom CSS -->
      <link rel="stylesheet" type="text/css" href="/assets/css/main.css?nounce=<?php echo time(); ?>">
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      
      <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
      <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css">

   </head>
   <body>
    
      <!-- ======= Header start ======= -->
    <div>
      <header>
        <div class="header">  
          <div class="headcontent">
            <a href="javascript:void(0);" class="menu-toggle icon" >
              <i class="fa fa-bars"></i>
            </a> 
            <h1><a href="/home">IPCS</a></h1>
          </div>
          <div class="navbar">
            <nav>
              <ul>
              <?php 
              if(isset($_SESSION['loggedin']) || isset($_SESSION['success']))
              {
              ?>
                <li class="active"><a><u>Hello - <?php echo ucfirst($_SESSION['fname'])," ", ucfirst($_SESSION['lname']);?></u></a></li>
                <li><a href="personalisedcarousel"></a></li>
                <li><a href="dashboard">Dashboard</a></li>
                <li><a href="logout">Logout</a></li>
              <?php 
              }
              else
              {
              ?>
                <li><a href="register"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Register</a></li>
                <li><a href="login"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Login</a></li>
              <?php
              }
              ?>
              </ul>
            </nav>   
          </div>
          <div class="searchbar"> 
            <form action="form-group">
              <input class="form-control" type="search" name="search" placeholder="Search">
              <button>Search</button>
            </form>
          </div>
        </div>
      </header>
    </div>
      <!-- End Header -->
     

<script>
// For hamburger responsive/   
flag = false;
document.querySelector('.icon').addEventListener('click', () => {
    if (!flag) {
        document.querySelector('.menu-toggle').classList.add('menu-untoggle');  // Toggle/click to open.
        document.querySelector('.navbar').setAttribute("style", "display: flex;");
        flag = true;
    } else {
       document.querySelector('.menu-toggle').classList.remove('menu-untoggle');   // Toggle/click to close.
        document.querySelector('.navbar').setAttribute("style", "display: none;");
        flag = false;
    }
});
</script>









      
                