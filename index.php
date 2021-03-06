<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>FCSIT UM Alumni</title>
</head>
<body>  
  <nav class="navbar sticky-top navbar-expand-md navbar-light bg-none">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
          <a href="login.php" type="button" class="btn btn-login text-white">log in</a>
          <a href="signup.php" type="button" class="btn btn-signup text-white">sign up</a>
        </div>
      </div>      
    </nav>

    <?php
      $action=isset($_GET['action']) ? $_GET['action'] : "";

        if($action == "inactive"){?>
          <html>
            <div class="alert alert-danger" role="alert" style="font-size: 14px; text-align: center;">Your account has not been approved.<br>Please try again later.</div>
          </html>
        <?php  
        }
        if($action == "logout"){?>
          <html>
            <div class="alert alert-success" role="alert" style="font-size: 14px; text-align: center;">You have been logged out.<br>See you soon!</div>
          </html>
        <?php  
        }
        ?>

    <div class="container" style="margin-top: 20px;">
      <div class="row">
        <div class="col-sm" style= "margin: auto; margin-right: 5%;">
          <h2 style= "text-align: right; font-weight: bold;">FSKTM WORKSHOPS</h2>
          <p style= "text-align: right">
            Join one of our many workshops, either as an instructor or a student.<br>
            FSKTM Workshops are one of the most anticipated events in our faculty,<br>
            so come play your part as an alumni and join the workshops today!<br></p>
            <a href="" type="button" class="btn" style="color:black; background:#F4C110; border-radius: 25px; height: 38px; float:right; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#alertModal">more events</a>
        </div>
        <div class="col-md-auto">
          <img src="image/event.jpg" alt="career" class="rounded-circle" width="395" height="395"> 
        </div>
      </div>
    </div>
    
    <div class="container" style="margin-bottom: 20px;">
      <div class="row">
        <div class="col-md-auto" style= "margin-right: 5%">
          <img src="image/career.jpg" alt="career" class="rounded-circle" width="395" height="395"> 
        </div>
        <div class="col-sm" style= "margin: auto">
          <h2 style= "text-align: left; font-weight: bold;">KICKSTART YOUR FUTURE</h2>
          <p style= "text-align: left">
            Are you a fresh graduate looking for career opportunities?<br>
            View the Careers page for job openings, posted by other alumnus!<br>
            Log in for more info.<br></p>
            <a href="" type="button" class="btn" style="color:black; background:#F4C110; border-radius: 25px; height: 38px; float:left; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#alertModal">more careers</a>
        </div>
      </div>
    </div>

    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="background-color: #a30fb0;">
                  <h6 class="modal-title text-white" id="alert">Denied Access</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="details">
                  This functionality is available with an account! <br><br>
                  Please <b>log in to continue.</b>
                </div>
              </div>
          </div>
      </div>
    </div>

  <!-- card of fsktm alumni characteristics -->
  <h4 class="text-center" style="margin-top: 3%; font-weight: bold;">What being an alumni of FSKTM UM means:</h4><br>
  <div class="row text-center" style="margin: auto; padding-bottom: 20px; width:70%">
    <div class="col">
      <div class="card h-100 border-0">
        <img src="image/feature 1.jpg" class="card-img-top rounded-circle">
        <div class="card-body">
          <h5 class="card-title">Innovative</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 border-0">
        <img src="image/feature 2.jpg" class="card-img-top rounded-circle">
        <div class="card-body">
          <h5 class="card-title">Collaborative</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 border-0">
        <img src="image/feature 3.jpg" class="card-img-top rounded-circle">
        <div class="card-body">
          <h5 class="card-title">Creative</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 border-0">
        <img src="image/feature 4.jpg" class="card-img-top rounded-circle">
        <div class="card-body">
          <h5 class="card-title">Competitive</h5>
        </div>
      </div>
    </div>
  </div>

<footer class="footer text-white">
  <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
  <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>