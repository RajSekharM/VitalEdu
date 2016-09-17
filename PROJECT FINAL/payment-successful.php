<?php
	require ('dbconn.php');
	session_start();
	$student_id = $_SESSION['userSession'];
	$data['item_name']		= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']			= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 		= $_POST['custom'];
		
	$sql = "INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime, student_id, timetable_id) VALUES ('".$data['txn_id']."' , '".$data['payment_amount']."' , '".$data['payment_status']."' , '".$data['item_number']."' , '".date("Y-m-d H:i:s")."', '$student_id', '".$data['custom']."')";
	if(mysqli_query($conn, $sql)){
		
		$sql = "INSERT INTO studentcourse (`student_id`, `course_id`) VALUES ('$student_id', '".$data['item_number']."')";
		if (mysqli_query($conn, $sql)) {
		}		
	
		$sql = "INSERT INTO student_course (`student_id`, `timetable_id`) VALUES ('$student_id', '".$data['custom']."')";
		if (mysqli_query($conn, $sql)) {
		}
		
		$sql = "UPDATE course_timetable SET avail_seats = avail_seats-1 WHERE id = ('".$data['custom']."')";
		if (mysqli_query($conn, $sql)) {
		}	

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Successful</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<br/><br/><br/><br/><br/><br/><br/>
	<div class = "container text-center">
		<h1>Thank You</h1>
		<p>Your payment was successful. Thank you.</p>
		<p>This page will be redirected to homepage in 5 seconds.. If not, click <a href = "index.php">here</a></p>
		<?php header( "refresh:5;url=index.php" ); ?>	
	</div>
</body>
</html>