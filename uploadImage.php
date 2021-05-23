<?php

session_start();
$emails = $_SESSION['email'];
include_once("config\config.php");
if(isset($_POST['updateImage'])){
    $img_name = $_FILES['profileImage']['name'];
    $img_size = $_FILES['profileImage']['size'];
    $tmp_name = $_FILES['profileImage']['tmp_name'];
    $img_data = file_get_contents($tmp_name);
    $img_error = $_FILES['profileImage']['error'];
    
    if($img_error == 0){
        if($img_size > 125000){
            echo "Your file is too large";
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_ex = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_ex)){
                $dest = "user-image/$img_name";
                move_uploaded_file($tmp_name, $dest);
                $sql = "UPDATE user SET user_image = '$img_name' WHERE user_email='$emails'";
                $result = mysqli_query($mysqli, $sql);
                header("Location: profile.php");
                echo "success";
                mysqli_close($mysqli);
            }
            else{
                echo "Wrong file type";
            }
        }
    }
    else{
        echo "Error occured";
    }
}
?>