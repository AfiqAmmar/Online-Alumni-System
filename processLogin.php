<?php

include_once("config\config.php"); 

$email = $password = $role = "";

$email = $_POST["email"];
$password = $_POST["password"];
$role = $_POST["role"];

$hashedpassword = sha1($password);


if($role == 'alumni'){
  $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$hashedpassword'";

  $result = mysqli_query($mysqli, $sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $id = $row["userid"];
      $email = $row["email"];
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $email;
    }
    header("Location: profile.php");
  }
  else{header("Location: login.php? action=login_failed");
  }
}

if($role == 'admin'){
  $sql = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$hashedpassword'";

  $result = mysqli_query($mysqli, $sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $id = $row["userid"];
      $email = $row["email"];
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $email;
    }
    header("Location: manageEvents.html");
  }
  else{
    header("Location: login.php? action=login_failed");
  }
}
?>

