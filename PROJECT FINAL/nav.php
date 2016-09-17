<!DOCTYPE HTML>
<?php
	error_reporting(0);
	require ('dbconn.php');
	session_start();
	
?>
<html lang = "en">
<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">
				<img href = "index.php" class = "img-responsive" src="http://placehold.it/350x100"></img>
			</div>
			
			<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 pull-right" id = "head_links">
					<?php 
					if(isset($_SESSION['userSession'])){
					?>
					<form method = "POST" action = "myprofile.php">
						<div class="btn-group"  style = "transform:translateY(25%);">
							<input type = "hidden" value = "<?php echo $_SESSION['userSession']; ?>" name = "s_id"/>
							<button type="submit" class="btn btn-default btn-xs">
							<?php echo $_SESSION['userSession']; ?>
							</button>
							<button type="button" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li style = "padding:0%;margin:0%"><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</form>
						
						
					<?php	
					}
					else{
					?>
					<ul class = "list-inline text-muted"  style = "transform:translateY(25%);">
						<li><a class = "text-muted" href = "login.php">LOGIN</a></li> |
						<li><a class = "text-muted" href = "register.php">REGISTER</a></li>
					</ul>
					<?php } ?>
			</div>
		</div>
	</div>

	<nav class = "navbar navbar-default navbar-static-top"  data-spy="affix" data-offset-top="100" role = "navigation">
		<div class = "container">
			<div class = "navbar-header">
				<button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#myNavbar">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<a class = "navbar-brand hidden-sm hidden-md" href = "index.php">VITAL EDUCATION</a>
			</div>
			
			<div class = "collapse navbar-collapse" id = "myNavbar">
				<ul class = "nav navbar-nav">
					<li><a href = "index.php">Home</a></li>
					<li class = "dropdown">
						<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#">Courses<span class = "caret"/></a>
						<ul class = "dropdown-menu">
							<?php
								$sql = "SELECT course_id, course_name FROM course WHERE course_status = 'show'";
								$result = mysqli_query($conn, $sql);
								while($info = mysqli_fetch_array($result)){
									$course_id = $info['course_id'];												
									$course_name = $info['course_name'];			
									echo "<li><a href = 'course.php?id=".$course_id."'>" .$course_name. "</a></li>";
								}
							?>			
						</ul>
					</li>
					
					<li class = "dropdown">
						<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#">Locations<span class = "caret"/></a>
						<ul class = "dropdown-menu">
							<?php
								$sql = "SELECT location_id, location_name FROM location";
								$result = mysqli_query($conn, $sql);
								while($info = mysqli_fetch_array($result)){
									$location_id = $info['location_id'];												
									$location_name = $info['location_name'];			
									echo "<li><a href = 'location.php#".$location_id."'>" .$location_name. "</a></li>";
								}
							?>				
						</ul>
					</li>
					<li><a href = "blog.php">Blog</a></li>
					<li><a href = "about-us.php">About Us</a></li>
					<li><a href = "faq.php">FAQ</a></li>
					<li><a href = "contact-us.php">Contact Us</a></li>
				</ul>	
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class = "hidden-sm" id = "phn_num"><span class="glyphicon glyphicon-earphone"></span> +61 412345678</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
</body>
</html>