<?php
/*
//Sample MySQLi config file
 */
//Step 1: Connecting to a Database using MySQLi API 
// modify these variables for your installation
$databaseHost = 'localhost';
$databaseName = 'online_alumni_system';
$databaseUsername = 'alumni';
$databasePassword = 'alumni123';


//MySQLi Procedural
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//MySQLi Object-Oriented approach
/*
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
*/

//MySQLi Procedural approach
// mysqli_connect_errno returns the last error code
if ( mysqli_connect_errno() ) {
	// die() is equivalent to exit()
	die( "Database connection failed: " . mysqli_connect_error() );
} 

//Step 2: Handling Connection Errors - mysqli 
//MySQLi Object-Oriented approach
//connect_errno returns the last error code
// Check connection
/*
if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}
*/

// echo "Database connected successfully <br>";


?>
