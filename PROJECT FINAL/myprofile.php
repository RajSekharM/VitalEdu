<?php 
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	if(isset($_SESSION['userSession'])){
		
	$student_id = $_POST['s_id'];
	
	$sql = "SELECT * FROM student where student_id = '$student_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		while($info = mysqli_fetch_array($result)){
			$student_fname = $info['student_firstname'];												
			$student_lname = $info['student_lastname'];
			$student_address = $info['student_address'];
			$student_email = $info['student_email'];
			$student_mobile = $info['student_mobile'];
			$student_dob = $info['student_dob'];
		}	
	}
	else{
			header('Location: index.php');
	}
	$sql = "SELECT id, course_name, location_name,tutor_name,month_name,day_name,date_name,st.time_name AS 'starttime',et.time_name AS 'endtime',avail_seats FROM course_timetable 
			JOIN student_course ON student_course.timetable_id = course_timetable.id AND student_course.student_id = '$student_id'
			JOIN course ON course.course_id = course_timetable.course_id 
			JOIN location ON location.location_id = course_timetable.location_id
			JOIN tutor ON tutor.tutor_id = course_timetable.tutor_id
			JOIN timetable_month ON timetable_month.month_id = course_timetable.month_id AND timetable_month.month_id >= MONTH(NOW())
			JOIN timetable_day ON timetable_day.day_id = course_timetable.day_id
			JOIN timetable_date ON timetable_date.date_id = course_timetable.date_id
			JOIN timetable_time as st ON st.time_id = course_timetable.starttime_id
			JOIN timetable_time as et ON et.time_id = course_timetable.endtime_id
			ORDER BY month_name DESC, date_name ASC";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$id[] = $info['id'];
			$crs_name[] = $info['course_name'];
			$loc_name[] = $info['location_name'];
			$tut_name[] = $info['tutor_name'];
			$mon_name[] = $info['month_name'];
			$day_name[] = $info['day_name'];
			$dat_name[] = $info['date_name'];
			$strtime[] = $info['starttime'];
			$endtime[] = $info['endtime'];			
		}
	}
	}else{
			header('Location: login.php');
	}
?>
<html>
	<head>
		<title>My Profile</title>
	</head>
	<body>
	<br/>
		<div class = "container">
			<p class = "text-center" style = "padding:2%"><big>Hello <?php echo $student_fname; ?></big></p>
			<div class = "panel panel-default">
				<div class = "panel-heading text-center">
					<big><strong>Enrolled Courses</strong></big>
				</div>
				<div class = "panel-body table-responsive" style = "padding:0px">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>COURSE NAME</th>
							<th>LOCATION NAME</th>
							<th>DATE</th>
							<th>START TIME</th>
							<th>END TIME</th>
						</tr>
					</thead>
					<?php
						for($i = 0; $i < sizeof($id); $i++){ 
					?>
					<tr>
						<td><?php echo $crs_name[$i]; ?></td>
						<td><?php echo $loc_name[$i]; ?></td>
						<td><?php echo sprintf("%02s", $dat_name[$i])."-".$mon_name[$i]. "-".date("Y") ?></td>
						<td><?php echo $strtime[$i]; ?></td>
						<td><?php echo $endtime[$i]; ?></td>
					</tr>
					<?php
						}
					?>
					</table>
				</div>
			</div>
		</div>	
		<br/><br/><br/>
		<?php
			include ('footer.php');
		?>	
	</body>
</html>