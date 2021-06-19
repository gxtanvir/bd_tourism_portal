<?php
if (isset($_POST['create_post'])) {
	
    
    $post_category_id=$_POST['post_category_id'];
    $post_title=$_POST['title'];
    //$post_author=$_POST['author'];
    $post_date= date('d-m-y');
    

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags']; 
    //$post_cmmmnet_count=4;
    $post_status=$_POST['post_status'];



    move_uploaded_file($post_image_temp,"images/$post_image" );

    $query="INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) VALUES({$post_category_id},'{$post_title}','{$_SESSION['username']}', now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";


    $create_posts_query = mysqli_query($connection,$query);

    if(!$create_posts_query)
            {
            	die("Query Failed".mysqli_error($connection));
            }
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'><strong>Post Created:</strong><a href='post.php?p_id={$the_post_id}'>View Post</a></p>";
}


?>





<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_category_id">Select Category</label>
		<select name="post_category_id" id="">
			<?php
			$query= "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);
            if(!$select_categories)
            {
            	die("Query Failed".mysqli_error($connection));
            }
             while ($row=mysqli_fetch_assoc($select_categories)) {

	          $cat_id=$row['cat_id'];
	          $cat_title=$row['cat_title'];

	          echo "<option value='$cat_id'>{$cat_title}</option>";
            
        }
			?>
		</select>
		
	</div>



	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" required>	
	</div>

	

<!-- 	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="author" required>	
	</div>
 -->

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">	
	</div>



	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" required>	
	</div>


	<div class="form-group">
		<select name="post_status">
			<option value="draft">Post Status</option>
			<option value="published">Published</option>
			<option value="draft">Draft</option>
		</select>
	</div>



	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>	
	</div>


	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">	
	</div>


	

</form>