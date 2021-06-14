<?php

include_once("config\config.php");

          
$sql = "SELECT * FROM `user` ORDER BY `user_id`ASC ,`user_name`,`user_year`,
`user_bio`,`user_image` ";
  $result = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $id[] = $row["user_id"];
    $name[] = $row["user_name"];
    $year[] = $row["user_year"];
    $bio[] = $row["user_bio"];
    $image[] = $row["user_image"];
             
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
    <title>FCSIT UM Alumni</title> 
    

  </head>

  <body>
          
    <header class="navbar sticky-top navbar-expand-md navbar-light">
      <a class="navbar-brand col-md-3 col-lg-2 me-auto px-3 py-2" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed my-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="index.html" class="btn btn-logout text-white">log out</a>
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
                <a class="nav-link" href="manageEvents.php">
                  <span data-feather="calendar"></span>
                    Manage Events
                </a>
              </li>

            </ul>
          </div>
        </nav>
          
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <!-- <form method= "POST" action="ProfileView.php">-->

          <div class="border-bottom text-center pt-3 pb-3">
            <h2><strong>Alumni Members</strong></h2>
          </div>        

          <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pb-3 mb-5 pt-3">
            <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2">

                <div class="col" >
                  <div class="card shadow ">    
                      <img src=<?php echo "\"image/".$image[0]."\"" ?> class="card-img-top cropped">
                         
                    
                      <div class="card-body text-dark">
                
                        <!--Make a javascript-->
                        <h5 class="card-title"><strong><?php echo $name[0]?></strong></h5>
                        <p class="card-text">Class of <?php echo $year[0] ?>. <?php echo $bio[0] ?></p>
                        <!--<a href="ProfileView.php" class="btn-view btn">View</a>-->
                        <?php echo "<br/><a href=\"ProfileView.php?id=".$id[0]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                      </div>
                  </div>
                </div>


                <div class="col">
                  <div class="card shadow ">            
                  <img src=<?php echo "\"image/".$image[1]."\"" ?> class="card-img-top cropped">
                         
                    
                      <div class="card-body text-dark">
                
                        <!--Make a javascript-->
                        <h5 class="card-title"><strong><?php echo $name[1]?></strong></h5>
                        <p class="card-text">Class of <?php echo $year[1] ?>. <?php echo $bio[1] ?></p>                        
                        
                       <?php echo "<br/><a href=\"ProfileView.php?id=".$id[1]."\" class=\"btn-view btn\">View</a><br/>"; ?>

                      </div>
                  </div>
                </div>
          

                <div class="col">
                  <div class="card shadow h-100">
                  <img src=<?php echo "\"image/".$image[2]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[2]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[2] ?>. <?php echo $bio[2] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[2]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                        
                      </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[3]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[3]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[3] ?>. <?php echo $bio[3] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[3]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>


                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[4]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[4]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[4] ?>. <?php echo $bio[4] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[4]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[5]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[5]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[5] ?>. <?php echo $bio[5] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[5]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[6]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[6]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[6] ?>. <?php echo $bio[6] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[6]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[7]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[7]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[7] ?>. <?php echo $bio[7] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[7]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow h-100">            
                  <img src=<?php echo "\"image/".$image[8]."\"" ?> class="card-img-top cropped">
                         
                    
                         <div class="card-body text-dark">
                   
                           <!--Make a javascript-->
                           <h5 class="card-title"><strong><?php echo $name[8]?></strong></h5>
                           <p class="card-text">Class of <?php echo $year[8] ?>. <?php echo $bio[8] ?></p>
                           <?php echo "<br/><a href=\"ProfileView.php?id=".$id[8]."\" class=\"btn-view btn\">View</a><br/>"; ?>
                          
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class=" pb-5">
            <nav aria-label="...">
               <ul class="pagination justify-content-end">

                <li class="page-item disabled">
                  <span class="page-link ">Previous</span>
                </li>
                    
               <li class="page-item active" aria-current="page">
                  <a class="page-link ">1</a>
                </li>

                <li class="page-item">
                  <a class="page-link" href="AdminMembers2.html">2</a>
                </li>

                <li class="page-item">
                  <a class="page-link"  href="AdminMembers2.html">Next</a>
                </li>

              </ul>
            </nav>
          </div>
          <!--</form>-->
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