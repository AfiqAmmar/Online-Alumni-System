<?php
    session_start();
    include("config\config.php");
    include("Common.php");
   // $email = $course = $year = $bio = $city = $state = $phone = $linkedin = $image = $password = $name = "";
    // $_SESSION['email'] = $_GET['email'];
    
    // $common = new Common;
    // $name = $common->getValue($mysqli, 'user_name');
    // $email = $common->getValue($mysqli, 'user_email');
    // $course = $common->getValue($mysqli, 'user_course');
    // $year = $common->getValue($mysqli, 'user_year');
    // $bio = $common->getValue($mysqli, 'user_bio');
    // $city = $common->getValue($mysqli, 'user_city');
    // $state = $common->getValue($mysqli, 'user_state');
    // $phone = $common->getValue($mysqli, 'user_phone');
    // $linkedin = $common->getValue($mysqli, 'user_linkedin');
    // $image = $common->getValue($mysqli, 'user_image');

    $email = $_GET['email'];
    $sql = "SELECT * FROM user WHERE user_email='$email'";
    $result = mysqli_query($mysqli, $sql);
    while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $name = $res['user_name'];
        $course = $res['user_course'];
        $year = $res['user_year'];
        $bio = $res['user_bio'];
        $city = $res['user_city'];
        $state = $res['user_state'];
        $email = $res['user_email'];
        $phone = $res['user_phone'];
        $linkedin = $res['user_linkedin'];
        $image = $res['user_image'];
    }
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
       <input type="hidden" value="<?php echo $email; ?>">
       <div class="shadow p-3 mb-5 bg-white rounded" >
        <h3  class="w-auto p-3" style="background-color: rgb(179, 122, 233);"><?php echo $name; ?></h3>
       <div class="card mb-3; col-lg-auto" style="max-width: 2000;">
      <div class="row g-0">
      <div class="col-md-4">
      <img class="img-responsive" src="user-image/<?php echo $image;?>" alt="" height="300" width="300">
      </div>
      <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $bio; ?></h5>
        <p class="card-text">
        <i>Graduated on <?php echo $year?> </i>
          <ul>
            <li><b>Email:</b> <?php echo $email?> </li>
            <li><b>Phone Number:</b> <?php echo $phone?> </li>
            <li><b>LinkedIn:</b><?php echo $linkedin?> </li>
            <li><b>Course:</b><?php echo $course?> </li>
            </ul>
            <label for="Location"><p><img src="image/Location.png" alt="Location Icon" height="20px" width="20px"><?php echo $city?>, <?php echo $state?></p></label><br>
        
        </p>
      </div>
      </div>
      </div>
      </div>
       </div>

       <button style="color:black; background:#F4C110; border: 25px; height: 38px; float:left;" onclick="goBack()"> Back </button>
       <br>
            <script>
              function goBack() {
                window.history.back();
              }
              </script>

      </div></div>
      <br>
      <br>
      <br>
</main>

    <footer class="footer mt-auto py-3 fixed-bottom text-white">
      <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
      <p><small><i>&copy; 2021 All Right reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

