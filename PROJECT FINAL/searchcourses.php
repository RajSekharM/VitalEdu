<?php 
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
?>
		<?php 
			if(isset($_POST['src_crs'])){
				$course_name = $_POST['src_crs'];

				$sql = "SELECT course_name, location_name,tutor_name,month_name,day_name,date_name,
						st.time_name AS 'starttime', et.time_name AS 'endtime',avail_seats FROM course_timetable 
						JOIN course ON course.course_id = course_timetable.course_id AND course.course_name = '$course_name'
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
				
				$sql = "SELECT course_id FROM course WHERE course_name = '$course_name'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) == 1){
					while($info = mysqli_fetch_array($result)){
						$course_id = $info['course_id'];
					}
				}

				?>
				<html>
					<head>
						<title>Search</title>
					</head>
					<body>
					<br/><br/>
						<div class = "container" style = "padding-top:5%; padding-bottom:20%;">
							<legend>SEARCH RESULTS FOR <strong><?php echo strtoupper($course_name); ?></strong></legend>							
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
												<a href = "course.php?id=<?php echo $course_id; ?>"><button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit">FIND MORE</button></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
							include ('footer.php');
						?>
					</body>
				</html>
				<?php
			}

			if(isset($_POST['src_loc'])){
			$location_name = $_POST['src_loc'];

				$sql = "SELECT course_name, location_name,tutor_name,month_name,day_name,date_name,
						st.time_name AS 'starttime', et.time_name AS 'endtime',avail_seats FROM course_timetable 
						JOIN course ON course.course_id = course_timetable.course_id
						JOIN location ON location.location_id = course_timetable.location_id AND location.location_name = '$location_name'
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
						$course[] = $info['course_name'];
						$tutor[] = $info['tutor_name'];			
						$month[] = $info['month_name'];	
						$day[] = $info['day_name'];		
						$date[] = $info['date_name'];	
						$start[] = $info['starttime'];												
						$end[] = $info['endtime'];												
						$seats[] = $info['avail_seats'];
					}
				}
				
				$sql = "SELECT location_id FROM location WHERE location_name = '$location_name'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) == 1){
					while($info = mysqli_fetch_array($result)){
						$location_id = $info['location_id'];

					}
				}

				$sql = "SELECT course_id FROM course_timetable WHERE location_id = '$location_id'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while($info = mysqli_fetch_array($result)){
						$c_id[] = $info['course_id'];
					}
				}

				?>
				<html>
					<head>
						<title>Search</title>
					</head>
					<body>
					<br/><br/>
						<div class = "container" style = "padding-top:5%;padding-bottom:20%;">
						<legend>SEARCH RESULTS FOR <strong><?php echo strtoupper($location_name); ?></strong></legend>
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
												<div><h3 style = "margin: 2%;"><?php echo " ".$course[$i]; ?></h3></div>
												<div><span class = "glyphicon glyphicon-time hidden-xs"></span><?php echo " ". $start[$i] ." - ". $end[$i]; ?></div>
											</td>
											
											<td>
												<div><h4 style = "margin-top: 8%;margin-bottom: 0%;"><strong><?php echo $seats[$i]?></strong></h4></div>
												<div><p class = "text-muted">seats available</p></div>												
											</td>
											
											<td>
												<a href = "course.php?id=<?php echo $c_id[$i]; ?>"><button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit">FIND MORE</button></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
							include ('footer.php');
						?>
					</body>
				</html>
				<?php
			}

			if(isset($_POST['src_dat'])){
				$dat = $_POST['src_dat'];				
				list($date_name, $month_name) = explode('/', $dat);
				
				$sql = "SELECT course_name, location_name,tutor_name,month_name,day_name,date_name,
						st.time_name AS 'starttime', et.time_name AS 'endtime',avail_seats FROM course_timetable 
						JOIN course ON course.course_id = course_timetable.course_id
						JOIN location ON location.location_id = course_timetable.location_id
						JOIN tutor ON tutor.tutor_id = course_timetable.tutor_id
						JOIN timetable_month ON timetable_month.month_id = course_timetable.month_id AND timetable_month.month_name = '$month_name'
						AND timetable_month.month_id >= MONTH(NOW())
						JOIN timetable_day ON timetable_day.day_id = course_timetable.day_id
						JOIN timetable_date ON timetable_date.date_id = course_timetable.date_id AND timetable_date.date_name = '$date_name'
						JOIN timetable_time as st ON st.time_id = course_timetable.starttime_id
						JOIN timetable_time as et ON et.time_id = course_timetable.endtime_id
						ORDER BY month_name DESC, date_name ASC";
						
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while($info = mysqli_fetch_array($result)){
						$course[] = $info['course_name'];
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
				
				$sql = "SELECT date_id FROM timetable_date WHERE date_name = '$date_name'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) == 1){
					while($info = mysqli_fetch_array($result)){
						$date_id = $info['date_id'];
					}
				}
				
				$sql = "SELECT month_id FROM timetable_month WHERE month_name = '$month_name'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) == 1){
					while($info = mysqli_fetch_array($result)){
						$month_id = $info['month_id'];
					}
				}

				$sql = "SELECT course_id FROM course_timetable WHERE date_id = '$date_id' AND month_id = '$month_id'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while($info = mysqli_fetch_array($result)){
						$c_id[] = $info['course_id'];
					}
				}

				?>
				<html>
					<head>
						<title>Search</title>
					</head>
					<body>
					<br/><br/>
						<div class = "container" style = "padding-top:5%;padding-bottom:20%;">
						<legend>SEARCH RESULTS FOR <strong><?php echo strtoupper($dat); ?></strong></legend>
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
												<div><h3 style = "margin-top: 2%"><?php echo " ".$course[$i]; ?></h3></div>
												<div><span class = "glyphicon glyphicon-time hidden-xs"></span><?php echo " ". $start[$i] ." - ". $end[$i]; ?></div>
											</td>
											
											<td>
												<div><h3 style = "margin: 2%;"><span class = "glyphicon glyphicon-map-marker hidden-xs" style = "font-size:70%"; ></span><?php echo " ".$location[$i]; ?></h3></div>
												<div><p style = "margin-top: 0%;margin-bottom: 0%;"><strong><?php echo $seats[$i]?></strong><span class = "text-muted"> seats available</span></p></div>
											</td>
											
											<td>
												<a href = "course.php?id=<?php echo $c_id[$i]; ?>"><button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit">FIND MORE</button></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
							include ('footer.php');
						?>
					</body>
				</html>
				<?php
			}

			if(isset($_POST['src_tym'])){
							$time_name = $_POST['src_tym'];

				$sql = "SELECT course_name, location_name,tutor_name,month_name,day_name,date_name,
						st.time_name AS 'starttime', et.time_name AS 'endtime',avail_seats FROM course_timetable 
						JOIN course ON course.course_id = course_timetable.course_id
						JOIN location ON location.location_id = course_timetable.location_id
						JOIN tutor ON tutor.tutor_id = course_timetable.tutor_id
						JOIN timetable_month ON timetable_month.month_id = course_timetable.month_id AND timetable_month.month_id >= MONTH(NOW())
						JOIN timetable_day ON timetable_day.day_id = course_timetable.day_id
						JOIN timetable_date ON timetable_date.date_id = course_timetable.date_id
						JOIN timetable_time as st ON st.time_id = course_timetable.starttime_id AND st.time_name = '$time_name'
						JOIN timetable_time as et ON et.time_id = course_timetable.endtime_id
						ORDER BY month_name DESC, date_name ASC";
						
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while($info = mysqli_fetch_array($result)){
						$course[] = $info['course_name'];
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
				
				$sql = "SELECT time_id FROM timetable_time WHERE time_name = '$time_name'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) == 1){
					while($info = mysqli_fetch_array($result)){
						$time_id = $info['time_id'];
					}
				}

				$sql = "SELECT course_id FROM course_timetable WHERE starttime_id = '$time_id'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while($info = mysqli_fetch_array($result)){
						$c_id[] = $info['course_id'];
					}
				}

				?>
				<html>
					<head>
						<title>Search</title>
					</head>
					<body>
					<br/><br/>
						<div class = "container" style = "padding-top:5%;padding-bottom:20%;">
						<legend>SEARCH RESULTS FOR <strong><?php echo strtoupper($time_name); ?></strong></legend>
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
												<div><h3 style = "margin-top: 2%"><?php echo " ".$course[$i]; ?></h3></div>
												<div><span class = "glyphicon glyphicon-time hidden-xs"></span><?php echo " ". $start[$i] ." - ". $end[$i]; ?></div>
											</td>
											
											<td>
												<div><h3 style = "margin: 2%;"><span class = "glyphicon glyphicon-map-marker hidden-xs" style = "font-size:70%"; ></span><?php echo " ".$location[$i]; ?></h3></div>
												<div><p style = "margin-top: 0%;margin-bottom: 0%;"><strong><?php echo $seats[$i]?></strong><span class = "text-muted"> seats available</span></p></div>
											</td>
											
											<td>
												<a href = "course.php?id=<?php echo $c_id[$i]; ?>"><button style = "transform:translateY(50%);" class = "btn btn-success btn-responsive" type = "submit">FIND MORE</button></a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
							include ('footer.php');
						?>
					</body>
				</html>
				<?php
			}
		?>