<?php 

    function checkPassword($pwd1, $pwd2)
    {
        if($pwd1 == $pwd2){
            return true;
        }else{
            return false;
        }
    }

    include_once("config\config.php");    

    $name = $email = $password = $rpassword = $course = $year = "";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $image = "user-image/icon.png";
    $status = "pending";
        
    $sql = "SELECT user_email FROM user WHERE user_email = '$email'";

    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result) > 0){?>
    <html>
        <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login-signup-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>FCSIT UM Alumni - Login</title>
        </head>
        <body>
            <div style="background-image: url(image/background.png); height:100vh">
                <div class="global-container">
                    <div class="card invalid-form shadow p-3 mb-5">
                        <div class="card-body">
                            <h1 class="card-title text-center"><a href="index.php"><img src="image/UM_Logo.png" width="20%"><img src="image/FSKTM_Logo.png" width="40%"></a></h1>
                            <h5>Email already exists.<br>Please log in.</h5><br><br>
                            <a href="login.php" type="button" class="btn btn-login text-white">log in</a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
    else{

        $samePassword = checkPassword($password, $rpassword);

        if(!$samePassword){
                ?>
                <html>
                    <div class="alert alert-danger margin-top-40" role="alert">Passwords did not match. <br>Please try again.</div>
                </html><?php header("Location: signup.php? action=signup_failed");
        }else{
            $hashedpassword = sha1($password);
            $stmt = "INSERT INTO user (user_email, user_password, user_name, user_course, user_year, user_image, user_status)  
            VALUES ('$email','$hashedpassword','$name','$course','$year', '$image', '$status')";
            $stmt = mysqli_query($mysqli, $stmt);?>
            <html>
            <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="login-signup-style.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

            <title>FCSIT UM Alumni - Login</title>
                </head>
                <body>
                    <div style="background-image: url(image/background.png); height:100vh">
                        <div class="global-container">
                            <div class="card invalid-form shadow p-3 mb-5">
                                <div class="card-body">
                                    <h1 class="card-title text-center"><a href="index.php"><img src="image/UM_Logo.png" width="20%"><img src="image/FSKTM_Logo.png" width="40%"></a></h1>
                                    <br><h5>Registration pending.<br>Please wait for admin approval.</h5><br><br>
                                    <a href="index.php" type="button" class="btn" style="color:black; background:#F4C110; border-radius: 25px; height: auto; width: auto; font-weight: bold; font-size: 13px;">back to home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
                </body>

            </html>
        }
        <?php
    }
}
?>