<?php
include 'includes/inc.php';

?>
<!DOCTYPE HTML">
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
    		<h3 style="text-align: center;">All Comments</h3>
    	</div><!--End of panel heading-->
    	<div class="panel-body">
    		<table class="table table-bordered">
    			<thead>
    			<tr>
    				<th>Comment Id</th>
    				<th>Comment Text</th>
    				<th>Post Title</th>
    				<th>Perform Operation</th>
    			</tr>
    			</thead>
    			<tbody>
    				     <?php
    				     $select_comments="SELECT * FROM comments";
    				     $comments_result=mysql_query($select_comments);
    				     while($comment_row=mysql_fetch_array($comments_result))
    				     {
						 	$comment_id=$comment_row['comment_id'];
						 	$comment_text=$comment_row['comment_text'];
						 	$post_id2=$comment_row['post_id'];
						 	$select_posts="SELECT post_title FROM posts WHERE post_id=$post_id2";
						 	$comment_results=mysql_query($select_posts);
						 	$row=mysql_fetch_array($comment_results);
						 	$post_title2=$row['post_title'];
						 	echo "<tr>
    				     	  	<td>$comment_id</td>
    				     	  	<td>$comment_text</td>
    				     	  	<td>$post_title2</td>
    				     	  	
    				     	  	<td><a href='delete_comment.php?delete_comment=$comment_id'>Delete</a></td>
    				     	  </tr>";
						 	
    				     	   
    				    }  
    				     ?>
    	        </tbody>
    	        </table>
    	</div><!--End of panel body-->
    </div><!--End of panel-->
</body>
</html>