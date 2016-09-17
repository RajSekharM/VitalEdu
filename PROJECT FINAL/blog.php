<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
	
	$sql = "SELECT article_id, article_title, article_image, LEFT (article_desc, 350) AS article_desc, article_author, DATEDIFF(CURDATE(), article_date) AS article_date FROM blog";
	$result = mysqli_query($conn, $sql);
	while($info = mysqli_fetch_array($result)){
		$article_id[] = $info['article_id'];
		$article_title[] = $info['article_title'];
		$article_image[] = $info['article_image'];
		$article_desc[] = $info['article_desc'];
		$article_author[] = $info['article_author'];
		$article_date[] = $info['article_date'];		
	}		
	?>

<html lang = "en">
	<head>
		<title>Blog</title>
		<style>
			a{
			color:black;
			}
		</style>
	</head>
	<body>
		<br/><br/><br/>
		<div class="container">
			<div class="panel">
				<div class="panel-body">								
			<h1 class = "text-center"><strong>BLOG</strong></h1>					
					<?php for($i = 0; $i < sizeof($article_id); $i++) { 	
						$sql = "SELECT COUNT(comment_id) as comment_count FROM blog_comment WHERE article_id = '$article_id[$i]'";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result) == 1){
							while($info = mysqli_fetch_array($result)){
								$comment_count = $info['comment_count'];
							}
						} 
					?>
						<!--/stories-->						
						<div class="row">    
							<br>
							<div class="col-md-2 col-sm-3 text-center">
								<br/><br/><a class="story-img" href="#"><img src="//placehold.it/100" style="width:100%;height:100%" class="img-thumbnail hidden-xs"></a>
							</div>
							<div class="col-md-10 col-sm-9">
								<h3><a href = "article.php?id=<?php echo $article_id[$i]; ?>" style = "text-decoration:none"><?php echo $article_title[$i]; ?></a></h3>
								<div class="row">
									<div class="col-xs-9">
										<p><?php echo $article_desc[$i]; ?> ...</p>
										<p class="lead"><a href = "article.php?id=<?php echo $article_id[$i] ?>" class="btn btn-default">Read More</a></p>
										<ul class="list-inline">
											<li class = "text-info"><?php echo $article_date[$i]; ?> Days Ago </li>
												&nbsp;
											<li class = "text-info"><i class="glyphicon glyphicon-comment"></i> <?php echo $comment_count; ?> Comments</li>
												&nbsp;

										</ul>
									</div>
									<div class="col-xs-3"></div>
								</div>
								<br><br>
							</div>
						</div>
					<hr>  
					<!--/stories-->					
					<?php } ?>
					
					<a href="#" class="btn pull-right">More <span class="glyphicon glyphicon-chevron-right"/></a>          
				</div>
			</div>
		</div>                                                
		<hr>
		<?php
			include ('footer.php');
		?>
	</body>
</html>