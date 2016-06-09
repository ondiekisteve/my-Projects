<?php
    include "includes/inc.php";
?>
<!DOCTYPE HTML">
<html>
<head>
<title>Moi University News portal</title>
<meta charset="utf-8"
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
	<div class="container">
		<a href="index.php"><div class="jumbotron">
		</div><!--End of jumbotron--></a>
		<div class="navbar navbar-inverse"id="navbar">
			<ul class="nav navbar-nav">
				<?php
				$select_cat="SELECT * FROM categories";
				$result=mysql_query($select_cat);
				while($cat_row=mysql_fetch_array($result))
				{
					$cat_id=$cat_row['cat_id'];
					$cat_title=$cat_row['cat_title'];
					echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
				}
				
				?>
			</ul>
			<div id="search"class="pull-right">
				<form method="GET"action="results.php"enctype="multipart/form-data"class="navbar-form">
				<input type="text"name="search"class="form-control"/>
				<input type="submit"name="submit"class="btn btn-success"value="Search"/>	
				</form>
			</div><!--End of search-->
		</div><!--End of navbar-->
	</div><!--End of container-->
</body>
</html>