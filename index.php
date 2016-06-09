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
					include 'posts.php';
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
		<?php
		
		   include 'footer.php';
		?>
	</div><!--End of contaier-->
</body>
</html>