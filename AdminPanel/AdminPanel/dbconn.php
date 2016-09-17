<?php
$server = "localhost";
$username = "vitaledu_admin";
$password = "vitaledu_admin";
$db = "project_db";
$conn = mysqli_connect("$server", "$username", "$password", "$db");

$conn = mysqli_connect("$server", "$username", "$password", "$db") or   die("Error " . mysqli_error($conn));

if (!$conn)                                     
{ 
    echo "We have a problem!";
	
}
?>