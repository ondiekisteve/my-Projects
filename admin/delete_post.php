<?php
include 'includes/inc.php';
if(isset($_GET['delete_post']))
{
	$delete_id=$_GET['delete_post'];
	$delete_query="DELETE FROM posts WHERE post_id='$delete_id'";
    if(mysql_query($delete_query))
    {
		echo "<script>alert('A post with an id of $delete_id has been successfully deleted')</script>";
	}
	else
	{
		echo "Error occured in deleting a post".mysql_error();
	}
}
?>