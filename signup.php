<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login-signup-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>FCSIT UM Alumni - Sign Up</title>
  </head>
  <body>
    <div style="background-image: url(image/background.png); height:100vh">
        <div class="global-container">
            <div class="card signup-form shadow p-3 mb-5">
                <div class="card-body">
                    <h1 class="card-title text-center"><a href="index.php"><img src="image/UM_Logo.png" width="7%"><img src="image/FSKTM_Logo.png" width="15%"></a></h1>
                    <div class="row">
                        <div class="col">
                            <form action="processSignup.php" method="POST">

                            <div class="form-group card-text">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="InputName" name="name" placeholder="  enter name" required/>
                                </div>

                                <div class="form-group" required>
                                    <input type="email" class="form-control form-control-sm" id="InputEmail" name="email" placeholder="  enter email" required/>
                                </div>
            
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="InputPassword" name="password" placeholder="  enter password" required/>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="InputPassword2" name="rpassword" placeholder="  reenter password" required/>
                                </div>

                                <div class="mb-4">
                                    <select class="form-select" aria-label="Default select example" name="course" style="font-size: 14px;">
                                        <option selected>select course</option>
                                        <option value="Bachelor of Computer Science (Artificial Intelligence)">Bachelor of Computer Science (Artificial Intelligence)</option>
                                        <option value="Bachelor of Computer Science (Computer System and Network)">Bachelor of Computer Science (Computer System and Network)</option>
                                        <option value="Bachelor of Computer Science (Information Systems)">Bachelor of Computer Science (Information Systems)</option>
                                        <option value="Bachelor of Computer Science (Software Engineering)">Bachelor of Computer Science (Software Engineering)</option>
                                        <option value="Bachelor of Information Technology (Multimedia)">Bachelor of Information Technology (Multimedia)</option>
                                        <option value="Bachelor of Computer Science (Data Science)">Bachelor of Computer Science (Data Science)</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                        <input class="form-control form-select" style="font-size: 14px;" name="year" id="datepicker" placeholder="choose graduation year" required/>

                                        <script>
                                        $(document).ready(function(){
                                        $("#datepicker").datepicker({
                                            format: "yyyy",
                                            viewMode: "years", 
                                            minViewMode: "years",
                                            autoclose:true
                                        });   
                                        })
                                        </script>
                                </div>

                            </div>
            
                        </div>
                        <div class="col"><br><br><br>
                            <?php
                                $action=isset($_GET['action']) ? $_GET['action'] : "";

                                if($action == "signup_failed"){?>

                                <html>
                                    <div class="alert alert-danger" role="alert" style="font-size: 13px;">Passwords did not match. <br>Please try again.</div>
                                </html>
                            <?php  
                                }
                            ?>
                            <button type="submit" class="btn btn-signup text-white" style="width: 60%; height: 40px;"  >sign up</button><br><br>
                            <h class="text-center" style="font-size: 13px;">already have have an account?</h><br>
                            <a href="login.php" type="button" class="btn btn-login text-white">log in</a>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>