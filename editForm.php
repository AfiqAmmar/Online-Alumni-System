<?php

    session_start();
    $emails = $_SESSION['email'];
    include_once("config\config.php");
    $sql = "SELECT * FROM user WHERE user_email='$emails'";
    $result = mysqli_query($mysqli, $sql);
    while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $name = $res['user_name'];
        $course = $res['user_course'];
        $year = $res['user_year'];
        $bio = $res['user_bio'];
        $city = $res['user_city'];
        $state = $res['user_state'];
        $email = $res['user_email'];
        $phone = $res['user_phone'];
        $linkedin = $res['user_linkedin'];
        $image = $res['user_image'];
        $password = $res["user_password"];
    }
    echo $state;
    echo $bio;

    $messageErrName = "";
    $messageErrEmail = "";
    $messageErrPass = "";
    $messageErrPassRep = "";
    $messageErrYear = "";
    function function_alert($message) {
        echo "<script>alert('$message');</script>";
    }
    if(isset($_POST['submitEdit'])){
        $nameUp =  $_POST['inputName'];
        $emailUp = $_POST['inputEmail'];
        $passwordUp = $_POST['inputPassword'];
        $passwordRepUp = $_POST['inputConfirmPassword'];
        $courseUp = $_POST['inputCourse'];
        $yearUp = $_POST['inputGradYear'];
        $cityUp = $_POST['inputCity'];
        $stateUp = $_POST['inputState'];
        $phoneUp = $_POST['inputPhoneNumber'];
        $linkedinUp = $_POST['inputLinkedIn'];
        $bioUp = $_POST['inputBio'];

        if(empty($_POST['inputName'])){
            $messageErrName = "Name is required";
        }
        else{
            if(empty($_POST['inputEmail'])){
                $messageErrEmail = "Email is required";
            }
            else{ 
                if(empty($_POST['inputGradYear'])){
                    $messageErrYear = "Graduation Year is required";
                }
                else{
                    if(!filter_var($emailUp, FILTER_VALIDATE_EMAIL)){
                        $messageErrEmail = "Invalid email format";
                    }
                    else{
                        if(!empty($_POST['inputPassword'])){
                            if(strcmp($passwordUp,$passwordRepUp) != 0){
                                $messageErrPassRep = "Password is not the same, confirm again";
                            }
                            else{
                                $hashedPassword = sha1($passwordUp);
                                // $sqlUp = "UPDATE user SET user_name = '$nameUp' WHERE user_email='$emails'";
                                $sqlUp = "UPDATE user SET user_email = '$emailUp', user_password = '$hashedPassword', user_name = '$nameUp', user_course = '$courseUp', user_year = '$yearUp', user_city = '$cityUp', user_state = '$stateUp', user_phone = '$phoneUp', user_bio = '$bioUp' WHERE user_email='$emails'";
                                $resultUp = mysqli_query($mysqli, $sqlUp);
                                $sqlUpLink = "UPDATE user SET user_linkedin = '$linkedinUp' WHERE user_email='$emailUp'";
                                $resultUpLink = mysqli_query($mysqli, $sqlUpLink);
                                $_SESSION['email'] = $_POST['inputEmail'];
                                echo "<script>alert('Changes made have been saved')</script>";
                                echo "<script>window.location = 'profile.php'</script>";;
                            }
                        }
                        else{
                                $sqlUp = "UPDATE user SET user_email = '$emailUp', user_name = '$nameUp', user_course = '$courseUp', user_year = '$yearUp', user_city = '$cityUp', user_state = '$stateUp', user_phone = '$phoneUp', user_bio = '$bioUp' WHERE user_email='$emails'";
                                $resultUp = mysqli_query($mysqli, $sqlUp);
                                $sqlUpLink = "UPDATE user SET user_linkedin = '$linkedinUp' WHERE user_email='$emailUp'";
                                $resultUpLink = mysqli_query($mysqli, $sqlUpLink);
                                $_SESSION['email'] = $_POST['inputEmail'];
                                echo "<script>alert('Changes made have been saved')</script>";
                                echo "<script>window.location = 'profile.php'</script>";
                        }
                    }
                
                }
            }
        }
    }

    $messageErrDel = "";
    if(isset($_POST['submitDelete'])){
        $passwordDel = $_POST['deletePassword']; 
        if($passwordDel == $password){
            $sqlP = "DELETE FROM user WHERE user_email='$emails'";
            $resultP = mysqli_query($mysqli, $sqlP);
            echo "<script>alert('Account has been deleted')</script>";
            echo "<script>window.location = 'index.html'</script>";;
            session_destroy();
        }
        else{
            $messageErrDel = "Your password did not match, try again";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <title>FCSIT UM Alumni</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid justify-content-center">
          <a class="navbar-brand" href="#"><img src="image/UM_Logo.png" alt="UM Logo" width="44" height="48"><img src="image/FSKTM_Logo.png" alt="FSKTM Logo" width="92" height="48"></a>
        </div>      
    </nav>
    
    <div class="container-fluid mt-3 d-flex justify-content-center">
        <div class="card manage-profile shadow" style="width: 45rem;">
            <div class="card-header card-header-editForm text-center text-white">
                <strong>Manage Profile</strong>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row mx-1 my-2">
                        <div class="col form-group">
                            <label for="inputName" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="inputName" value="<?php echo $name ?>" required>
                            <p class="text-danger"><i><?php 
                            echo $messageErrName;
                            $messageErrName = "";
                            ?></i></p>
                        </div>
                        <div class="col form-group">
                            <label for="inputEmail" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="inputEmail" value="<?php echo $email ?>" required>
                            <p><?php 
                            echo $messageErrEmail;
                            $messageErrEmail = "";
                            ?></p>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col form-group">
                            <label for="inputPassword" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="inputPassword" value="">
                            <h6 id="passwordError"><i><small></small></i></h6>
                        </div>
                        <div class="col form-group">
                            <label for="inputConfirmPassword" class="col-form-label">Confirm Password:</label>
                            <input type="password" class="form-control" name="inputConfirmPassword" value="">
                            <p class="text-danger text-small"><i><?php 
                            echo $messageErrPassRep;
                            $messageErrPassRep = "";
                            ?></i></p>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col-md-8 form-group">
                            <label for="inputCourse" class="col-form-label">Course:</label>
                            <!-- <input type="text" class="form-control" id="inputCourse" value="Bachelor of Computer Science(Software Engineering)"> -->
                            <select class="form-select" name="inputCourse" required aria-label="Default select example">
                                <option selected><?php echo $course ?></option>
                                <option value="1">Bachelor of Computer Science (Artificial Intelligence)</option>
                                <option value="1">Bachelor of Computer Science (Software Engineering)</option>
                                <option value="2">Bachelor of Computer Science (Computer System and Network)</option>
                                <option value="3">Bachelor of Computer Science (Information Systems)</option>
                                <option value="4">Bachelor of Information Technology (Multimedia)</option>
                                <option value="5">Bachelor of Computer Science (Data Science)</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="inputGradYear" class="col-form-label">Graduation Year:</label>
                            <input type="text" class="form-control form-select" name="inputGradYear" id="inputGradYear" value="<?php echo $year ?>" required>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col form-group">
                            <label for="inputCity" class="col-form-label">City:</label>
                            <input type="text" class="form-control" name="inputCity" value=<?php echo $city ?>>
                        </div>
                        <div class="col form-group">
                            <label for="inputState" class="col-form-label">State:</label>
                            <input type="text" class="form-control" name="inputState" value=<?php echo $state ?>>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col form-group">
                            <label for="inputPhoneNumber" class="col-form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="inputPhoneNumber" value=<?php echo $phone ?>>
                        </div>
                        <div class="col form-group">
                            <label for="inputLinkedIn" class="col-form-label">LinkedIn:</label>
                            <input type="text" class="form-control" name="inputLinkedIn" value=<?php echo $linkedin ?>>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col form-group">
                            <label for="inputBio" class="col-form-label">Bio:</label>
                            <input type="text" class="form-control" name="inputBio" value=<?php echo $bio ?>>
                            <?php echo $bio ?>
                        </div>
                    </div>
                    <div class="row mx-1 my-2">
                        <div class="col form-group d-flex justify-content-center">
                            <a href="profile.php" class="btn btn-cancel bg-none text-dark">Cancel</a>
                            <input type="submit" class="text-white" name="submitEdit" id="submitEdit" value="Save changes">                           
                        </div>
                    </div>
                </form>
                <div class="row mx-1 mt-4 mb-3">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-editForm btn-delete btn-danger btn-sm text-center" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete this account</button>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h6 class="modal-title text-white" id="deleteModalLabel">Warning</h6>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this account?</p>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                                <label for="inputDeletePassoword" class="col-form-label">Please enter your password to proceed</label>
                                                <input type="password" class="form-control" name="deletePassword" id="inputDeletePassoword">
                                                <p class="my-2"><i><?php 
                                                echo $messageErrDel;
                                                $messageErrDel = "";
                                                ?></i></p>
                                                <div class="my-3 float-end">
                                                    <button type="button" class="btn btn-editForm btn-closed" data-bs-dismiss="modal">Cancel</button>
                                                    <input type="submit" class="text-white bg-danger" id="submitDelete" name="submitDelete" value="Confirm">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="profile.js"></script> 
</body>
</html>