<?php

    session_start();
    include("config\config.php");

    if (isset($_GET['view'])) {
        $id = $_GET['view'];
        $sql = "SELECT * from event where event_id=$id";
        $result = mysqli_query($mysqli, $sql);

        while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $res['event_name'];
            $organiser = $res['event_organiser'];
            $date = $res['event_date'];
            $start = $res['event_start'];
            $end = $res['event_end'];
            $venue = $res['event_venue'];
            $desc = $res['event_description'];
            $image = $res['event_image'];
        }

        mysqli_close($mysqli);
    }

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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pb-4 mb-5">

                    <div class="card-event shadow px-5 text-center">
                        <div class="card-body">
                            <h2 class="card-event-title py-3">Event details</h2>
                            <form action="processEvent.php" method="POST" class="row g-3 text-center" enctype="multipart/form-data">
                                <input type="hidden" name="event_id" value="<?php echo $id; ?>">
                                <div class="picture-container d-flex justify-content-center">
                                    <div class="picture">
                                        <img src="event-image/<?php echo $image; ?>" class="card-img-left" id="ImagePreview" alt="image">
                                        <input type="file" id="Image" name="event_image" class="form-control h-100 position-absolute top-0" 
                                            onchange="document.getElementById('ImagePreview').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="inputEventName" class="form-label"></label>
                                  <input type="text" class="form-control" id="inputEventName" name="event_name" placeholder="Event name" value="<?php echo $name ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputOrg" class="form-label"></label>
                                    <input type="text" class="form-control" id="inputOrg" name="event_organiser" placeholder="Organiser" value="<?php echo $organiser ?>" required>
                                </div>                       
                                <div class="col-md-2">
                                  <label for="inputDate" class="form-label"></label>
                                  <input type="date" class="form-control" id="inputDate" name="event_date" value="<?php echo $date ?>" required>
                                </div>
                                <div class="col-md-2">
                                  <label for="inputStartTime" class="form-label"></label>
                                  <input type="time" class="form-control" id="inputStartTime" name="event_start" value="<?php echo $start ?>" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputEndTime" class="form-label"></label>
                                    <input type="time" class="form-control" id="inputEndTime" name="event_end" value="<?php echo $end ?>" required>
                                  </div>
                                <div class="col-md-6">
                                    <label for="inputVenue" class="form-label"></label>
                                    <input type="text" class="form-control" id="inputVenue" name="event_venue" placeholder="Venue" value="<?php echo $venue ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputDesc" class="form-label"></label>
                                    <textarea class="form-control" id="inputDesc" name="event_description" rows="5" placeholder="Write a short description here..."><?php echo ($desc) ?></textarea>
                                </div>
                                <div class="col text-center">
                                    <button type="button" name="edit" id="btnEdit" class="btn btn-edit-update">edit</button>
                                    <button type="submit" name="update" id="btnUpdate" class="btn btn-edit-update">update</button>
                                </div>                               
                              </form>
                        </div>
                    </div>
                    <a href="manageEvents.php" class="btn btn-previous">&laquo;</a>
                    
                </div>
            </main>
        </div>
    </div>

    <footer class="footer text-white">
    <p class="float-end"><small><i><a class="text-white" href="#" onclick="topFunction(); return false;">Back to top</a></i></small></p>
    <p><small><i>&copy; 2021 All Right Reserved. Designed and Developed by Afifah & Friends</i></small></p>
    </footer>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        feather.replace()

        $(document).ready(function() {
            $("input").attr("disabled", true);
            $("textarea").attr("disabled", true);
            $("file").attr("disabled", true);
        });

        $("#btnEdit").on("click", function () {
            $("input").attr("disabled", false);
            $("textarea").attr("disabled", false);
            $("file").attr("disabled", false);
        });

    </script>
</body>
</html>