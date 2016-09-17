<?php
	error_reporting(0);
	require ('dbconn.php');
	session_start();
	if(isset($_SESSION['adminSession'])){
		if(isset($_GET['id'])){
		$course_id = $_GET['id'];
	
		$sql = "SELECT * FROM course WHERE course_id = '$course_id'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while($info = mysqli_fetch_array($result)){
				$course_name = $info['course_name'];
				$course_overview = $info['course_overview'];
				$course_desc = $info['course_desc'];
				$course_price = $info['course_price'];
				$course_duration = $info['course_duration'];
				$course_image = $info['course_image'];
				$course_prerequisite = $info['course_prerequisite'];		
				$course_content = $info['course_content'];
				$course_certification = $info['course_certification'];
				$course_support = $info['course_support'];		
				$course_status = $info['course_status'];				
			}				
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
						<strong><big>UPDATE A COURSE</big></strong>
					</div>
					<div class="panel-body table-responsive">
						
						<form action = "saveupdatedcourse.php" method = "POST" id = "form" style = "padding-left:5%;padding-right:5%">

                            <div class = "form-group">
                                <label for="course_id" class="col-sm-3 control-label">Course ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="course_id" name = "course_id" value = <?php echo $course_id; ?> required><br/>		
                                </div>
                            </div>
						
                            <div class = "form-group">
                                <label for="course_name" class="col-sm-3 control-label">Course Name</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="course_name" name = "course_name" cols = "1"required><?php echo $course_name; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_overview" class="col-sm-3 control-label">Course Overview</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_overview" name = "course_overview" required/><?php echo $course_overview; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_desc" class="col-sm-3 control-label">Course Description</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_desc" name = "course_desc" required/><?php echo $course_desc; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_price" class="col-sm-3 control-label">Course Price</label>
                                <div class = "col-sm-9">
                                    <input type = "number" class = "form-control" id = "course_price" name = "course_price" value = <?php echo $course_price; ?> required/><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_duration" class="col-sm-3 control-label">Course Duration</label>
                                <div class = "col-sm-9">
                                    <input type = "number" class = "form-control" id = "course_duration" name = "course_duration" value = <?php echo $course_duration; ?> required/><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_image" class="col-sm-3 control-label">Course Image</label>
                                <div class = "col-sm-9">
                                    <input type = "text" class = "form-control" id = "course_image" name = "course_image"  value = <?php echo $course_image; ?>/><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_prerequisite" class="col-sm-3 control-label">Course Prerequisite</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_prerequisite" name = "course_prerequisite"/><?php echo $course_prerequisite; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_content" class="col-sm-3 control-label">Course Content</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_content" name = "course_content"/><?php echo $course_content; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_certification" class="col-sm-3 control-label">Course Certification</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_certification" name = "course_certification"/><?php echo $course_certification; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for="course_support" class="col-sm-3 control-label">Course Support</label>
                                <div class = "col-sm-9">
                                    <textarea class = "form-control" id = "course_support" name = "course_support"/><?php echo $course_support; ?></textarea><br/>
                                </div>
                            </div>

                            <div class = "form-group">
								<label for="course_status" class="col-sm-3 control-label">Course Status</label>
                                <div class = "col-sm-9">
									<select class="form-control" id="course_status" name = "course_status">
										<option value = "Show" <?php if(strtolower($course_status) == strtolower("Show")) echo "selected"; ?> >Show</option>
										<option value = "Hide" <?php if(strtolower($course_status)==strtolower("Hide")) echo "selected"; ?> >Hide</option>
									</select></br>
								</div>
                            </div>
							
							<div class="form-group last">
								<div class="col-sm-12 text-center">
									<button type="submit" name="preview" class="btn btn-info" formaction="previewcourse.php" formtarget="_blank">Preview</button>
									<button type="submit" name="submit" class="btn btn-success"> Save </button>
									<button type="button" onclick = "history.go(-1);" class="btn btn-warning">Cancel</button>
								</div>
							</div>							

						</form>
						
					</div>
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
		header('Location: courselist.php');		
	}
	}
	else{
		header('Location: login.php');		
	}
	?>