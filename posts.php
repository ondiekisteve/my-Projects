<?php
           if(!isset($_GET['cat']))
           {
		   	 	$select_posts="SELECT * FROM posts ORDER BY RAND() LIMIT 0,4";
				 	$post_query=mysql_query($select_posts);
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$post_id=$query_row['post_id'];
						$post_title=$query_row['post_title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['post_author'];
						$post_keywords=$query_row['post_keywords'];
						$post_image=$query_row['post_image'];
						$post_content=substr($query_row['post_content'],0,300);
						
						echo "
						<h2 style='text-align:center;'><a href='details.php?post=$post_id'>$post_title</a></h2>
						<p><span>Posted by </span><span style='font-weight:bold;font-style:italic;'>$post_author</span> on &nbsp;$post_date</p>
						<div class='img-thumbnail pull-left'style='margin-right:10px;'><img src='admin/new_images/$post_image'width='300'height='200'></div>
						<p>$post_content</p><a href='details.php?post=$post_id'>Read More</a><br><hr>
						
						
						
						";
					}
					}
					else
					 {
                   	$cat_id=$_GET['cat'];
				 	$select_posts="SELECT * FROM posts WHERE category_id='$cat_id'ORDER BY RAND() LIMIT 0,4";
				 	$post_query=mysql_query($select_posts);
				 	while($query_row=mysql_fetch_array($post_query))
				 	{
						$post_id=$query_row['post_id'];
						$post_title=$query_row['post_title'];
						$post_date=$query_row['post_date'];
						$post_author=$query_row['post_author'];
						$post_keywords=$query_row['post_keywords'];
						$post_image=$query_row['post_image'];
						$post_content=substr($query_row['post_content'],0,300);
						
						echo "
						<h1 style='text-align:center;'><a href='details.php?post=$post_id'>$post_title</a></h1>
						<p><span>Posted by </span><span style='font-weight:bold;font-style:italic;'>$post_author</span> on &nbsp;$post_date</p>
						<div class='img-thumbnail pull-left'style='margin-right:10px;'><img src='admin/new_images/$post_image'width='300'height='200'></div>
						<p>$post_content</p><a href='details.php?post=$post_id'>Read More</a><br><hr>
						
						
						
						";
					}
					}
				
				?>