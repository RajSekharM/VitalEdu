 <?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	if(!isset($_POST['submit'])) {
	
?>
<html lang = "en">
	<head>
		<title>Login</title>
	</head>

	<body>
		<div class="container">
			<div class="row" style = "padding:10%">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading"> 
							<strong class="">Login</strong>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method = "POST" action = "">
								<div class="form-group">
									<label for="uid" class="col-sm-3 control-label">User ID</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="uid" name = "userid" placeholder="Enter user id" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="inputPassword3" name = "password" placeholder="Password" required="">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<div class="checkbox">
											<label class="">
											<input type="checkbox" class="">Remember me</label>
										</div>
									</div>
								</div>
								<div class="form-group last">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" name="submit" class="btn btn-success btn-sm">Sign in</button>
										<button type="reset" class="btn btn-default btn-sm">Reset</button>
									</div>
								</div>
							</form>
						</div>
						<div class="panel-footer">Not Registered? <a href="register.php" class="">Register here</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
				</div>
			</div>
		</div>
		<hr/>
		<?php
			include ('footer.php');
		?>
	</body>
</html>
<?php
} else {
	require ('dbconn.php');
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$query = "SELECT student_id,student_firstname,student_password FROM student WHERE student_id='$userid' AND student_password='$password'";
	$run_query = mysqli_query($conn, $query);
	$row = mysqli_num_rows($run_query);
	if($row == 1){
		$_SESSION['userSession']=$userid;
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