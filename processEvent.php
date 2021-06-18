<?php
    session_start();
    $emails = $_SESSION['email'];
    include("config\config.php");

    if(isset($_POST['add'])) {

        $name = $_POST['event_name'];
        $organiser = $_POST['event_organiser'];
        $date = $_POST['event_date'];
        $start = $_POST['event_start'];
        $end = $_POST['event_end'];
        $venue = $_POST['event_venue'];
        $desc = mysqli_real_escape_string($mysqli, $_POST['event_description']);
        $email = $_POST['admin_email'];

        $image = $_FILES['event_image']['name'];
        $target = "event-image/".basename($image);

        $sql = "INSERT INTO event (event_name, event_organiser, event_date, event_start, event_end, event_venue, event_image, event_description, admin_email)
        VALUES ('$name', '$organiser', '$date', '$start', '$end', '$venue', '$image', '$desc', '$email')"; 

        move_uploaded_file($_FILES['event_image']['tmp_name'], $target);
        
        if (mysqli_query($mysqli, $sql)) {
		    header("Location: manageEvents.php");  
	    } else {
            header("Location: addEvent.php");
		    echo "Error: " . $sql . "" . mysqli_error($mysqli);
	    }
	    mysqli_close($mysqli);
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['event_id'];
        $password = $_POST['admin_password'];
        $sqlA = "SELECT * from admin WHERE admin_password='$password'";
        $result = mysqli_query($mysqli, $sqlA);
        while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $email = $res['admin_email'];
        }

        if ($email==$emails) {
            $sql = "DELETE FROM event WHERE event_id='$id' AND admin_email='$email'";
        }

        if (mysqli_query($mysqli, $sql)) {
		    header("Location: manageEvents.php");  
	    } else {
		    echo "Error deleting record!";
	    }
	    mysqli_close($mysqli);
    }

    if (isset($_POST['save'])) {
        $id = $_POST['event_id'];
        $name = $_POST['event_name'];
        $organiser = $_POST['event_organiser'];
        $date = $_POST['event_date'];
        $start = $_POST['event_start'];
        $end = $_POST['event_end'];
        $venue = $_POST['event_venue'];
        $desc = mysqli_real_escape_string($mysqli, $_POST['event_description']);
        $email = $_POST['admin_email'];

        $image = $_FILES['event_image']['name'];
        $target = "event-image/".basename($image);

        $sql = "UPDATE event SET event_name='$name', event_organiser='$organiser', event_date='$date', 
        event_start='$start', event_end='$end', event_venue='$venue', event_description='$desc', admin_email='$email' WHERE event_id=$id";

        if ($image) {
            $sql2 = "UPDATE event SET event_image='$image' WHERE event_id=$id";
            move_uploaded_file($_FILES['event_image']['tmp_name'], $target);
            mysqli_query($mysqli, $sql2);
        }

        if (mysqli_query($mysqli, $sql)) {
		    header("Location: manageEvents.php");  
	    } else {
		    echo "Error: " . $sql . "" . mysqli_error($mysqli);
	    }
	    mysqli_close($mysqli);
    }
?>