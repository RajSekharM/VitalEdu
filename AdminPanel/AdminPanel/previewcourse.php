<?php
	error_reporting(0);
	require ('dbconn.php');

	require ('nav.php');
	
	$required = array('course_id', 'course_name', 'course_overview', 'course_desc', 'course_price', 'course_duration', 'course_image', 'course_prerequisite', 'course_content', 'course_certification', 'course_support');
	
	$error = false;
	foreach($required as $field) {
		if (!isset($_POST[$field])) {
			$error = true;
		}
	}
	
	if ($error) {
		echo "Data missing!!";
	} else {
	}
	
	$course_id = $_POST['course_id'];												
	$course_name = $_POST['course_name'];
	$course_overview = $_POST['course_overview'];
	$course_desc = $_POST['course_desc'];
	$course_price = $_POST['course_price'];
	$course_duration = $_POST['course_duration'];
	$course_image = $_POST['course_image'];
	$course_prerequisite = $_POST['course_prerequisite'];		
	$course_content = $_POST['course_content'];
	$course_certification = $_POST['course_certification'];
	$course_support = $_POST['course_support'];		
/*	
	$location = array();
	$tutor = array();
	$month = array();
	$day = array();
	$date = array();
	$start = array();
	$end = array();
	$seats = array();
	
$sql = "SELECT course_name, location_name,tutor_name,month_name,day_name,date_name,st.time_name AS 'starttime',et.time_name AS 'endtime',avail_seats FROM course_timetable 
JOIN course ON course.course_id = course_timetable.course_id AND course.course_id = '$id'
JOIN location ON location.location_id = course_timetable.location_id
JOIN tutor ON tutor.tutor_id = course_timetable.tutor_id
JOIN timetable_month ON timetable_month.month_id = course_timetable.month_id
JOIN timetable_day ON timetable_day.day_id = course_timetable.day_id
JOIN timetable_date ON timetable_date.date_id = course_timetable.date_id
JOIN timetable_time as st ON st.time_id = course_timetable.starttime_id
JOIN timetable_time as et ON et.time_id = course_timetable.endtime_id
ORDER BY month_name,date_name";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
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
	*/
?>

<html lang = "en">
	<head><title><?php echo $course_name; ?></title>
	</head>
	<body style = "line-height:200%" >
		<img src = "../images/others/course_header.jpg" alt = "<?php echo $course_name; ?>" width  ="100%"/>	

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
									<?php for($i = 0; $i < 2; $i++){ ?>
										<tr align = "center" style = "border-left:7px solid; border-color:#555;">
											<td>
												<div>Month</div>
												<div><h3 style = "margin: 0%;"><strong>Date</strong></h3></div>
												<div>Day</div>
											</td>
										
											<td>
												<div><h3 style = "margin: 2%;"><span class = "glyphicon glyphicon-map-marker hidden-xs" style = "font-size:70%"; ></span>LOCATION</h3></div>
												<div><span class = "glyphicon glyphicon-time hidden-xs"></span>START - END</div>
											</td>
											
											<td>
												<div><h4 style = "margin-top: 8%;margin-bottom: 0%;"><strong>100</strong></h4></div>
												<div><p class = "text-muted">seats available</p></div>												
											</td>
											
											<td>
												<button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit">$100 AUD</button>
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
			
				<div class="col-md-4 column">
				<br/>
					<div class="panel panel-success">
						<div class="panel-heading">Available Dates</div>
						
						<select size = "5" class="form-control col-lg-12 col-md-12 col-sm-4 col-xs-12">
							<?php for($i = 0; $i < sizeof($day); $i++){ ?>
								<option><?php echo $day[$i] ." - ". $start[$i] ." TO ". $end[$i]; ?></option>
							<?php } ?>
						</select>
					
					
						<form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
							<input type="hidden" name="cmd" value="_xclick" />
							<input type="hidden" name="no_note" value="1" />
							<input type="hidden" name="lc" value="AU" />
							<input type="hidden" name="currency_code" value="AUD" />
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
							<input type="hidden" name="first_name" value="Customer's First Name" />
							<input type="hidden" name="last_name" value="Customer's Last Name" />
							<input type="hidden" name="payer_email" value="customer@example.com" />
							<input type="hidden" name="item_number" value="123456" / >
							<input class = "btn btn-success btn-block" type="submit" name="submit" value="BOOK COURSE"/>
						</form>
					
					
					
					
					</div>								
				</div>
			</div>
		</div>
		<?php
			include ('footer.php');
		?>
	</body>
</html>