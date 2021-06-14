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
                  <a class="nav-link"  href="Homepage.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Event.html">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="JOB_Ad.php">Careers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Alumni.html">Alumni</a>
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
                <a class="nav-link" href="profile.html"><img src="image/icon.png" alt="Profile Icon Image" height="50px" width="50px"></a>
              </li>
            </ul>
            <a href="logout.php" class="btn btn-logout text-white">log out</a>
        </div>
      </div>      
    </nav>

    <h1 class="my-3">Job Advertisement</h1>

    <div class="card px-4" style="margin-bottom: 5%;" >
      <div class="card-body" style="background-color: #c559b7;color: white; width: 45%;">
        <div class="pictureco">
          <a href="image/c1.jpg"><img src="image/c1thumb.png" alt="dummycompany1" width="150" height="150" style="border-radius:50%;"></a>
        </div>
      <ul><strong>Internship for Computer/IT Students</strong>
      <li>DKSH Corporate Shared Services Center Sdn Bhd <br>
        Kuala Lumpur </li>
        <a href="View JobAd.html"><button type="button" class="btn btn-v " style="width: fit-content;">View More</button></a></ul>
      </div><br>


      <!-- send user message -->
      <?php if (isset($_SESSION['message'])): ?>
	    <div class="msg">
		  <?php 
        echo $_SESSION['message']; 
			  unset($_SESSION['message']);
		  ?>
	    </div>
      <?php endif ?>  
            


      <!-- display the info from database -->
      <?php $results = mysqli_query($mysqli, "SELECT * FROM job"); ?>

      <?php while ($row = mysqli_fetch_array($results)) { ?>

      <div class="card-body" style="background-color: #c559b7;color: white; width: 45%;">
        <div class="pictureco">
          <?php echo '<img src="images/'.$row['job_image'].' "  width="150" height="150" style="border-radius:50%;">';?>
        </div>
      <ul><strong>  <?php echo $row["job_position"]; ?>  </strong>
      <li>  <?php echo $row["company"]; ?>  <br>
           <?php echo $row["company_Address"]; ?> </li>
        <a href="View JobAd(2).php?edit=<?php echo $row['job_id']; ?>" type="button" class="btn btn-v" name="edit">Edit</a></ul>
      </div><br>
      
       <?php } ?>

      <div class="card-body" align="Center">
        <a href="Add_DeleteJob.php" type="button" class="btn btn-add text-white" name="add">Add</a>
      </div>



    </div>


    <footer class="footer mt-auto py-0- text-white">
        <p class="float-end"><small><i><a class="text-white" href="#">Back to top</a></i></small></p>
        <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
