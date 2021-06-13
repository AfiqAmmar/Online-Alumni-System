<?php
class Common
{
    public function getAllRecords($connection) {
        error_reporting(0);
        $query = "SELECT * FROM user WHERE user_email = '{$_SESSION["email"]}'";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }

    public function getValue($con, $field){
        error_reporting(0);
        $query = mysqli_query($con, "SELECT {$field} FROM user WHERE user_email='{$_SESSION['email']}'") ;
        $table = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $table[0][$field];
    }
    
}