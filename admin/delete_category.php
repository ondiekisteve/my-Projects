<?php
include 'includes/inc.php';
if(isset($_GET['delete_category']))
{
	$delete_id=$_GET['delete_category'];
	$delete_query="DELETE FROM categories WHERE cat_id='$delete_id'";
    if(mysql_query($delete_query))
    {
		echo "<script>alert('A Category with an id of $delete_id has been successfully deleted')</script>
		";
		header('location:index.php');
	}
	else
	{
		echo "Error occured in deleting a post".mysql_error();
	}
}
?>