<?php
	include'includes/inc.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link type="text/css"rel="stylesheet"href="../css/bootstrap.min.css"/>
<link type="text/css"rel="stylesheet"href="styles.css"/>
</head>
<body>
         <div class="panel panel-default"style="margin-top: 10px;">
         	<div class="panel-heading">
         		<h3 style="text-align: center;">View All Posts</h3>
         	</div><!--End of panel haeding-->
         	<div class="panel-body">
         		<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Post Id</th>
							<th>Titles</th>
							<th>Authors</th>
							<th>Images</th>
							<th>Comments</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
							<?php
							$display_post="SELECT * FROM posts";
							$display_result=mysql_query($display_post);
							while($display_row=mysql_fetch_array($display_result))
							{
							$post_id=$display_row['post_id'];
							$post_title=$display_row['post_title'];
						    $post_author=$display_row['post_author'];
						    $post_image=$display_row['post_image'];
							
							?>
					<tbody>
						<tr>
							<td><?php echo $post_id;?></td>
							<td><?php echo $post_title; ?></td>
							<td><?php echo $post_author;  ?></td>
							<td><img src="new_images/<?php echo $post_image; ?>"height="60"width="60"></td>         
							<td>
								<?php
								$select_comments="SELECT * FROM comments WHERE post_id='$post_id'";
								$comment_result=mysql_query($select_comments);
								$count=mysql_num_rows($comment_result);
								echo $count;
								
								?>
							</td>
							<td><a href="index.php?edit_post=<?php echo $post_id; ?>">Edit</a></td>
							<td><a href="delete_post.php?delete_post=<?php echo $post_id; ?>">Delete</a></td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
         	</div><!--End of panel body-->
         </div><!--End of panel-->
</body>
</html>