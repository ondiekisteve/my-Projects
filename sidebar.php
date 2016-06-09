<html>
<head>
	<title>Moi University News center</title>
	<meta charset="utf-8">
	<meta name="viewport"content="width=device-width,initial-scale=1.0">
	<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
	<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
<div id="social">
	<ul>
	<li><a href="#"><img src="img/facebook.png"/></a></li>
	<li><a href="#"><img src="img/gmail-icon.png"/></a></li>
	<li><a href="#"><img src="img/twitter.png"/></a></li>
	<li><a href="#"><img src="img/youtube.png"/></a></li>
</ul>
</div><!--End of social-->

<?php
				 	$select_posts="SELECT * FROM posts ORDER BY 1 DESC LIMIT 0,4";
				 	$post_query=mysql_query($select_posts);
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$post_id=$query_row['post_id'];
						$post_title=$query_row['post_title'];
						$post_image=$query_row['post_image'];
						
						echo "
						<h4 style='text-align:center;'><a href='details.php?post=$post_id'>$post_title</a></h4>
						<div class='img-thumbnail'style='margin-right:10px;'><img src='admin/new_images/$post_image'width='300'height='200'></div><hr style='border:2px solid orange;'>
						";
					}
				
				?>
</body>
</html>