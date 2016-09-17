<!DOCTYPE html>
<html>
<head>
	<title>Payment Successful</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<br/><br/><br/><br/><br/><br/><br/>
	<div class = "container text-center">
		<h1>Payment Cancelled</h1>
		<p>Your payment was unsuccessful.</p>
		<p>This page will be redirected to homepage in 5 seconds.. If not, click <a href = "index.php">here</a></p>
		<?php header( "refresh:5;url=index.php" ); ?>	
	</div>
</body>
</html>
