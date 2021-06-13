<?php  include("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="Event.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCSIT UM Alumni</title>
</head>
<body>  
  <nav class="navbar sticky-top navbar-expand-md navbar-light justify-content-between">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="image/asset/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/asset/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="Homepage.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Event.php">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="JOB_Ad.php">Careers</a>
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
                <a class="nav-link" href="profile.php"><img src="image/asset/icon.png" alt="Profile Icon Image" height="50px" width="50px"></a>
              </li>
            </ul>
            <a href="index.php" class="btn btn-logout text-white">log out</a>
        </div>
      </div>      
    </nav>

<main>
<div class="container">
<br>
<h1></i><b> Latest Events </b><i class="fa fa-calendar-check-o"></i></h1>
<p class="lead">These are the latest event occuring at Faculty of Computer Science & Information Technology of University Malaya.</p>
<hr class="my-4">
    
<!--Event List-->
<?php $results = mysqli_query($mysqli, " SELECT * FROM event");?>
<?php while ($row = mysqli_fetch_array($results)) : ?>
<div class="card text-black" style="max-width: 1200px; background-color:#F4C110;">
  <div class="row">
    <div class="col-md-8; col-lg-auto">
      <img src=<?php echo $row["event_image"]; ?> class="center" alt="..." >
      <div class="card-body">
        <h5 class="card-title"><b> <?php echo $row["event_name"];?></b></h5>
        <div class="card-text" Style="font-size: medium;">

        <p> <?php echo nl2br( $row["event_description"]) ;?> </p>
          <ul Style="font-size: medium;">
            <li><b>Organiser:</b><?php echo $row ["event_organiser"]; ?></li>
            <li><b>Date:</b> <?php echo $row ["event_date"]; ?></li>
            <li><b>Time:</b> <?php echo $row ["time_start"]; ?> - <?php echo $row ["time_end"]; ?></li>
            <li><b>Venue:</b><?php echo $row ["event_venue"]; ?></li>
        
        
      </div>
    </div>
  </div>
  <br>
</div>
<?php endwhile; ?>

</div>
<br>
<br>
<br>
</main>

    <footer class="footer mt-auto py-3 fixed-bottom text-white">
      <p class="float-end"><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></p>
      <p><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></p>
    </footer>       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
