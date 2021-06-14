<?php

include_once("config/config.php");

if (isset($_POST['delete'])){
   
    $id = $_GET['id'];
    

    
    

    try{

        $sql = "DELETE FROM user WHERE user_id=$id  ";
        
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
   
    $id = $_GET['id'];
    $page = $_GET['page'];


    try{

        $sql = "UPDATE user SET user_status='Approved' WHERE user_id=$id  ";
        
        if (mysqli_query($mysqli, $sql)) {

            header("Location: ProfileView.php?page=$page&id=$id");
        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }


    }
    catch (Exception $e) {
        echo "failed";
    }

    


}


?>