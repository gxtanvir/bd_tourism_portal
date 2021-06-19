<?php

if (isset($_GET['p_id'])) {
	$the_post_id = $_GET['p_id'];
}

	$query= "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_posts_by_id = mysqli_query($connection,$query);

    while ($row=mysqli_fetch_assoc($select_posts_by_id)) {

        $post_id=$row['post_id'];
        $post_author=$row['post_author'];
        $post_title=$row['post_title'];
        $post_category_id=$row['post_category_id'];
        $post_status=$row['post_status'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_date=$row['post_date'];
        $post_content=$row['post_content'];
}

if (isset($_POST['update_post'])) {
	$post_category_id=$_POST['post_category_id'];
    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags']; 
    $post_status=$_POST['post_status'];



    move_uploaded_file($post_image_temp,"../images/$post_image" );

    if(empty($post_image))
    {
    	$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    	$select_image = mysqli_query($connection,$query);

		while ($row=mysqli_fetch_assoc($select_image)) {

			$post_image=$row['post_image'];
		}
    }

    $query = "UPDATE posts SET post_category_id = {$post_category_id},post_title = '{$post_title}',post_author = '{$post_author}',post_date = now(), post_image = '{$post_image}',post_content= '{$post_content}',post_tags = '{$post_tags}',post_status = '{$post_status}' WHERE post_id = {$post_id}";

    $update_post = mysqli_query($connection,$query);

    confirmQuery($update_post);
    echo "<p class='bg-success'><strong>Post Updated:</strong><a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Post</a></p>";
}





?>




<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<select name="post_category_id" id="">
			<?php

			$query= "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);

            confirmQuery($select_categories);

            while ($row=mysqli_fetch_assoc($select_categories)) {

	            $cat_id=$row['cat_id'];
	            $cat_title=$row['cat_title'];

	            if($cat_id == $post_category_id)
	            {
	            	echo " <option selected value='$cat_id'>{$cat_title}</option>";
	            }
	            else
	            {
	            	echo " <option value='$cat_id'>{$cat_title}</option>";
	            }

	            
            
        }



			?>
			


		</select>	
	</div>



	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">	
	</div>

	

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">	
	</div>


	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>" alt="image">	
		<input type="file" name="image">
	</div>



	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">	
	</div>


	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" id="">
			<option value='<?php echo $post_status ?>'><?php echo $post_status;?></option>
			<?php
			if($post_status =='published')
			{
				echo "<option value='draft'>draft</option>";
			}
			else
			{
				echo " <option value='published'>published</option>";
			}
			?> 
		</select>
		
	</div>



	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo str_replace(' ', '</br>', $post_content) ; ?></textarea>	
	</div>


	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">	
	</div>


	

</form>