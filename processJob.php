<?php

session_start();
include_once("config\config.php"); 
$emailUser = $_SESSION['email']; 
// $Host = 'localhost:3306';
// $database = 'job';
// $username = 'job_admin';
// $password = 'password';

//     $mysqli = mysqli_connect($Host, $username, $password, $database); 

//     if ( mysqli_connect_errno() ) {
// 	   // die() is equivalent to exit()
// 	   die( "Database connection failed: " . mysqli_connect_error() );
// 	} 

$update = false;


//parameter = name(from input)
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $cname = $_POST["cname"];
    $caddress = $_POST["caddress"];
    $citystate = $_POST["citystate"];
    $desc = $_POST["desc"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];

     
    $img_name = $_FILES['photo']['name'];
    $target = "job-image/".basename($img_name);
    $ttt = "INSERT INTO job (job_position, company, company_Address,job_image, job_city_state, job_description, job_contact, job_email, user_email) VALUES ('$title', '$cname', '$caddress','$img_name', '$citystate', '$desc', '$contact', '$email', '$emailUser')";
    mysqli_query($mysqli, $ttt );

    move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    header('location: JOB_Ad.php');

    
}


if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $title = $_POST["title"];
    $cname = $_POST["cname"];
    $caddress = $_POST["caddress"];
    $citystate = $_POST["citystate"];
    $desc = $_POST["desc"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];

    $img_name = $_FILES['photo']['name'];
    $target = "job-image/".basename($img_name);

    $uuu = "UPDATE job SET job_position='$title', company='$cname', company_Address='$caddress', job_city_state='$citystate', job_description='$desc', job_contact='$contact', job_email='$email' WHERE job_id='$id'";
    
    if ($img_name){
        $uuu2 = "UPDATE job SET job_image='$img_name' WHERE job_id='$id'";
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        mysqli_query($mysqli,$uuu2);
    }

    if (mysqli_query($mysqli,$uuu)){
        header('location: JOB_Ad.php');
    }


}

//parameter=?del=...
if (isset($_GET['del'])) {
	$id = $_GET['del'];
    $ddd = "DELETE FROM job WHERE job_id='$id'";
	//mysqli_query($mysqli, $ddd);
    if (mysqli_query($mysqli,$ddd)){
	    header('Location: JOB_Ad.php');
    }
	
}


?>




