<?php
    session_start();
    include_once("config\config.php");
    $sql = "SELECT * FROM event ORDER BY event_date DESC";
    $result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="manage-add-viewEvents.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FCSIT UM Alumni</title>
</head>

<body>
    <header class="navbar sticky-top navbar-expand-md navbar-light">
        <a class="navbar-brand col-md-3 col-lg-2 me-auto px-3 py-2" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="logout.php" class="btn btn-logout text-white">log out</a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="navbarCollapse" class="col-md-3 col-lg-2 d-md-block sidebar collapse navbar-collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item px-2 py-1">
                            <a class="nav-link" href="AdminMembers.php">
                            <span data-feather="users"></span>
                            Manage Alumni
                            </a>
                        </li>
                        <li class="nav-item px-2 py-1">
                            <a class="nav-link active" aria-current="page" href="manageEvents.php">
                            <span data-feather="calendar"></span>
                            Manage Events
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pb-3 mb-5 pt-3">
                    <div class="container-fluid">
                        
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            <?php
                                while($row=mysqli_fetch_array($result)){
                            ?>

                            <div class="col text-center">
                                <div class="card-event shadow">
                                    <div class="img-container">
                                        <a href="processEvent.php?del=<?php echo $row['event_id']; ?>" class="btn btn-delete" id="btnDelete" role="button">X</a>
                                        <?php 
                                            echo '<img src="images/'.$row['event_image'].'" class="card-img-top cropped">';
                                        ?>
                                    </div>
                                    <div class="card-body my-4">
                                        <h5 class="card-event-title"><?php echo $row['event_name']; ?><br></h5>
                                        <a href="viewEvent.php?view=<?php echo $row['event_id']; ?>" class="btn btn-view">view</a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <a href="addEvent.php" class="btn btn-add" data-bs-toggle="tooltip" data-bs-placement="top" title="Click me to add a new event!">+</a>
                </div>
            </main>
        </div>
    </div>

    <footer class="footer mt-auto py-0 fixed-bottom text-white">
    <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
    <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        feather.replace();

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

    </script>
</body>
</html>