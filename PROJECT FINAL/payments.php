<?php
	error_reporting(0);
	require('dbconn.php');
	session_start();
	if(isset($_SESSION['userSession'])){
	
	$student_id = $_SESSION['userSession'];
	$course_id = $_POST['item_number'];
	$custom = $_POST['custom'];

	$paypal_email = '30124524-facilitator@stud.mit.edu.au';
	$return_url = 'http://rajsekharmasina.com/PROJECT%20FINAL/payment-successful.php';	
	$cancel_url = 'http://rajsekharmasina.com/PROJECT%20FINAL/payment-cancelled.php';
	$notify_url = 'http://rajsekharmasina.com/PROJECT%20FINAL/paymentnotify.php';

		$sql = "SELECT course_name, course_price FROM course WHERE course_id = '$course_id'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while($info = mysqli_fetch_array($result)){
				$course_name = $info['course_name'];
				$course_price = $info['course_price'];
			}
		}

$item_name = $course_name;
$item_amount = $course_price;

if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	$querystring .= "?business=".urlencode($paypal_email)."&";
	
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";

	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	$querystring .= "&custom=".urlencode($custom);
	
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} else {
}
}else{ ?>
<html>

<head><title>VITAL EDUCATION</title>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script></head>
<h2 align = 'center' style = 'padding-top:20%'>YOU NEED TO BE LOGGED IN TO BOOK THIS COURSE</h2><br/>
<h4 align = 'center'><a href = "login.php">ALREADY A MEMBER</a></h4><br/>
<h4 align = 'center'><a href = "register.php">NEW MEMBER</a></h4>
<?php }
?>