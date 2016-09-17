<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	$sql = "SELECT * FROM location";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($info = mysqli_fetch_array($result)){
			$loc_id[] = $info['location_id'];
			$loc_name[] = $info['location_name'];
			$loc_address[] = $info['location_address'];
			$loc_mobile[] = $info['location_mobile'];
			$loc_map[] = $info['location_map'];
		}
	}
	
?>
<html>
<head>
	<title>Location</title>
</head>
<body>
	<div class = "container text-center" style = "padding-bottom:10%">
		<br/><br/><br/>
		<div class = "panel">
		<?php
			for($i = 0;$i < sizeof($loc_id); $i++){ ?>
			<div class = "container"  id = "<?php echo $loc_id[$i]; ?>">
				<br/><br/><br/><br/><br/>
				<h2><strong><?php echo $loc_name[$i]; ?></strong></h2>
				<p><strong>Address</strong></p>
				<p><?php echo $loc_address[$i]; ?></p>
				<p><strong>Contact us at: </strong></p>
				<p><?php echo $loc_mobile[$i]; ?></p>
				<div class = "container" style = "padding-left:10%; padding-right:10%">
					<iframe src="<?php echo $loc_map[$i]; ?>" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		<?php	} ?>
			<br/><br/>
		</div>
	</div>

	<?php
		include ('footer.php');
	?>	
</body>
</html>