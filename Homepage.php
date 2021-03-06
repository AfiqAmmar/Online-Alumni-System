<?php  include("config\config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="Home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCSIT UM Alumni</title>
<!--For Corousel bootstrap 4-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 100%;
    }
    </style>
</head>
<body>  
  <nav class="navbar sticky-top navbar-expand-md navbar-light justify-content-between">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Homepage.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Event.php">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="JOB_Ad.php">Careers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Alumni.php">Alumni</a>
                </li>
            </ul>
            <!--Search Bar-->
            <form class="navbar-form" role="search" action="SearchPage.php" method= "get">
              <div class="input-group add-on">
                <input class="form-control" placeholder="Search for alumni" name="search" id="search" type="text">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search">  </i></button>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="profile.php"><img src="image/icon.png" alt="Profile Icon Image" height="50px" width="50px"></a>
              </li>
            </ul>
            <a href="logout.php" class="btn btn-logout text-white">log out</a>
        </div>
      </div>      
    </nav>
    <!--Banner utk Welcome the alumni-->
    <div class="rcorners1 text-center row align-self-center align-items-center">
        <h4><b>Welcome, Alumni of FSKTM UM</b></h4>
    </div> 
<main>

<!--Carousel for latest Event-->
<div class="container">
<div class="container p-3 my-3" style="background-color: rgb(0, 0, 0); height:60%; width:80%">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500" data-pause="hover" data-keyboard="true">
  
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/1.png" alt="EventPage1" width=100%; height= 100%;>
      </div>
      <div class="carousel-item">
        <img src="image/2.png" alt="EventPage2" width=100%; height= 100%;>
      </div>
      <div class="carousel-item">
        <img src="image/3.png" alt="EventPage3" width=100%; height= 100%;>
      </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  </div>
 <!--<a href="Event.html" type="button" class="btn" style="color:black; background:#F4C110; border-radius: 25px; height: 38px; float:right;">more events</a> --> 
  <br>
  <br>
</div>
<!--Under carousel-->

<div class="container" style="margin-top: 20px; margin-bottom: 3%;">
  <div class="row">
    <div class="col-sm" style= "margin: auto; margin-left: 2%;">
      <h2 style= "text-align: center; font-weight: bold;">DEAR ALUMNUS OF FSKTM UM</h2>
      <p style= "text-align: center">
        Due to the recent Covid-19 outbreak, most events will be held online.<br>
        Please visit our page from time to time for any updates.<br>
        We hope you stay safe, and stay healthy!<br>
        - Admin</p>
    </div>
  </div>
</div>

<!-- iframe for youtube video -->
<iframe width="50%" height="60%" style="margin: auto; display: block;"
src="https://www.youtube.com/embed/uu-r6PC-z_A?autoplay=1&mute=1">
</iframe>

<div class="container" style="margin-top: 3%; margin-bottom: 3%;">
  <div class="row">
    <div class="col-sm" style= "margin: auto; margin-left: 2%;">
      <h2 style= "text-align: center; font-weight: bold;">ARE YOU JOB-HUNTING?</h2>
      <p style= "text-align: center">
        Visit our <b>Careers page</b> for opportunities.<br></p>
    </div>
  </div>
</div>

</main>
    <footer class="footer mt-auto py-0 text-white">
      <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
      <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
