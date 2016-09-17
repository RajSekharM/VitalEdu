<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
	$paypal_id = '30124524@stud.mit.edu.au'; //Business Email
	
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM course where course_id = '$id' AND course_status = 'show'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
	while($info = mysqli_fetch_array($result)){
		$GLOBALS['course_id'] = $info['course_id'];												
		$GLOBALS['course_name'] = $info['course_name'];
		$GLOBALS['course_overview'] = $info['course_overview'];
		$GLOBALS['course_desc'] = $info['course_desc'];
		$GLOBALS['course_price'] = $info['course_price'];
		$GLOBALS['course_duration'] = $info['course_duration'];
		$GLOBALS['course_image'] = $info['course_image'];
		$GLOBALS['course_content'] = $info['course_content'];
		$GLOBALS['course_prerequisite'] = $info['course_prerequisite'];		
		$GLOBALS['course_certification'] = $info['course_certification'];
		$GLOBALS['course_support'] = $info['course_support'];		
	}
	}
	else{
		header('Location: index.php');
	}
	
	$location = array();
	$tutor = array();
	$month = array();
	$day = array();
	$date = array();
	$start = array();
	$end = array();
	$seats = array();
	
	$curdat = date("Y.m.d");
	list($yr, $mnth, $dat) = explode('.', $curdat);

$sql = "SELECT id, course_name, location_name,tutor_name,month_name,day_name,date_name,st.time_name AS 'starttime',et.time_name AS 'endtime',avail_seats FROM course_timetable 
JOIN course ON course.course_id = course_timetable.course_id AND course.course_id = '$id'
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
			$timetable_id[] = $info['id'];
			$location[] = $info['location_name'];
			$tutor[] = $info['tutor_name'];			
			$month[] = $info['month_name'];	
			$day[] = $info['day_name'];		
			$date[] = $info['date_name'];	
			$start[] = $info['starttime'];												
			$end[] = $info['endtime'];												
			$seats[] = $info['avail_seats'];
		}
	}
							
							$sql = "SELECT DISTINCT(course.course_name) FROM course,course_timetable WHERE course.course_id = course_timetable.course_id ORDER BY course_name";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0){
								while($info = mysqli_fetch_array($result)){
									$crs_src[] = $info['course_name'];
								}
							}
							
							$sql = "SELECT DISTINCT(location.location_name) FROM location, course_timetable WHERE location.location_id = course_timetable.location_id ORDER BY location_name ASC";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0){
								while($info = mysqli_fetch_array($result)){
									$loc_src[] = $info['location_name'];
								}
							}
							
							$sql = "SELECT DISTINCT(timetable_time.time_name) FROM timetable_time, course_timetable WHERE timetable_time.time_id = course_timetable.starttime_id ORDER BY timetable_time.time_id";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0){
								while($info = mysqli_fetch_array($result)){
									$tym_src[] = $info['time_name'];
								}
							}
							
							$sql = "SELECT DISTINCT(CONCAT(timetable_date.date_name, '/', timetable_month.month_name)) AS 'date' FROM timetable_date, timetable_month, course_timetable WHERE timetable_date.date_id = course_timetable.date_id AND timetable_month.month_id = course_timetable.month_id  ORDER BY month_name DESC, date_name";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0){
								while($info = mysqli_fetch_array($result)){
									$dat_src[] = $info['date'];
								}
							}							
							
	$student_fname = "";
	$student_lname = "";
	$student_email = "";
	if(isset($_SESSION['userSession'])){
		$student_id = $_SESSION['userSession'];
		$sql = "SELECT student_firstname, student_lastname, student_email FROM student WHERE student_id = '$student_id'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
		while($info = mysqli_fetch_array($result)){
		$student_fname = $info['student_firstname'];
		$student_lname = $info['student_lastname'];
		$student_email = $info['student_email'];
		}
	}			
	}		
?>

<html lang = "en">
	<head><title><?php echo $course_name; ?></title>
	</head>
	<body style = "line-height:200%" >
		<img src = "images/others/course_header.jpg" alt = "<?php echo $course_name; ?>" width  ="100%"/>	

		<div class="container" style = "margin-top: 5%;margin-bottom: 10%">
			<div class="row clearfix">
				<div class="col-md-8 column">
					<div class="row clearfix">
						<div class="col-md-12 column">
							<h1><?php echo $course_id ."\n - \n". $course_name ?></h1>
							<h2><?php echo "Course Duration: " .$course_duration. "min" ?></h2>
							<hr/>
							<p><?php echo $course_overview ?><hr/></p>
							<h3 id = "course_desc">Course Description</h3>
							<p><?php echo $course_desc ?></p>
						
							<hr/>
						
							<div class = "box-shadow--4dp">
								<table class="table table-responsive table-hover table-striped" id = "booking">
									<tbody>
									<?php for($i = 0; $i < sizeof($day); $i++){ ?>
										<tr align = "center" style = "border-left:7px solid; border-color:#555;">
											<td>
												<div><?php echo substr($month[$i], 0, 3); ?></div>
												<div><h3 style = "margin: 0%;"><strong><?php echo sprintf("%02s", $date[$i]); ?></strong></h3></div>
												<div><?php echo substr($day[$i], 0, 3); ?></div>
											</td>
										
											<td>
												<div><h3 style = "margin: 2%;"><span class = "glyphicon glyphicon-map-marker hidden-xs" style = "font-size:70%"; ></span><?php echo " ".$location[$i]; ?></h3></div>
												<div><span class = "glyphicon glyphicon-time hidden-xs"></span><?php echo " ". $start[$i] ." - ". $end[$i]; ?></div>
											</td>
											
											<td>
												<div><h4 style = "margin-top: 8%;margin-bottom: 0%;"><strong><?php echo $seats[$i]?></strong></h4></div>
												<div><p class = "text-muted">seats available</p></div>												
											</td>
											
											<td>
												<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
											<input type="hidden" name="cmd" value="_xclick" />
											<input type="hidden" name="no_note" value="1" />
											<input type="hidden" name="lc" value="AU" />
											<input type="hidden" name="currency_code" value="AUD" />
											<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
											<input type="hidden" name="item_number" value="<?php echo $course_id; ?>" / >
								<input type="hidden" name="custom" value="<?php echo $_SESSION['userSession'] . ",". $timetable_id[$i]; ?>" / >
											<button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit" name = "submit" <?php if($seats[$i] < 1){ echo 'disabled'; } ?> ><?php echo "$" . $course_price . " AUD"?></button>
												</form>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<hr/>
							<div>
								<ul class="nav nav-tabs nav-justified">
									<li class = "active"><a data-toggle="tab" href="#certification"><strong>Certification</strong></a></li>
									<li><a data-toggle="tab" href="#contents"><strong>Contents</strong></a></li>
									<li><a data-toggle="tab" href="#prerequisites"><strong>Pre-requisites</strong></a></li>
									<li><a data-toggle="tab" href="#support"><strong>Support</strong></a></li>
								</ul>
														
								<div class="tab-content box-shadow--4dp course_tabs">
									<div id="certification" class="tab-pane fade in active">
										<h3>Certification</h3>
										<p><?php echo $course_certification ?></p>
									</div>
									<div id="contents" class="tab-pane fade">
										<h3>Course Contents</h3>
										<p><?php echo $course_content ?></p>	
									</div>
									<div id="prerequisites" class="tab-pane fade">
										<h3>Pre-Requisites</h3>
										<p><?php echo $course_prerequisite ?></p>
									</div>
									<div id="support" class="tab-pane fade">
										<h3>Support</h3>
										<p><?php echo $course_support ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="col-md-4">
				<br/>
					<div class="panel panel-success">
						<div class="panel-heading text-center"><h4>Search courses</h4></div>
						
						<div class = "panel-body panel_bodies">
							<div class = "text-center">
								<ul class="btn-group btn-group-justified list-inline">
									<li class="active"><a class = "btn btn-default" data-toggle="pill" href="#course">Course</a></li>
									<li><a class = "btn btn-default" data-toggle="pill" href="#location">Location</a></li>
									<li><a class = "btn btn-default" data-toggle="pill" href="#date">Date</a></li>
									<li><a class = "btn btn-default" data-toggle="pill" href="#time">Time</a></li>
								</ul>
								<legend></legend>
								<div class="tab-content">
									<div id="course" class="tab-pane fade in active">
										<h3>Course</h3>
										<form method = "POST" action = "searchcourses.php">
											<div class="form-group">
												<label for="src_crs">Select a course:</label>
												<select class="form-control" id="src_crs" name = "src_crs">
												<?php for($i = 0; $i < sizeof($crs_src); $i++){ ?>
													<option value = "<?php echo $crs_src[$i]; ?>"><?php echo $crs_src[$i]; ?></option>
												<?php } ?>
												</select>
											</div>
											<hr/>
											<button class = "btn btn-block btn-success">Search by course</button>
										</form>
									</div>
									<div id="location" class="tab-pane fade">
										<h3>Location</h3>
										<form method = "POST" action = "searchcourses.php">
											<div class="form-group">
												<label for="src_crs">Select a location:</label>
												<select class="form-control" id="src_loc" name = "src_loc">
												<?php for($i = 0; $i < sizeof($loc_src); $i++){ ?>
													<option value = "<?php echo $loc_src[$i]; ?>"><?php echo $loc_src[$i]; ?></option>
												<?php } ?>
												</select>
											</div>
											<hr/>
											<button class = "btn btn-block btn-success">Search by location</button>
										</form>
									</div>
									<div id="date" class="tab-pane fade">
										<h3>Date</h3>
										<form method = "POST" action = "searchcourses.php">
											<div class="form-group">
												<label for="src_crs">Select a date:</label>
												<select class="form-control" id="src_dat" name = "src_dat">
												<?php for($i = 0; $i < sizeof($dat_src); $i++){ ?>
													<option value = "<?php echo $dat_src[$i]; ?>"><?php echo $dat_src[$i]; ?></option>
												<?php } ?>
												</select>
											</div>
											<hr/>
											<button class = "btn btn-block btn-success">Search by date</button>
										</form>
									</div>
									<div id="time" class="tab-pane fade">
										<h3>Time</h3>
										<form method = "POST" action = "searchcourses.php">
											<div class="form-group">
												<label for="src_crs">Select a start time:</label>
												<select class="select-picker form-control" id="src_tym" name = "src_tym">
												<?php for($i = 0; $i < sizeof($tym_src); $i++){ ?>
													<option value = "<?php echo $tym_src[$i]; ?>"><?php echo $tym_src[$i]; ?></option>
												<?php } ?>
												</select>
											</div>
											<hr/>
											<button class = "btn btn-block btn-success">Search by time</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>								
				</div>
			</div>
		</div>
		<?php
			include ('footer.php');
		?>
	</body>
</html>
	<?php }
	else{
		header('Location: index.php');		
	}