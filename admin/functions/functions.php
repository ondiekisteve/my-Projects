<?php
							function view_post(
							$display_post="SELECT * FROM posts";
							$display_result=mysql_query($display_post);
							while($display_row=mysql_fetch_array($display_result))
							{
							$post_id=$display_row['post_id'];
							$post_title=$display_row['post_title'];
						    $post_author=$display_row['post_author'];
						    $post_image=$display_row['post_image'];
						    )
							
?>