
<?php
include 'includes/inc.php';
	if(isset($_GET['post']))
	{
		$post_id=$_GET['post'];
		$get_posts="SELECT * FROM posts WHERE post_id='$post_id'";
		$run_posts=mysql_query($get_posts);
		$row=mysql_fetch_array($run_posts);
		$post_new_id=$row['post_id'];
	}
	$select_comments="SELECT * FROM comments WHERE post_id='$post_new_id' ORDER BY comment_id DESC";
	$run_comments=mysql_query($select_comments);
	$num_rows=mysql_num_rows($run_comments);
	echo "<h1 style='clear:both;'>Comments so far:(".$num_rows.")</h1>";
	while($comment_rows=mysql_fetch_array($run_comments))
	{
		$comment_name=$comment_rows['comment_name'];
		$comment_text=$comment_rows['comment_text'];
		$comment_date=$comment_rows['comment_date'];
		
		echo "<div class='panel panel-default'id='comments'><h3 class='badge'style='padding:10px;'><span style='font-size:16px;font-weight:bold;'>$comment_name </span><span style='font-style:oblique;'>on $comment_date Says:</span></h3>
		<p style='font-style:italic;padding-left:10px;padding-right:10px;'>$comment_text</p></div>
		";
	}

?>
<?php
    
	if(isset($_POST['comment']))
	{
		$comment_name=$_POST['comment_name'];
		$comment_email=$_POST['comment_email'];
		$comment_text=mysql_escape_string($_POST['comment_text']);
		$comment_date=date("l jS F Y");
		$status="unapprove";
		
		$insert_comment="INSERT INTO comments(post_id,comment_name,comment_email,comment_text,comment_date,status)VALUES('$post_new_id','$comment_name','$comment_email','$comment_text','$comment_date','$status')";
		if(mysql_query($insert_comment))
		{
			echo "comment inserted successfully";
		}
		else
		{
			echo "error occured in inserting".mysql_error();
		}
	}
?>
<div class="panel panel-default"style="clear: both;">
				<div class="panel-heading">
					<h3 style="text-align: center;">Leave a Comment below</h3>
				</div><!--End of panel haeding-->
				<div class="panel-body">
				<form method="POST"action="details.php?post=<?php echo $post_new_id;  ?>"class="form-horizontal">
				<div class="form-group">
					<label for="name" class="control-label col-sm-4">Your Name</label>
					<div class="col-sm-8">
						<input type="text"name="comment_name"class="form-control"/>
					</div><!--End of col-->
				</div><!--End of form group-->
				<div class="form-group">
					<label for="email" class="control-label col-sm-4">Your Email</label>
					<div class="col-sm-8">
						<input type="email"name="comment_email"class="form-control"/>
					</div><!--End of col-->
				</div><!--End of form group-->
				<div class="form-group">
					<label for="comment" class="control-label col-sm-4">Your Comment</label>
					<div class="col-sm-8">
						<textarea class="form-control"rows="15"name="comment_text"></textarea>
					</div><!--End of col-->
				</div><!--End of form group-->
				<div class="form-group">
					<label for="comment" class="control-label col-sm-4"></label>
					<div class="col-sm-8">
						<input type="submit"name="comment"class="btn btn-success btn-block"value="Post Comment"/>
					</div><!--End of col-->
				</div><!--End of form group-->
				
					
				</form>
				</div><!--End of panel body-->
				</div><!--End of panel-->