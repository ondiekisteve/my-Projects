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
    		<h3 style="text-align: center;">All Categories</h3>
    	</div><!--End of panel heading-->
    	<div class="panel-body">
    		<table class="table table-bordered">
    			<thead>
    			<tr>
    				<th>Category Id</th>
    				<th>Category Title</th>
    				<th>Alter Data</th>
    			</tr>
    			</thead>
    			<tbody>
    				     <?php
    				     $select_categories="SELECT * FROM categories";
    				     $select_result=mysql_query($select_categories);
    				     while($category_row=mysql_fetch_array($select_result))
    				     {
						 	$cat_id2=$category_row['cat_id'];
						 	$cat_title2=$category_row['cat_title'];
    				     	  echo "<tr>
    				     	  	<td>$cat_id2</td>
    				     	  	<td>$cat_title2</td>
    				     	  	<td><a href='delete_category.php?delete_category=$cat_id2'>Delete</a></td>
    				     	  </tr>"; 
    				    }  
    				     ?>
    	        </tbody>
    	        </table>
    	</div><!--End of panel body-->
    </div><!--End of panel-->
</body>
</html>