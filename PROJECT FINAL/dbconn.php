<?php
$server = "localhost";
$username = "vitaledu_user";
$password = "vitaledu_user";
$db = "project_db";
$conn = mysqli_connect("$server", "$username", "$password", "$db");

$conn = mysqli_connect("$server", "$username", "$password", "$db") or   die("Error " . mysqli_error($conn));

if (!$conn)                                     
{ 
    echo "We have a problem!";
	
}
?>