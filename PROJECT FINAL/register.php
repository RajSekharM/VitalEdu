 <?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	if(!isset($_POST['submit'])) {
	
?>
<html lang = "en">
	<head>
		<title>Register</title>

			<script>
			function checkPass()
			{
				var password = document.getElementById('password');
				var confirmPassword = document.getElementById('confirmPassword');
				var goodColor = "#abf1c0";
				var badColor = "#ffb2b2";
				if(password.value == confirmPassword.value){
					confirmPassword.style.backgroundColor = goodColor;
					message.style.color = goodColor;
					message.innerHTML = "Passwords Match!"
					}else{
					confirmPassword.style.backgroundColor = badColor;
				}
			}  
		</script>
	</head>

	<body>
		<div class="container">
			<div class="row" style = "padding:3%">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading"> 
							<strong class="">Register</strong>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method = "POST" action = "">
								<div class="form-group">
									<label for="fname" class="col-sm-4 control-label">First Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="fname" name = "fname" placeholder="First name" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="lname" class="col-sm-4 control-label">Last Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="lname" name = "lname" placeholder="Last name" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-4 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="password" name = "password" placeholder="Password" title="Password must contain at least 8 characters, including UPPER/lowercase and numbers." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
									</div>
								</div>
								<div class="form-group">
									<label for="confirmPassword" class="col-sm-4 control-label">Confirm Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="confirmPassword" name = "confirmPassword" onkeyup="checkPass(); return false;" placeholder="Confirm Password" title="Please enter the same Password as above." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
									</div>
								</div>	

								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Email id</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="email" name = "email" placeholder="abc@xyz.com" required="">					
									</div>
								</div>
								<div class="form-group">
									<label for="dob" class="col-sm-4 control-label">Date of Birth</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="dob" name = "dob" placeholder="yy/mm/dd" required="">					
									</div>
								</div>
								<div class="form-group">
									<label for="address" class="col-sm-4 control-label">Address</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="address" name = "address" placeholder="" required="">					
									</div>
								</div>
								<div class="form-group">
									<label for="mobile" class="col-sm-4 control-label">Mobile</label>
									<div class="col-sm-8">
		
											
										<div class="input-group">
											<span class="input-group-addon">+61</span>
											<input type="number" class="form-control" id="mobile" name = "mobile" placeholder="" required="">				
										</div>
											
									</div>
								</div>								
								<div class="form-group last">
									<div class="col-sm-offset-4 col-sm-9">
										<button type="submit" name="submit" class="btn btn-success btn-sm">Register</button>
										<button type="reset" class="btn btn-default btn-sm">Reset</button>
									</div>
								</div>
							</form>
						</div>
						<div class="panel-footer">Already a member? <a href="login.php" class=""> LogIn here</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2">
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
	} 
	else {
		require ('dbconn.php');
		$student_fname = $_POST["fname"];
		$student_lname = $_POST["lname"];
		$student_password = md5($_POST["password"]);
		$cpassword = md5($_POST["confirmPassword"]);
		$student_address = $_POST["address"];	
		$student_email = $_POST["email"];
		$student_mobile = $_POST["mobile"];
		$student_dob = $_POST["dob"];		
		
		$query = mysqli_query($conn, "SELECT student_id from student ORDER BY student_id DESC LIMIT 1"); 
		$row = mysqli_fetch_array($query);
		$prev_id = substr($row["student_id"], -4); 
		$now_id = $prev_id + 1;			
		$student_id = substr(date("Y"), -2) . sprintf("%04d", $now_id);
				
		if($student_password==$cpassword){
			$query = "INSERT INTO student (`student_id`, `student_firstname`, `student_lastname`, `student_password`, `student_address`, `student_email`, `student_mobile`, `student_dob`) VALUES ('$student_id', '$student_fname', '$student_lname', '$student_password', '$student_address', '$student_email', '$student_mobile', '$student_dob')";
			$run_query = mysqli_query($conn, $query);
			if (mysqli_error($run_query))
			{
				echo "<script>alert('Error occured while creating account.. Try again')
				window.location.href='register.php
				</script>";
			}
			else{
				
				$admin_email = "admin@rajsekharmasina.com";
				$comment = "Hi " .$student_fname. ",\nThank you for registering to Vital Education. Your username is " .$student_id. "\nThis is the username for both Vital education website and Moodle.\n Thank you.";
 
				//send email
				mail($student_email, "Vital Education", $comment, "From:" . $admin_email );
				
				echo "<script>alert('Account created successfully..Check your mail to get the username')
				window.location.href='login.php'
				</script>";
			}
		}
		else{
			echo "<script>alert('Passwords doesn't match..Try again')
			window.location.href='register.php'
			
			</script>";
		}	
	}
?>