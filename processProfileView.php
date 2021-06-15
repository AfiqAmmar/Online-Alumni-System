<?php

include_once("config/config.php");

if (isset($_POST['delete'])){
   
    $email = $_GET['id'];
    

    
    

    try{

        $sql = "DELETE FROM user WHERE user_email='$email'  ";
        
        if (mysqli_query($mysqli, $sql)) {
            header("Location: AdminMembers.php");
        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }


    }
    catch (Exception $e) {
        echo "failed";
    }

    


}

if (isset($_POST['approve'])){
   
    $email = $_GET['id'];
    $page = $_GET['page'];


    try{

        $sql = "UPDATE user SET user_status='approved' WHERE user_email='$email'  ";
        
        if (mysqli_query($mysqli, $sql)) {

            header("Location: ProfileView.php?page=$page&id=$email");
        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }


    }
    catch (Exception $e) {
        echo "failed";
    }

    


}


?>