<?php
include "includes/inc.php";
if(isset($_POST['insert_post']))
{
	
	$post_title=$_POST['post_title'];
	$post_date=date("d-m-Y");
	$post_cat=$_POST['cat'];
	$post_author=$_POST['post_author'];
	$post_keywords=$_POST['post_keywords'];
	$post_image=$_FILES['post_image']['name'];
	$post_image_tmp=$_FILES['post_image']['tmp_name'];
	$post_content=mysql_escape_string($_POST['post_content']);
	
	move_uploaded_file($post_image_tmp,"new_images/$post_image");
	$insert_post="INSERT INTO posts(category_id,post_title,post_date,post_author,post_keywords,post_image,post_content)VALUES('$_POST[cat]','$_POST[post_title]','$post_date','$_POST[post_author]','$_POST[post_keywords]','$post_image','$post_content')";
	$result=mysql_query($insert_post);
	if($result)
	{
		echo "data inserted";
	}
	else
	{
		echo "Error occured in inserting".mysql_error();
	}
	
}
?>
<!DOCTYPE HTML">
<html lang="eng">
<head>
<title>News data insertion page</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
 <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
			<div class="panel panel-success"style="margin-top: 10px;">
			<div class="panel-heading">
				<h2 style="text-align: center;">Insert New Post</h2>
			</div><!--End of panel heading-->
			<div class="panel-body">
				<form method="POST"action="index.php?insert_post"enctype="multipart/form-data"class="form-horizontal">
					<div class="form-group">
						<label for="post_title" class="control-label col-sm-3">Post Title</label>
						<div class="col-sm-9">
							<input type="text"name="post_title"class="form-control">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="cat_id" class="control-label col-sm-3">Category Id</label>
						<div class="col-sm-9">
							<select name="cat"class="form-control">
								<option>Select Category</option>
								<?php
								
				 $select_cat="SELECT * FROM categories";
				$result=mysql_query($select_cat);
				while($cat_row=mysql_fetch_array($result))
				{
					$cat_id=$cat_row['cat_id'];
					$cat_title=$cat_row['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
				}
								
								?>	
							</select>
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_author" class="control-label col-sm-3">Post Author</label>
						<div class="col-sm-9">
							<input type="text"name="post_author"class="form-control">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_keywords" class="control-label col-sm-3">Post Keywords</label>
						<div class="col-sm-9">
							<input type="text"name="post_keywords"class="form-control">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_image" class="control-label col-sm-3">Post Image</label>
						<div class="col-sm-9">
							<input type="file"name="post_image"class="form-control">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_keywords" class="control-label col-sm-3">Post Content</label>
						<div class="col-sm-9">
							<textarea name="post_content"class="form-control"cols="30"rows="15" id=”NoTinyMCE”>
								
							</textarea>
						</div>
					</div><!--End of form group-->
					<input type="submit"name="insert_post"class="btn btn-success btn-block"value="Publish Now"style="font-size: 20px;"/>
				</form>
			</div><!--End of panel body-->
			</div><!--End of panel-->
</body>
</html>