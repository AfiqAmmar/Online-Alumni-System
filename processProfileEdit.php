<?php

include_once("config/config.php");

if (isset($_POST['save'])){

    $email = $_GET['id'];
    $page = $_GET['page'];


    $name = $_POST["user_name"];
    $course = $_POST["user_course"];
    $year = $_POST["user_year"];
    $city = $_POST["user_city"]; 
    $state = $_POST["user_state"];
    $phone = $_POST["user_phone"];
    $bio = $_POST["user_bio"];
    $linkedin = $_POST["user_linkedin"];

    $image = $_FILES['image']['name'];
    $target = "user-images/".basename($image);

    try{

        $sql = "UPDATE user SET user_name='$name', user_course='$course', user_year='$year', user_city='$city', user_state='$state',
        user_phone='$phone', user_bio='$bio', user_linkedin='$linkedin'  WHERE user_email='$email'  ";
         echo "okay";

        if ($image) {
         $sql2 = "UPDATE user SET user_image='$image' WHERE user_email=$email";
         
         move_uploaded_file($_FILES['image']['tmp_name'], $target);
         mysqli_query($mysqli, $sql2);
        }

        if (mysqli_query($mysqli, $sql)) {
         header("Location: ProfileView.php?page=$page&id=$email");
            }    else {
          echo "Error updating record: " . mysqli_error($mysqli);
        }


    }
    catch (Exception $e) {
        echo "failed";
    }

    


}


?>