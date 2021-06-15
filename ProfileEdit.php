<?php

include_once("config\config.php");

    $email=$_GET['id'];
    $page=$_GET['page'];

    $sql3 = "SELECT * FROM user WHERE user_email='$email'";
    $result3 = mysqli_query($mysqli, $sql3);

    if(mysqli_num_rows($result3) > 0){
      while($row = mysqli_fetch_assoc($result3)){
        $email = $row["user_email"];
        $name = $row["user_name"];
        $course = $row["user_course"];
        $year = $row["user_year"];
        $city = $row["user_city"]; 
        $state = $row["user_state"];
        $phone = $row["user_phone"];
        $bio = $row["user_bio"];
        $linkedin = $row["user_linkedin"];
        $image = $row["user_image"];
        $status = $row["user_status"];

      }
    }
    else {
      echo "failed";
     }

      
 

?>






<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="manage-delete-view-aproveAlumni.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="AdminMembers.js"></script>
    <title>FCSIT UM Alumni</title> 

  </head>

  <body>
    
    <header class="navbar sticky-top navbar-expand-md navbar-light">
      <a class="navbar-brand col-md-3 col-lg-2 me-auto px-3 py-2" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed my-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="logout.php" class="btn btn-logout text-white">log out</a>
    </header>
  
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
          <div class="position-sticky">
            <ul class="nav flex-column">

              <li class="nav-item px-2 py-1">
                <a class="nav-link active" aria-current="page" href="#">
                  <span data-feather="users"></span>
                    Manage Alumni
                </a>
              </li>

              <li class="nav-item px-2 py-1">
                <a class="nav-link" href="manageEvents.html">
                  <span data-feather="calendar"></span>
                    Manage Events
                </a>
              </li>

            </ul>
          </div>
        </nav>
          
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <form name="editProfile" method="POST" action=<?php echo "\"processProfileEdit.php?page=$page&id=$email\""?> enctype="multipart/form-data">
          <div class="border-bottom text-center pt-3 pb-3">
            <h2><strong>Alumni Profile</strong></h2>
          </div>
         

          <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pb-3 mb-5 pt-3">
            <div class="container-fluid">

              <div class="container-lg mt-5 mb-5 pb-5">
                <div class="row mb-5">
                  <div class="col">
                    <div class="picture-container">
                      <div class="picture">
                          <img src="user-image/<?php echo $image?>" class="card-img-top" id="addImagePreview" alt="add image preview" >
                          <input type="file" id="addImage" class="form-control" name= "image"
                              onchange="document.getElementById('addImagePreview').src = window.URL.createObjectURL(this.files[0])"
                              
                              >
                      </div>
                      <div class="card-body mt-0">
                        <small>Click image to select new profile picture.</small>
                        
                      </div>
                    </div>
                  </div>

                  <div class="col-8">
                    <div class="mb-3">
                    <label for="UserName" class="form-label"><strong>Name</strong></label>
                      <div class="row ">
                        <div class="col">
                          <form action="ProfileView.html" method="GET">
                            <input type="text" class="form-control" name="user_name" id="UserName" value=<?php echo "\"$name\"" ?> aria-label="Full Name">
                          </form>
                        </div>
                      </div>
                    </div>

                        <div class="pt-3 pb-3">
                          <div class="row">
                            <div class="col-md-9">
                              <label for="Course" class="form-label"><strong>Course</strong></label>
                              <select class="form-select" aria-label="Faculty Name" value=<?php echo "\"$course\"" ?> name="user_course"> 
                              <option selected hidden><?php echo $course ?></option>
                                <option value="Bachelor of Computer Science (Artificial Intelligence)">Bachelor of Computer Science (Artificial Intelligence)</option>
                                <option value="Bachelor of Computer Science (Software Engineering)">Bachelor of Computer Science (Software Engineering)</option>
                                <option value="Bachelor of Computer Science (Computer System and Network)">Bachelor of Computer Science (Computer System and Network)</option>
                                <option value="Bachelor of Computer Science (Information Systems)">Bachelor of Computer Science (Information Systems)</option>
                                <option value="Bachelor of Information Technology (Multimedia)">Bachelor of Information Technology (Multimedia)</option>
                                <option value="Bachelor of Computer Science (Data Science)">Bachelor of Computer Science (Data Science)</option>
                              ?>
                               
                              </select>
                            </div>
                            <div class="col">
                              <label for="GradYear" class="form-label"><strong>Graduation Year</strong></label>
                                <input type="number" class="form-control" id="GradYear" value=<?php echo $year ?> name="user_year">
                            </div>
                          </div>
                        </div>
                        
                        <div class="pt-3 pb-3">
                          <div class="row">
                            <div class="col">
                              <label for="LinkedIn" class="form-label"><strong>LinkedIn</strong></label>
                                <input type="text" class="form-control" id="LinkedIn" value="<?php echo $linkedin ?>" name="user_linkedin">
                            </div>
                            <div class="col">
                              <label for="PhoneNumber" class="form-label"><strong>Phone Number</strong></label>
                                <input type="number" class="form-control" id="PhonenNumber" value= <?php echo "\"0$phone\"" ?> name="user_phone">
                            </div>
                          </div>
                        </div>

                        <div class="pt-3 pb-3">
                          <div class="row">
                            <div class="col">
                              <label for="UserCity" class="form-label"><strong>City</strong></label>
                                <input type="text" class="form-control" id="UserCity" value=<?php echo "\"$city\"" ?> name="user_city"> 
                            </div>
                            <div class="col">
                              <label for="UserState" class="form-label"><strong>State</strong></label>
                                <input type="text" class="form-control" id="UserState" value=<?php echo "\"$state\"" ?> name="user_state">
                            </div>
                          </div>
                        </div>

                        <div class="pt-3 pb-3">
                          <div class="row">                            
                              <div class="col">
                                <label for="UserBio" class="form-label"><strong>Biodata</strong></label>
                                  <input type="text" class="form-control" id="UserBio" value= <?php echo "\"$bio\"" ?> name="user_bio">
                              </div>
                          </div>
                        </div>   
                        
                        
                            
                      
                    </div>
                  </div>              
                </div>  

                <div class="container">
                  <div class="row mt-5 pt-5">
                    <div class=" col d-grid gap-2 d-md-block">
                      <a class="btn-view btn" href=<?php  echo "\"ProfileView.php?page=$page&id=$email\"" ?> role="button">Back</a>     
                    </div>       
                    <input type="submit" name="save" value="Save" class="btn btn-view" role="button">                  
                  </div>
                </div>
                

                       
              </div>
            </div>
          </div>
                            
        
        </form>
        </main>

      </div>
    </div>   

    <footer class="footer mt-auto py-0 text-white">
      <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
      <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>feather.replace()</script>

  </body>

</html>