<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
?>
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
<br/><br/><br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
				
				<?php if(!isset($_POST['submit'])){ ?>
					<form class="form-horizontal" method="POST" action = "">
                        <legend class="text-center">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days." rows="6" minlength = "50" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name = "submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
					</form>
				<?php } else {
					$admin_email = "admin@rajsekharmasina.com";
					$email = $_REQUEST['email'];
					$subject = "Enquiry";
					$comment = $_REQUEST['message'];
  
					//send email
					mail($admin_email, $subject, $comment, "From:" . $email);
				
					echo "<div class = 'text-center'><br/><br/><br/><br/><br/><br/><p><h2>Thank you for contacting us.</h2></p> <br/> </p><h4>You will recieve a response from us in 2 business days</h4></p><br/><br/><br/><br/><br/><br/><br/><br/></div>";
				}?>
				</div>
			</div>
			<div class="col-md-6">
				<div>
					<div class="panel panel-default">
                        <legend class="text-center">Office Location</legend>
						<div class="panel-body text-center">
							<h4>Address</h4>
							<div>
								1 Elizabeth Street<br />
								Melbourne VIC<br />
								+61 412 345678<br />
								enquiry@vitaleducation.com<br />
							</div>
							<hr />
							<div id="map1" class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.14732290553!2d144.96086330000003!3d-37.81001809999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4ab189165b%3A0xecf9cfc08f547e62!2sMelbourne+Institute+of+Technology!5e0!3m2!1sen!2sau!4v1442920392320" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
								<br/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br/><br/><br/><br/>
	<?php
		include ('footer.php');
	?>	
</body>
</html>