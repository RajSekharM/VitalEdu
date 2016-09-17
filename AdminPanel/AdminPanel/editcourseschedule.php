<?php
	error_reporting(0);
	require ('dbconn.php');
	session_start();
	if(isset($_SESSION['adminSession'])){
	if(isset($_GET['id'])){
	$course_id = $_GET['id'];
	$sql = "SELECT course_name, course_duration FROM course where course_id = '$course_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		while($info = mysqli_fetch_array($result)){
			$GLOBALS['course_name'] = $info['course_name'];
			$GLOBALS['course_duration'] = $info['course_duration'];
		}				
	}
	else{
		echo "Something went wrong!!!";
	}

	$sql = "SELECT tutor_id, tutor_name FROM tutor";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$tutor_id[] = $info['tutor_id'];												
			$tutor_name[] = $info['tutor_name'];
		}				
	}

	$sql = "SELECT location_id, location_name FROM location";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$location_id[] = $info['location_id'];												
			$location_name[] = $info['location_name'];
		}				
	}

	$sql = "SELECT time_id, time_name FROM timetable_time";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$time_id[] = $info['time_id'];												
			$time_name[] = $info['time_name'];
		}				
	}
	$sch = '1';
	$location = array();
	$tutor = array();
		$month = array();
	$day = array();
	$date = array();
	$start = array();
	$end = array();
	$seats = array();

	$sql = "SELECT course_name, course_timetable.location_id, location_name,course_timetable.tutor_id,tutor_name,
	course_timetable.month_id, month_name,course_timetable.day_id,day_name,course_timetable.date_id,date_name,
	course_timetable.starttime_id,st.time_name AS 'starttime',course_timetable.endtime_id,
	et.time_name AS 'endtime',avail_seats FROM course_timetable 
	JOIN course ON course.course_id = course_timetable.course_id AND course.course_id = '$course_id' 
	JOIN location ON location.location_id = course_timetable.location_id 
	JOIN tutor ON tutor.tutor_id = course_timetable.tutor_id 
	JOIN timetable_month ON timetable_month.month_id = course_timetable.month_id 
	JOIN timetable_day ON timetable_day.day_id = course_timetable.day_id 
	JOIN timetable_date ON timetable_date.date_id = course_timetable.date_id 
	JOIN timetable_time as st ON st.time_id = course_timetable.starttime_id 
	JOIN timetable_time as et ON et.time_id = course_timetable.endtime_id ORDER BY month_name,date_name";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$getlocid[] = $info['location_id'];
			$getloc[] = $info['location_name'];
			$gettutid[] = $info['tutor_id'];		
			$gettut[] = $info['tutor_name'];
			$getmonid[] = $info['month_id'];		
			$getmon[] = $info['month_name'];
			$getdayid[] = $info['day_id'];		
			$getday[] = $info['day_name'];		
			$getdateid[] = $info['date_id'];
			$getdate[] = $info['date_name'];
			$getstartid[] = $info['starttime_id'];		
			$getstart[] = $info['starttime'];
			$getendid[] = $info['endtime_id'];	
			$getend[] = $info['endtime'];												
			$getseats[] = $info['avail_seats'];
		}
	}else{
		$sch = '0';
	}
?>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<script>
			$(function () {
				$('.navbar-toggle-sidebar').click(function () {
					$('.navbar-nav').toggleClass('slide-in');
					$('.side-body').toggleClass('body-slide-in');
					$('#search').removeClass('in').addClass('collapse').slideUp(200);
				});

				$('#search-trigger').click(function () {
					$('.navbar-nav').removeClass('slide-in');
					$('.side-body').removeClass('body-slide-in');
					$('.search-input').focus();
				});
			});
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">MENU</button>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Admin Panel</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="http://rajsekharmasina.com/PROJECT%20FINAL/" target="_blank">Visit Site</a></li>
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class=""><a href="#">Settings</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>  	
		
		<div class="container-fluid main-container">
			<div class="col-md-2 sidebar">
				<div class="row">
					<!-- uncomment code for absolute positioning tweek see top comment in css -->
					<div class="absolute-wrapper"> </div>
					<!-- Menu -->
					<div class="side-menu">
						<nav class="navbar navbar-default" role="navigation">
							<!-- Main Menu -->
							<div class="side-menu-container">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>

									<!-- Dropdown-->
									<li class="panel panel-default" id="dropdown">
										<a data-toggle="collapse" href="#dropdown-lvl1"><span class="glyphicon glyphicon-book">
											</span> COURSES <span class="caret"></span>
										</a>

										<!-- Dropdown level 1 -->
										<div id="dropdown-lvl1" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav">
													<li><a href="courselist.php">ALL COURSES</a></li>
													<li><a href="courseschedule.php">COURSE SCHEDULE</a></li>
												</ul>
											</div>
										</div>
									</li>
									
									<li><a href="tutorlist.php"><span class="glyphicon glyphicon-user"></span> TUTORS</a></li>
				
									<li><a href="userlist.php"><span class="glyphicon glyphicon-user"></span> USERS </a></li>
									
									<li><a href="articlelist.php"><span class="glyphicon glyphicon-list"></span> BLOG</a></li>
									
									<li><a href="paypallist.php"><span class="glyphicon glyphicon-usd"></span>TRANSACTIONS</a></li>
	
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</div>
				</div>  		
			</div>
		
			<div class="col-md-10 content">
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<strong><big>COURSE SCHEDULE - <?php echo strtoupper($course_name); ?></big></strong>
					</div>
					<div class="panel-body table-responsive" style = "padding:0px">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>Location</th>
									<th>Tutor</th>
									<th>Date</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Seats</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							
						<?php if($sch!='0'){
							for($i = 0; $i < sizeof($getloc); $i++){ 
						?>
							<tr>
								<td><?php echo $getlocid[$i]." - ".$getloc[$i] ?></td>
								<td><?php echo $gettutid[$i]." - ".$gettut[$i] ?></td>
								<td><?php echo sprintf("%02s", $getdate[$i])."-".$getmonid[$i]. "-".date("Y") ?></td>
								<td><?php echo $getstart[$i]; ?></td>
								<td><?php echo $getend[$i]; ?></td>
								<td><?php echo $getseats[$i]; ?></td>
								<input type = "hidden" value = "<?php echo $getday[$i]; ?>"/>						
								<td class="text-center">
									<a type = "button" class = "btn btn-xs btn-danger" href = "deletecourseschedule.php?courseid=<?php echo $course_id; ?>&locid=<?php echo $getlocid[$i]; ?>&tutid=<?php echo $gettutid[$i]; ?>&monthid=<?php echo $getmonid[$i]; ?>&dayid=<?php echo $getdayid[$i]; ?>&dateid=<?php echo $getdateid[$i] ?>&stid=<?php echo $getstartid[$i] ?>&etid=<?php echo $getendid[$i] ?>&seats=<?php echo $getseats[$i] ?>"><span class = "glyphicon glyphicon-remove"></span> Del</a>
								</td>
							</tr>
						<?php }
							}else{
							echo "<tr><td colspan = '7'><h4 class = 'text-center'>No schedule created yet</h4></td></tr>";
							}
						?>
							
						</table>						
					</div>
				</div>
				
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<strong><big>ADD NEW SCHEDULE</big></strong>
				</div>
				
				<div class="panel-body table-responsive">
						
						<form method = "POST" action = "savecourseschedule.php" id = "form" style = "padding-left:5%;padding-right:5%">
						
                            <div class = "form-group">
								<label for="course_location" class="col-sm-3 control-label">Location</label>
                                <div class = "col-sm-9">
									<select class="form-control" id="course_location" name = "course_location" required>
										<option selected disabled>...</option>
											<?php for($i = 0;$i < sizeof($location_id); $i++){ ?>
												<option value="<?php echo $location_id[$i] ?>"><?php echo $location_id[$i] . " - " . $location_name[$i]; ?></option>
											<?php } ?>
									</select></br>
								</div>
                            </div>
		
                            <div class = "form-group">
								<label for="course_tutor" class="col-sm-3 control-label">Tutor</label>
                                <div class = "col-sm-9">
									<select class="form-control" id="course_tutor" name = "course_tutor">
										<option selected disabled>...</option>
										<?php for($i = 0;$i < sizeof($tutor_id); $i++){ ?>
											<option value="<?php echo $tutor_id[$i] ?>"><?php echo $tutor_id[$i] . " - " . $tutor_name[$i]; ?></option>
										<?php } ?>
									</select></br>
								</div>
                            </div>
							
                            <div class = "form-group">
								<label for="course_date" class="col-sm-3 control-label">Date</label>
								<div class=" col-sm-9" >
									<input type='date' class="form-control" id="course_date" name = "course_date"/><br/>
								</div>
                            </div>							
							
							<div class = "form-group">
								<label for="course_start" class="col-sm-3 control-label">Start Time</label>
                                <div class = "col-sm-9">
									<select class="form-control" id="course_start" name = "course_start">
										<option selected disabled>...</option>
										<?php for($i = 0;$i < sizeof($time_id); $i++){ ?>
												<option value="<?php echo $time_id[$i] ?>"><?php echo $time_name[$i]; ?></option>
										<?php } ?>
									</select></br>
								</div>
                            </div>
							
							<div class = "form-group">
								<label for="course_end" class="col-sm-3 control-label">End Time</label>
                                <div class = "col-sm-9">
									<select class="form-control" id="course_end" name = "course_end">
										<option selected disabled>...</option>
											<?php for($i = 0;$i < sizeof($time_id); $i++){ ?>
												<option value="<?php echo $time_id[$i] ?>"><?php echo $time_name[$i]; ?></option>
											<?php } ?>
									</select></br>
								</div>
                            </div>
							
							<div class = "form-group">
								<label for="course_seats" class="col-sm-3 control-label">Seats</label>
                                <div class = "col-sm-9">
									<input type='number' class="form-control" id = "course_seats" name = "course_seats"/><br/>
								</div>
                            </div>
							<input type = "hidden" value = "<?php echo $course_id; ?>" name = "course_id"/>
							<div class="form-group last">
								<div class="col-sm-12 text-center">
									<button type="submit" name="submit" class="btn btn-success"> Save </button>
									<button type="button" onclick = "history.go(-1);" class="btn btn-warning">Cancel</button>
								</div>
							</div>							
						</form>
						
					</div>
				
				
				
				
				
			</div>
			<footer class="pull-left footer">
				<p class="col-md-12">
					<hr class="divider">
					Copyright &COPY; 2015 <a href="#">VITAL EDUCATION</a>
				</p>
			</footer>
		</div>
	</body>
</html>
	<?php }
	else{
		header('Location: courseschedule.php');
	}
	}
	else{
		header('Location: login.php');
	}
	?>