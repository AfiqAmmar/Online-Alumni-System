<!doctype html>
<html lang="en">
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
    <?php
        $action=isset($_GET['action']) ? $_GET['action'] : "";

        if($action == "login_failed"){?>
            <html>
            <div class="alert alert-danger" role="alert" style="font-size: 16px; text-align: center;">Incorrect username or password.<br>Please try again.</div>
            </html>
    <?php  
    }
    ?>
        <div class="global-container">
            <div class="card login-form shadow p-3 mb-5">
                <div class="card-body">
                    <h1 class="card-title text-center"><a href="index.php"><img src="image/UM_Logo.png" width="20%"><img src="image/FSKTM_Logo.png" width="40%"></a></h1>
                    <form action="processLogin.php" method="POST">
                    <div class="form-group card-text">
                      <div class="mb-4">
                        <select class="form-select" name="role" style="font-size: 14px;">
                            <option disabled hidden selected>role</option>
                            <option value="alumni">Alumni</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm" id="InputEmail" placeholder="email" name="email" required/>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-sm" id="InputPassword" placeholder="password" name="password" required/>
                        <!-- <a href="#" style="float: right; font-size: 12px;">forgot password?</a><br> -->
                    </div>
                        <button type="submit" onclick="getInfo()" class="btn btn-login text-white" style="width: 60%;">log in</button><br>
                        <h class="text-center" style="font-size: 13px;">don't have an account?</h><br>
                        <a href="signup.php" type="button" class="btn btn-signup text-white">sign up</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>