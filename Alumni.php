<?php 
include('config\config.php'); 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCSIT UM Alumni</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <?php
      $_SESSION["email"]="afifah@gmail.com"
    ?>
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
                  <a class="nav-link" href="Homepage.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Event.php">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="JOB_Ad.php">Careers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Alumni.php">Alumni</a>
                </li>
            </ul>
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
    </div>
<main>
    <div class="jumbotron">
        <div class="container">
        <br>
      <!--Icon and Alumni Top-->  
      <h1></i><b> Alumni Profile </b><i class="fa fa-user"></i></h1> 
        <p class="lead">Let's Connect and get to know all of the Alumni of FSKTM UM</p>
        <hr class="my-4">
        <!--Profile List-->
        <div>
          <div class="row d-flex align-items-stretch">
              <!-- profile 1 -->
              <?php $results = mysqli_query($mysqli, " SELECT * FROM user");?>
              <?php while ($row = mysqli_fetch_array($results)):?>
              <div class="col-12 align-items-stretch col-sm-6 col-md-4" style="width: 26rem; ">
                  <div class="card">
                      <div class="card-header" style="background-color: rgb(179, 122, 233);">
                        <h5 class="card-title"><a href="ProfilePage.php<?php echo "?email=".$row ["user_email"]; ?>" class="text-dark" ><?php echo $row ["user_name"];?></a></h5>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-7">
                                  <i> <?php echo $row["user_bio"];?> </i> <br>
                                  <p>Graduated on <?php echo $row ["user_year"]; ?></p>
                                  <ul>
                                      <li><b>Email:</b> <?php echo $row ["user_email"]; ?> </li>
                                  </ul>
                              </div>
                              <div class="col-5 text-center">
                                  <img src="user-image/<?php echo $row["user_image"]; ?> " alt="Boy"  class="rounded-circle img-fluid" height="100" width="100" >
                              </div>  
                          </div>
                      </div>
                    </div>
               </div>
               <?php endwhile; ?>

               <?php
               include_once "Common.php";
        
                $common = new Common();
               $records = $common->getAllRecords($mysqli);
               if ($records->num_rows>0){
                $sr = 1;
                while ($record = $records->fetch_object()) {
                $email = $record->user_email;
                $name = $record->user_name;
                $course = $record->user_course;
                $year= $record->user_year;
                $city = $record->user_city;
                $state = $record->user_state;
                $phone = $record->user_phone;
                $bio = $record->user_bio;
                $linkedin = $record->user_linkedin;
                $image = $record->user_image;
               ?>
                 <?php
                   $sr++;
               }
           }
           ?>

          </div>               
      </div>
    <!--Close for jumbotron and container-->
    </div></div>
      <br>
      <br>
      <br>
</main>
    <footer class="footer mt-auto py-3 fixed-bottom text-white">
      <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
      <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
