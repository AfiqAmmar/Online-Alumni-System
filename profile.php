<?php

    include_once("config\config.php");
    session_start();
    $emails = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE user_email='$emails'";
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
        $password = $res["user_password"];
    }
    
    $successImage = False;
    $errImage = False;
    $messageFileSuccess = "";
    $messageFile = "";
    if(isset($_POST['updateImage'])){
      $img_name = $_FILES['profileImage']['name'];
      $img_size = $_FILES['profileImage']['size'];
      $tmp_name = $_FILES['profileImage']['tmp_name'];
      $img_data = file_get_contents($tmp_name);
      $img_error = $_FILES['profileImage']['error'];

      if($img_error == 0){
          if($img_size > 125000){
            $messageFile = "Upload image failed, your file is too large";
            $errImage = True;
          }
          else{
              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);
              $allowed_ex = array("jpg", "jpeg", "png");
  
              if(in_array($img_ex_lc, $allowed_ex)){
                  $successImage = True;
                  $messageFileSuccess = "Image has been successfully uploaded";
                  $dest = "user-image/$img_name";
                  move_uploaded_file($tmp_name, $dest);
                  $sql = "UPDATE user SET user_image = '$img_name' WHERE user_email='$emails'";
                  $result = mysqli_query($mysqli, $sql);
              }
              else{
                  $messageFile = "Upload image failed, only png, jpeg, and jpg file are allowed";
                  $errImage = True;
              }
          }
      }
      else{
        $messageFile = "Error occured while uploading the image, try again";
        $errImage = True;
      }
  }
  mysqli_close($mysqli);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCSIT UM Alumni</title>
</head>
<body>  
  <nav class="navbar sticky-top navbar-expand-md navbar-light bg-none justify-content-between">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="Homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="JOB_Ad.php">Careers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Event.php">Event</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Alumni.php">Alumni</a>
              </li>
          </ul>
          <form class="navbar-form" role="search" action="SearchPage.php" method="get">
            <div class="input-group add-on">
              <input class="form-control" placeholder="Search for Alumni" name="search" id="search" type="text">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.html"><img src="image/icon.png" alt="Profile Icon Image" height="50px" width="50px"></a>
              </li>
          </ul>
          <a href="logout.php" class="btn btn-logout text-white">log out</a>
      </div>
    </div>      
  </nav>

  <?php
        if($errImage){?>
            <html>
                <div class="alert alert-danger mb-2 pt-2 d-flex justify-content-center">
                    <p><?php echo $messageFile; ?> </p>
                </div>
            </html>
        <?php
        }
        if($successImage){?>
            <html>
                <div class="alert alert-success mb-2 pt-2 d-flex justify-content-center">
                  <p><?php echo $messageFileSuccess; ?> </p>
                </div>
            </html>
        <?php
        }
        $action=isset($_GET['action']);
        if($action == "success"){?>
          <html>
                <div class="alert alert-success mb-2 pt-2 d-flex justify-content-center">
                  <p><?php echo "Changes made have been saved"; ?> </p>
                </div>
            </html>
        <?php
        }?>
         
        

  <div class="container-fluid d-flex justify-content-center">    
    <main>
        <div class="row top_description mt-5">  
            <div class="row my-0">
              <div class="col">
                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Click here to edit image">
                  <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#imageModal"><small>Edit Image</small></a>
                </span>
              </div>
              <div class="col">
                <a href="editForm.php" class="text-dark d-flex justify-content-end" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-offset="300,0" title="Click here to manage and setup profile"><small>Manage Profile</small></a>
              </div>
            </div>
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content" id="modalPicture">
                      <div class="modal-header">
                          <h6 class="modal-title text-white" id="imageModalLabel">Edit Image</h6>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="picture-container">
                          <div class="picture">
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="col d-flex justify-content-center">
                                  <img src="user-image/<?php echo $image; ?>" class="card-img-left rounded-circle align-items-center" id="addImagePreview" alt="add image preview" height="208px" width="208px">
                                </div>
                                <div class="mt-3">
                                  <input type="file" name="profileImage" id="addImage" class="form-control" onchange="document.getElementById('addImagePreview').src = window.URL.createObjectURL(this.files[0])">
                                  <input class="updateImage text-white my-3 float-end" type="submit" name="updateImage" value="Confirm">
                                </div>
                              </form>
                          </div>
                      </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-2 offset-md-1 col-lg-2 profile_picture">
                <img src="user-image/<?php echo $image; ?>" class="rounded-circle" alt="Profile Picture"><br>
            </div>
            <div class="col-sm-5 col-md-6 offset-md-1 description">
                <label for="Name" class="col-md-7"><h2><?php echo $name;?></h2></label>
                <label for="Course" id="course"><?php echo $course;?></label><br>
                <label for="Graduation_Year"><p>Class of <span><?php echo $year;?></span></p></label><br>
                <label for="Bio"><p><?php echo $bio;?></p></label><br>
                <label for="Location"><p><img src="image/Location.png" alt="Location Icon" height="20px"
                 width="20px"><?php echo $city.", ".$state;?></p></label><br>
            </div>
          </div>
         
        <hr class="border border-dark">
        <div class="offset-md-4 contacts">
          <div class="card shadow mx-3 ml-5" style="width: 35rem; height: auto;">
            <div class="card-header">
              <h5 class="mx-2 my-2 text-white">Contact Info</h5>
            </div>
            <div class="card-body">
              <div class="row py-1">
                <div class="col-md-5">
                  <label for="labelEmail" class="col-form-label">Email:</label>
                </div>
                <div class="col-md-5">
                  <label for="Email" class="col-form-label"><?php echo $email;?></label>
                </div>
              </div>
              <div class="row py-2">
                <div class="col-md-5">
                  <label for="labelPhone" class="col-form-label">Phone Number:</label>
                </div>
                <div class="col-md-4">
                  <label for="Email" class="col-form-label"><?php echo $phone;?></label>
                </div>
              </div>
              <div class="row py-2">
                <div class="col-md-5">
                  <label for="labelLinkedIn" class="col-form-label">LinkedIn:</label>
                </div>
                <div class="col-md-5">
                  <label for="LinkedIn" class="col-form-label"><?php echo $linkedin;?></label>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>

  <footer class="footer fixed-bottom text-white">
    <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
    <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="profile.js"></script>
  <script src="navbar.js"></script>
</body>
</html>