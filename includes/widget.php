<div class="well">
 <h4>Recent Posts</h4>
 <?php
 $query="SELECT * FROM posts ORDER BY post_id DESC LIMIT 10";
 $select_all_posts_title = mysqli_query($connection,$query);
 if(!$select_all_posts_title)
 {
 	die("Query Failed".mysqli_error($connection));
 }
 while ($row=mysqli_fetch_assoc($select_all_posts_title)) {
 	$post_id=$row['post_id'];
 	$post_title=$row['post_title'];
 	echo "<a href='post.php?p_id=$post_id'>$post_title</a>";
 	echo "</br>";
 }
 ?>
                    
 </div>
