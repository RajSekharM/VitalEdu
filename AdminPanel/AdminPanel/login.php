<?php
	error_reporting(0);
	require ('dbconn.php');
	
	if(!isset($_POST['submit'])) {
	
?>
<html lang = "en">
	<head>
		<title>Login</title>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>		
	</head>

	<body>
		<div class="container text-center">
			<div class="row" style = "padding:10%">
			<div class = "col-sm-3">
			</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading"> 
							<strong class="">Login</strong>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method = "POST" action = "">
								<div class="form-group">
									<label for="uname" class="col-sm-3 control-label">Username</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="uname" name = "username" placeholder="Enter username" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="inputPassword3" name = "password" placeholder="Password" required="">
									</div>
								</div>
								<div class="form-group last">
									<div class="col-sm-12">
										<button type="submit" name="submit" class="btn btn-success btn-sm">Sign in</button>
										<button type="reset" class="btn btn-default btn-sm">Reset</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			<div class = "col-sm-3">
			</div>
			</div>
		</div>
	</body>
</html>
<?php
} else {
	require ('dbconn.php');
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	if($username == "admin" && $password == "admin"){
	session_start();
	$_SESSION['adminSession']=$username;
		echo "<script>alert('Log In successful')
		window.location.href='index.php'
		</script>";		
	}
	else {	
		echo "<script>alert('Invalid username or password. Try again!')
		window.location.href='login.php'
		</script>";
	}
} 
?>