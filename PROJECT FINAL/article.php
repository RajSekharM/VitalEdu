<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	if(!isset($_POST['submit'])){
	$sql = "SELECT * FROM blog where article_id = '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
	while($info = mysqli_fetch_array($result)){
		$GLOBALS['article_id'] = $info['article_id'];												
		$GLOBALS['article_title'] = $info['article_title'];
		$GLOBALS['article_image'] = $info['article_image'];
		$GLOBALS['article_desc'] = $info['article_desc'];
		$GLOBALS['article_author'] = $info['article_author'];
		$GLOBALS['article_date'] = $info['article_date'];
	}	
	}
	else{
			header('Location: blog.php');
	}
	$comm = '1';
	$sql = "SELECT comment_id, DATEDIFF(CURDATE(), comment_date) AS comment_date, comment_desc, commentator_name, commentator_email FROM blog_comment where article_id = '$id' AND status = 'Show' ORDER BY comment_date";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($info = mysqli_fetch_array($result)){
		$comment_id[] = $info['comment_id'];												
		$comment_date[] = $info['comment_date'];
		$comment_desc[] = $info['comment_desc'];
		$commentator_name[] = $info['commentator_name'];
		$commentator_email[] = $info['commentator_email'];
		}	
	}else{
		$comm = '0';
	}
?>

<html lang = "en">
	<head>
		<title><?php echo $article_title; ?></title>
	</head>
	<body>
	<br/><br/><br/>
		
		<div class="container">
			<div class="panel">
				<div class="panel-body">								
					<h1 class = "text-center"><strong><?php echo $article_title; ?></strong></h1>
					<br/><br/>
					<img class = "img-responsive center-block" src = "<?php echo $article_image; ?>" alt = "Article image">
					<br/><br/><br/>
					<p><?php echo $article_desc; ?></p>
				</div>
			</div>
		</div>
		<br/>
		<div class = "container">

			<div class="container" style = "padding: 10%; padding-top: 0%;"> 
				<h4><strong>Comments</strong></h4><hr/>
				
			<?php if($comm != '0'){
				for($i = 0;$i < sizeof($comment_id); $i++){ ?>
				<div class="row">
					<div class="col-sm-1 hidden-xs">
						<div class="thumbnail">
							<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_1x.png">
						</div>
					</div>
					
					<div class="col-sm-9">
						<div class="panel panel-default">
							<div class="panel-heading" style = "padding:0.5%;">
								<strong><?php echo $commentator_name[$i]; ?></strong> <span class="text-muted">commented <?php echo $comment_date[$i]; ?> days ago</span>
							</div>
							<div class="panel-body" style = "padding:0.5%">
							<?php echo $comment_desc[$i]; ?>
							</div>
						</div>
					</div>
				</div>
			<?php } 
				}else{
					echo "<p>No comments yet...</p>";
				}
			?>
			<hr/>
				<h4><strong>Add your comment</strong></h4>
				<div class = "row">
					<div class="col-sm-9">
						<form class = "form form-responsive" method = "POST" action = "">
							
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<input id="name" name="name" type="text" placeholder="Enter your name" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<input id="email" name="email" type="email" placeholder="Enter your email-id" class="form-control" required>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<textarea class="form-control" id="comment" name="comment" placeholder="Enter your comment here" rows="3" required></textarea>
								</div>
							</div>
							<input type = "hidden" value = "<?php echo $id; ?>" name = "article_id"/> 
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type = "submit" class = "btn btn-danger btn-block" name = "submit">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
	<?php
		include ('footer.php');		
	?>
	</body>
</html>

<?php
}
else{
		$article_id = $_POST['article_id'];
		$comment_date = date('Y-m-d H:i:s');
		$comment_desc = $_POST['comment'];
		$cmt_name = $_POST['name'];
		$cmt_email = $_POST['email'];
	$sql = "INSERT INTO blog_comment (`comment_date`, `comment_desc`, `commentator_name`, `commentator_email`, `article_id`, `status`) VALUES ('$comment_date', '$comment_desc', '$cmt_name', '$cmt_email', '$article_id', 'Hide')";
	
	if (mysqli_query($conn, $sql)) {			
		header("Location: article.php?id=$article_id" );
	} else {
	} ?>
</html>
	<?php }
	}else{
		header("Location: blog.php" );
	}
	?>
	