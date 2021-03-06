<?php  include('processJob.php'); 
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $update = true;
    $record = mysqli_query($mysqli, "SELECT * FROM job WHERE job_id=$id");
    $n = mysqli_fetch_array($record, MYSQLI_ASSOC);

        $photo = $n["job_image"];
        $title = $n["job_position"];
        $cname = $n["company"];
        $caddress = $n["company_Address"];
        $citystate = $n["job_city_state"];
        $desc = $n["job_description"];
        $contact = $n["job_contact"];
        $email = $n["job_email"];
  } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>FCSIT UM Alumni</title>
    <meta charset="utf-8">
    <link rel ="stylesheet" type="text/css" href ="job.css">
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
                  <a class="nav-link" href="Homepage.php">Home</a>
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

    <h1 class="my-3">Job Advertisement</h1>
<form class="row g-3 text-center"  action="processJob.php" method="POST" enctype="multipart/form-data">
<?php $results = mysqli_query($mysqli, "SELECT * FROM job WHERE job_id='$id'"); ?>

<?php while ($row = mysqli_fetch_array($results)) { ?>
    <div class="card mb-3" style="margin-bottom: 5%;">

    <div class="card-body mb-3" style="background-color: #c559b7;color: white;">
    <h4><dt style="font-family:Verdana, Geneva, Tahoma, sans-serif; background-color: #be85cc;" align="Center"><?php echo $row['job_position']; ?></dt></h4>    
    
        <div class="row" align="Center">
          <div class="pictureco">
            <?php  echo'<img src="job-image/'.$row['job_image'].' " alt="dummycompany1" width="200" height="200" style="border-radius:50%"' ;?>

          </div> 
        </div>

        <div class="row">
    
          <dd><strong><?php echo $row['company']; ?><br>
          <?php echo $row['company_Address']; ?>, <?php echo $row['job_city_state']; ?> </strong>

            <br><br>
            <ol type="a">  
            <ul><?php echo $row['job_description']; ?>
            </ul><br>
            </ol>

            <?php echo $row['job_contact']; ?> &nbsp; ||
            <?php echo $row['job_email']; ?>
          </dd>
        </div>

      </div>
    </div>
</form>
<?php } ?>

    <footer class="footer mt-auto fixed-bottom py-0 text-white ">
        <p class="float-end"><small><i><a class="text-white" href="#">Back to top</a></i></small></p>
        <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
       

</body>
</html>
