<?php
	require ('dbconn.php');
	$data['student_id']		= $_POST['payer_id'];
	$data['item_name']		= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']			= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
//	$data['custom'] 		= $_POST['custom'];
	$customs 			= explode(',', $_POST['custom']);
		
	$sql = "INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime, student_id, timetable_id) VALUES ('".$data['txn_id']."' , '".$data['payment_amount']."' , '".$data['payment_status']."' , '".$data['item_number']."' , '".date("Y-m-d H:i:s")."', '".$customs[0]."', '".$customs[1]."')";
	if(mysqli_query($conn, $sql)){
		$sql = "INSERT INTO studentcourse (`student_id`, `course_id`) VALUES ( '".$customs[0]."', '".$data['item_number']."')";
		if (mysqli_query($conn, $sql)) {
		}		
	
		$sql = "INSERT INTO student_course (`student_id`, `timetable_id`) VALUES ( '".$customs[0]."',  '".$customs[1]."')";
		if (mysqli_query($conn, $sql)) {
		}
		
		$sql = "UPDATE course_timetable SET avail_seats = avail_seats-1 WHERE id = ( '".$customs[1]."')";
		if (mysqli_query($conn, $sql)) {
		}	

	}
	
?>