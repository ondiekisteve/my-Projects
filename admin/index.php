
<!DOCTYPE HTML">
<html lang="eng">
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
	<div class="container">
	<div class="panel-heading btn btn-primary btn-block" style="margin-top: 10px;">
		<h1 style="text-align: center;">Admin Control Panel</h1>
	</div><!--End of jumbotron-->
		<div class="row">
			<div class="col-sm-3">
			<div class="panel">
			<div class="panel-heading btn btn-primary btn-block">
				<h3>Manage Content</h3>
			</div><!--End of panel heading-->
			<div class="panel-body btn btn-default btn-block">
				<ul class="list-group"style="font-size: 16px;">
				<li class="list-group-item"><a href="index.php?insert_post">Insert New Post</a></li><hr>
				<li class="list-group-item"><a href="index.php?view_post">View All Post</a></li><hr>
				<li class="list-group-item"><a href="index.php?insert_category">Insert New Category</a></li><hr>
				<li class="list-group-item"><a href="index.php?view_category">View All Categories</a></li><hr>
				<li class="list-group-item"><a href="index.php?view_comments">View All Comments</a></li><hr>
				<li class="list-group-item"><a href="index.php?logout">Admin Logout</a></li>
			</ul>
			</div><!--End of panel body-->
			</div><!--End of panel-->
			</div><!--End of col-->
			<div class="col-sm-9">
				<?php
				    if(isset($_GET['insert_post']))
				    {
						include 'insert_post.php';
					}
					if(isset($_GET['view_post']))
					{
						include 'view_posts.php';
					}
					if(isset($_GET['edit_post']))
					{
						include 'edit_post.php';
					}
					if(isset($_GET['insert_category']))
					{
						include 'insert_new_category.php';
					}
					if(isset($_GET['view_category']))
					{
						include 'view_categories.php';
					}
					if(isset($_GET['view_comments']))
					{
						include 'view_comments.php';
					}
				?>
			</div><!--End of col-->
		</div><!--End of row-->
	</div><!--End of container-->
</body>
</html>