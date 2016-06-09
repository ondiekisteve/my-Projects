<?php
include 'includes/inc.php';
if(isset($_GET['edit_post']))
{
	$edit_id=$_GET['edit_post'];
	$edit_post="SELECT * FROM posts WHERE post_id=$edit_id";
	$edit_result=mysql_query($edit_post);
    while($edit_row=mysql_fetch_array($edit_result))
	{
		$post_id=$edit_row['post_id'];
		$title=$edit_row['post_title'];
		$cat=$edit_row['category_id'];
		$author=$edit_row['post_author'];
		$keywords=$edit_row['post_keywords'];
		$image=$edit_row['post_image'];
		$content=$edit_row['post_content'];
    }
}

?>
	
<!DOCTYPE HTML">
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
</head>
<body>
   <div class="panel panel-success"style="margin-top: 10px;">
			<div class="panel-heading">
				<h2 style="text-align: center;">Update This Post</h2>
			</div><!--End of panel heading-->
			<div class="panel-body">
				<form method="POST"action="index.php?edit_post"enctype="multipart/form-data"class="form-horizontal">
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
</body>
</html>