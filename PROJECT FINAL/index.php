<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
$sql = "SELECT slide1, slide2, slide3, slide4, student1_name, student1_review, student2_name, student2_review, student3_name, student3_review FROM homepage";
$result = mysqli_query($conn, $sql);
while($info = mysqli_fetch_array($result)){
	$GLOBALS['slide1'] = $info['slide1'];
	$GLOBALS['slide2'] = $info['slide2'];
	$GLOBALS['slide3'] = $info['slide3'];
	$GLOBALS['slide4'] = $info['slide4'];
	$GLOBALS['student1_name'] = $info['student1_name']; 
	$GLOBALS['student1_review'] = $info['student1_review']; 
	$GLOBALS['student2_name'] = $info['student2_name']; 
	$GLOBALS['student2_review'] = $info['student2_review']; 
	$GLOBALS['student3_name'] = $info['student3_name']; 
	$GLOBALS['student3_review'] = $info['student3_review']; 
	
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
	<title>VITAL EDUCATION</title>
	</head>
<body>
	<!--Carousel-->
	<div id = "myCarousel" class = "carousel slide" data-ride = "carousel">
		<!--Indicators-->
		<ol class = "carousel-indicators">
			<li data-target = "#myCarousel" data-slide-to = "0" class = "active"></li>
			<li data-target = "#myCarousel" data-slide-to = "1"></li>
			<li data-target = "#myCarousel" data-slide-to = "2"></li>
			<li data-target = "#myCarousel" data-slide-to = "3"></li>
		</ol>
		
		<div class = "carousel-inner" role = "listbox">
				<div class = "item active">
					<img src = " <?php echo $slide1 ?> " alt = "img1">
					<div class="carousel-caption hidden-xs">
						<h1 style = "background: rgba(0, 0, 0, 0.3);">Australia's Leader in annovative First Aid Solutions</h1></br/></br/><br/><br/>
					</div>					
				</div>
				<div class = "item">
					<img src = " <?php echo $slide2 ?> " alt = "img2">
					<div class="carousel-caption hidden-xs">
						<h1 style = "background: rgba(0, 0, 0, 0.3);"><strong>Price Guarenteed</strong></h1>
						<h3 style = "background: rgba(0, 0, 0, 0.3);">We will not be beaten on price. Find a lower price elsewhere?
						Simply call our customer service.</h3><br/><br/>						
					</div>					
				</div>
				<div class = "item">
					<img src = " <?php echo $slide3 ?> " alt = "img3">
					<div class="carousel-caption hidden-xs">
						<h1 style = "background: rgba(0, 0, 0, 0.3);">Highly Experienced Trainers</h1><br/><br/>						
					</div>					
				</div>				
				<div class = "item">
					<img src = " <?php echo $slide4 ?> " alt = "img4">
					<div class="carousel-caption hidden-xs">
						<h1 style = "background: rgba(0, 0, 0, 0.3);">First Aid saves Lives</h1><br/><br/>
					</div>					
				</div>
				
			<?php
				}
			?>					
			
			<!--Left and Right Controls-->
			<a class = "left carousel-control" href = "#myCarousel" role = "button" data-slide = "prev">
				<span class = "glyphicon glyphicon-chevron-left" aria-hidden = "true"></span>
				<span class = "sr-only">Previous</span>
			</a>
			<a class = "right carousel-control" href = "#myCarousel" role = "button" data-slide = "next">
				<span class = "glyphicon glyphicon-chevron-right" aria-hidden = "true"></span>
				<span class = "sr-only">Next</span>
			</a>
		</div>
	</div>
	<!--Carousel End-->

	<div class = "container-fluid" id = "course_container">
		<div class = "container">
			<h2 class = "cont_head">Our Popular Courses</h2>
			<div class = "row">
		
				<?php
					$sql = "SELECT course_id, course_name, course_overview, course_price, course_image FROM course WHERE course_status = 'show' LIMIT 0,3";
					$result = mysqli_query($conn, $sql);
					while($info = mysqli_fetch_array($result)){
						$course_id = $info['course_id'];
						$course_name = $info['course_name'];
						$course_overview = $info['course_overview'];
						$course_price = $info['course_price'];
						$course_image = $info['course_image'];
				?>
						<div class = "col-md-4">
							<div class="panel panel-info box-shadow--4dp">
								<div class="panel-heading">
									<h3 class="panel-title"> <?php echo $course_name ?></h3>
								</div>
								<div class="panel-body panel_bodies" style="min-height: 220px;">
									<img class="img-rounded img-responsive thumbs" src = "<?php echo $course_image ?>" alt = "<?php $course_name ?>" />
									<p> <?php echo $course_overview ?></p>
								</div>
								<div class="panel-footer">
									<strong>$<?php echo $course_price ?> AUD</strong>
									<a href="course.php?id=<?php echo $course_id ?>" class="btn btn-info btn-xs pull-right" role="button">Book Now</a>
									
								</div>
							</div>
						</div>
				<?php
					}
				?>								
			</div>
			
			<div class = "row">
				<?php
					$sql = "SELECT course_id, course_name, course_overview, course_price, course_image FROM course WHERE course_status = 'show' LIMIT 3,3";
					$result = mysqli_query($conn, $sql);
					while($info = mysqli_fetch_array($result)){
						$course_id = $info['course_id'];
						$course_name = $info['course_name'];
						$course_overview = $info['course_overview'];
						$course_price = $info['course_price'];
						$course_image = $info['course_image'];
				?>
					<div class = "col-md-4">
						<div class="panel panel-info box-shadow--4dp">
							<div class="panel-heading">
								<h3 class="panel-title"> <?php echo $course_name ?></h3>
							</div>
							<div class="panel-body panel_bodies" style="min-height: 220px;">
								<img class="img-rounded img-responsive thumbs" src = "<?php echo $course_image ?>" alt = "<?php $course_name ?>" />
								<p> <?php echo $course_overview ?></p>
							</div>
							<div class="panel-footer">
								<strong>$<?php echo $course_price ?> AUD</strong>
								<a href="course.php?id=<?php echo $course_id ?>" class="btn btn-info btn-xs pull-right" role="button">Book Now</a>
							</div>
						</div>
					</div>
				<?php	
					}
				?>								
			</div>
		</div>
	</div>
	
	<div class = "container-fluid info_container">
		<div class = "container info_cont">
			<h2 class = "cont_head">Australia Wide First Aid</h2>
			<h4>Do you know what to do in an emergency? Is there at least one person in your home with CPR or first aid knowledge? Could you confidently give CPR or care for an injured person until help arrives?</h4>
			<div class = "row">
				<div class = "col-md-6" align = "left">
					<p class="text-muted pinfo">As Australia’s leader in innovative first aid solutions, Australia Wide First Aid prides itself on providing simple, streamlined first aid training solutions. The one-day Provide First Aid course, will equip you with necessary first aid knowledge, skills and reference materials, in addition to a nationally recognised statement of attainment.</p>
					<p class="text-muted pinfo">First aid training is highly valued by employers and in many cases, is a requirement for employment within Australia. Australia Wide First Aid conducts courses seven days a week (locations specific), at a range of times to ensure optimum convenience for those looking to complete a course. Same day certificates are provided, as long as payment has been received prior to course commencement.</p>
				</div>
				<div class = "col-md-6" align = "left">
					<p class="text-muted pinfo">Australia Wide First Aid delivers the HLTAID003 Provide First Aid course and HLTAID004 Provide Emergency First Aid Response in an Education and Care Setting in one day. All course participants will receive access to our first aid manual upon booking, to ensure up-to-date information is immediately available to you, and prior to commencement of course. Australia Wide First Aid also provides access to our renewal program, ensuring your or your employee first aid certification is always up to date and doesn’t slip through the cracks.</p>
					<p class="text-muted pinfo">If your workplace requires training for numerous employees, Australia Wide First Aid trainers can come to you. Australia Wide First Aid’s Group Booking service allows employees to maintain current certification with minimal interruption to business activity. Complete our Group Booking Enquiry Form or call our friendly staff on 1300 336 613 between 8:00am – 6:00pm(EST) to secure your booking.</p>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class = "container-fluid cust_container">
		<div class="container">
			<h2 class = "cont_head">What our Customers say</h2>
			<div class = "col-md-6">
				<div class="panel-group" id="accordion">
					
					<div class="panel panel-default box-shadow--4dp">
						<div class="panel-heading panel_heads">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><?php echo $student1_name ?></a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body panel_bodies">
								<div class = "col-sm-4">
									<img class = "img-thumbnail" src = "http://placehold.it/145x145"/>
								</div>
								<div class = "col-sm-8">
									<?php echo $student1_review ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="panel panel-default box-shadow--4dp">
						<div class="panel-heading panel_heads">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><?php echo $student2_name ?></a>
							</h4>
						</div>
						<div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body panel_bodies">
								<div class = "col-sm-4">
									<img class = "img-thumbnail" src = "http://placehold.it/145x145"/>
								</div>
								<div class = "col-sm-8">
									<?php echo $student2_review ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="panel panel-default box-shadow--4dp">
						<div class="panel-heading panel_heads">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><?php echo $student3_name ?></a>
							</h4>
						</div>
						<div id="collapse3" class="panel-collapse collapse">
							<div class="panel-body panel_bodies">
								<div class = "col-sm-4">
									<img class = "img-thumbnail" src = "http://placehold.it/145x145"/>
								</div>
								<div class = "col-sm-8">
									<?php echo $student3_review ?>
								</div>
							</div>
						</div>
					</div>
					
				</div> 		
			</div>
			<div class = "col-md-6">
			<div class = "embed-responsive embed-responsive-16by9">
				<iframe class = "embed-responsive-item box-shadow--4dp" width="550" height="220" style = "border:2px groove" src="https://www.youtube.com/embed/5rKPYLuzneo?list=PL2NB6xU6zt0Zh25eZoGM1iFmCBfKZwl4e" frameborder="0" allowfullscreen></iframe>
			</div>
			</div>
		</div>
	</div>
	
<?php
	include ('footer.php');
?>
	</body>
	</html>