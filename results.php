
<!DOCTYPE HTML">
<html lang="eng">
<head>
<title>Moi University News portal</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
	<?php
	
		include 'header.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 list-group-item">
			<!--Content area starts here-->
				<?php
           if(isset($_GET['submit']))
           {
           	    $search_query=$_GET['search'];
		   	 	$select_posts="SELECT * FROM posts where post_keywords like '%$search_query%'";
				 	$post_query=mysql_query($select_posts);
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$post_id=$query_row['post_id'];
						$post_title=$query_row['post_title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['post_author'];
						$post_keywords=$query_row['post_keywords'];
						$post_image=$query_row['post_image'];
						$post_content=substr($query_row['post_content'],0,300);
						
						echo "
						<h1 style='text-align:center;'><a href='details.php?post=$post_id'>$post_title</a></h1>
						<p><span>Posted by </span><span style='font-weight:bold;font-style:italic;'>$post_author</span> on &nbsp;$post_date</p>
						<div class='img-thumbnail pull-left'style='margin-right:10px;'><img src='admin/new_images/$post_image'width='300'height='200'></div>
						<p>$post_content</p><a href='details.php?post=$post_id'>Read More</a><br><hr>
						
						
						
						";
					}
					}
					else
					 if(isset($_GET['cat']))
					 {
                   	$cat_id=$_GET['cat'];
				 	$select_posts="SELECT * FROM posts WHERE category_id='$cat_id'";
				 	$post_query=mysql_query($select_posts);
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$post_id=$query_row['post_id'];
						$post_title=$query_row['post_title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['post_author'];
						$post_keywords=$query_row['post_keywords'];
						$post_image=$query_row['post_image'];
						$post_content=substr($query_row['post_content'],0,300);
						
						echo "
						<h1 style='text-align:center;'><a href='details.php?post=$post_id'>$post_title</a></h1>
						<p><span>Posted by </span><span style='font-weight:bold;font-style:italic;'>$post_author</span> on &nbsp;$post_date</p>
						<div class='img-thumbnail pull-left'style='margin-right:10px;'><img src='admin/new_images/$post_image'width='300'height='200'></div>
						<p>$post_content</p><a href='details.php?post=$post_id'>Read More</a><br><hr>
						
						
						
						";
					}
					}
				
				?>
				<!--End of content area-->
			</div><!--End of col-->
			<div class="col-sm-4 list-group-item-success">
			<h2 class="list-group-item"style="text-align: center;font-family: lucida calligraphy;">Recent Stories</h2>
				<?php
					include'sidebar.php';
				?>
			</div><!--End of col-->
		</div><!--End of row-->
	</div><!--End of contaier-->
</body>
</html>