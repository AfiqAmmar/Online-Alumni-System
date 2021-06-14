<?php  include('processJob.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>FCSIT UM Alumni</title>
    <link rel ="stylesheet" type="text/css" href ="job.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                  <a class="nav-link"href="Homepage.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Event.php">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="JOB_Ad.php">Careers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Alumni.php">Alumni</a>
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

    <h1 class="my-3">Job Registration</h1>
        
    <form action="processJob.php" method="post" enctype="multipart/form-data">
      
        <div class="card px-4" style="margin-bottom: 5%;">
            <div class="card-body shadow">
                <h2 class="card-event-title">New Job details</h2>
                        <div class="picture">              
                            <input type="file" id="addImage" name="photo"  class="form-control" 
                                onchange="document.getElementById('addImagePreview').src = window.URL.createObjectURL(this.files[0])">
                            <img src="image/office-building.png" class="card-img-left" id="addImagePreview" alt="add image preview" width="259" height="259">
                        </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="inputTitle" class="form-label"></label>
                      <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputcname" class="form-label"></label>
                        <input type="text" class="form-control" id="inputcname" name="cname" placeholder="Company Name" required>
                    </div> 
                  </div>  
                    
                  <div class="row">
                    <div class="col-md-6">
                      <label for="inputcaddress" class="form-label"></label>
                      <input type="text" class="form-control" id="inputcaddress" name="caddress" placeholder="Company Address" required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputcitystate" class="form-label"></label>
                      <input type="text" class="form-control" id="inputcitystate"  name="citystate" placeholder="City, State" required>
                    </div>
                  </div>

                    <div class="col-12">
                        <label for="inputDesc" class="form-label"></label>
                        <textarea class="form-control" id="inputDesc"  name="desc" rows="3" placeholder="Write the job description here..."></textarea>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="inputcontact" class="form-label"></label>
                        <input type="tel" class="form-control" id="inputcontact" name="contact" placeholder="Contact" required>
                      </div>
                      <div class="col-md-6">
                        <label for="inputemail" class="form-label"></label>
                        <input type="text" class="form-control" id="inputemail" name="email" placeholder="Email" required>
                      </div>
                    </div>

               
            </div>
            
                    <div class="col text-center">
                        <a href ="JOB_Ad.php"><button type="submit" class="btn btn-add-submit text-white"name = "submit" >Submit</button></a>
                    </div></div>
    </form>
        <footer class="footer mt-auto py-0 text-white">
            <p class="float-end"><small><i><a class="text-white" href="#">Back to top</a></i></small></p>
            <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
        </footer>      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    

</body>
</html>
