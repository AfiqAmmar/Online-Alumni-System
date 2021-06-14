<?php

include_once("config/config.php");

if (isset($_POST['save'])){

    $id = $_GET['id'];


    $name = $_POST["user_name"];
    $course = $_POST["user_course"];
    $year = $_POST["user_year"];
    $city = $_POST["user_city"]; 
    $state = $_POST["user_state"];
    $phone = $_POST["user_phone"];
    $bio = $_POST["user_bio"];
    $linkedin = $_POST["user_linkedin"];

    try{

        $sql = "UPDATE user SET user_name='$name', user_course='$course', user_year='$year', user_city='$city', user_state='$state',
        user_phone='$phone', user_bio='$bio', user_linkedin='$linkedin'  WHERE user_id=$id  ";

        if (mysqli_query($mysqli, $sql)) {
            header("Location: ProfileView.php?id=$id");
        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }


    }
    catch (Exception $e) {
        echo "failed";
    }

    


}


?>