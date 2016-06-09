
<!DOCTYPE HTML">
<html lang="eng">
<head>
<title>News data insertion page</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>

<?php
include 'includes/inc.php';
if(isset($_GET['edit_post']))
{
	$edit_id=$_GET['edit_post'];
	$edit_post="SELECT * FROM posts WHERE post_id='$edit_id'";
	$edit_result=mysql_query($edit_post);
	while($edit_row=mysql_fetch_array($edit_result))
	{
		$title=$edit_row['post_title'];
		$cat=$edit_row['category_id'];
		$author=$edit_row['post_author'];
		$keywords=$edit_row['post_keywords'];
		$image=$edit_row['post_image'];
		$content=$edit_row['post_content'];
?>
			<div class="panel panel-success"style="margin-top: 10px;">
			<div class="panel-heading">
				<h2 style="text-align: center;">Update This Post</h2>
			</div><!--End of panel heading-->
			<div class="panel-body">
				<form method="POST"action="index.php?edit_post=<?php echo $edit_id;  ?>"enctype="multipart/form-data"class="form-horizontal">
					<div class="form-group">
						<label for="post_title" class="control-label col-sm-3">Post Title</label>
						<div class="col-sm-9">
							<input type="text"name="post_title"class="form-control"value="<?php echo $title;   ?>">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="cat_id" class="control-label col-sm-3">Category Id</label>
						<div class="col-sm-9">
							<select name="cat"class="form-control">
								<?php
								
				 $select_cat="SELECT * FROM categories WHERE cat_id='$cat'";
				$result=mysql_query($select_cat);
				while($cat_row=mysql_fetch_array($result))
				{
					$cat_id=$cat_row['cat_id'];
					$cat_title=$cat_row['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
					
					$get_more_cats="SELECT * FROM categories";
					$category_result=mysql_query($get_more_cats);
					while($more_cats_row=mysql_fetch_array($category_result))
					{
					$cat_id=$more_cats_row['cat_id'];
					$cat_title=$more_cats_row['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
					}
				}
								
								?>	
							</select>
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_author" class="control-label col-sm-3">Post Author</label>
						<div class="col-sm-9">
							<input type="text"name="post_author"class="form-control"value="<?php echo $author; ?>">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_keywords" class="control-label col-sm-3">Post Keywords</label>
						<div class="col-sm-9">
							<input type="text"name="post_keywords"class="form-control"value="<?php echo $keywords;?>">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_image" class="control-label col-sm-3">Post Image</label>
						<div class="col-sm-9">
						<img src="new_images/<?php echo $image;  ?>"width="60"height="60">
							<input type="file"name="post_image"class="form-control">
						</div>
					</div><!--End of form group-->
					<div class="form-group">
						<label for="post_content" class="control-label col-sm-3">Post Content</label>
						<div class="col-sm-9">
							<textarea name="post_content"class="form-control"cols="30"rows="15"><?php echo $content;  ?>
							</textarea>
						</div>
					</div><!--End of form group-->
					<input type="submit"name="update"class="btn btn-success btn-block"value="Update Now"style="font-size: 20px;"/>
				</form>
			</div><!--End of panel body-->
			</div><!--End of panel-->
			<?php  	}
}
?>		
</body>
</html>
<?php

if(isset($_POST['update']))
{
	if(isset($_GET['edit_post']))
	{
	$update_id=$_GET['edit_post'];
	}
	$post_title=$_POST['post_title'];
	$post_date=date("d-m-Y");
	$post_cat1=$_POST['cat'];
	$post_author=$_POST['post_author'];
	$post_keywords=$_POST['post_keywords'];
	$post_image=$_FILES['post_image']['name'];
	$post_image_tmp=$_FILES['post_image']['tmp_name'];
	$post_content=mysql_escape_string($_POST['post_content']);
	
	move_uploaded_file($post_image_tmp,"new_images/$post_image");
	
	$update_post="UPDATE posts SET category_id='$post_cat1',post_title='$post_title',post_date='$post_date',post_author='$post_author',post_keywords='$post_keywords',post_image='$post_image',post_content='$post_content' WHERE post_id='$edit_id'";
	if(mysql_query($update_post))
	{
		header("location:index.php");
	}
	else
	{
		echo "Error occured in inserting".mysql_error();
	}
}
?>
