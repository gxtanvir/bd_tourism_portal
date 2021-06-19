<?php
if (isset($_POST['create_user'])) {
	
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    // $post_date= date('d-m-y');
    

    // $post_image=$_FILES['image']['name'];
    // $post_image_temp=$_FILES['image']['tmp_name'];

    
    $user_role=$_POST['user_role'];
    $username=$_POST['username']; 
    //$post_cmmmnet_count=4;
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

$user_password = password_hash($user_password, PASSWORD_BCRYPT,array('cost'=>10));

    // move_uploaded_file($post_image_temp,"../images/$post_image" );
    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password)VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";

    $create_user_query = mysqli_query($connection,$query);

    confirmQuery($create_user_query);

    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
}


?>

<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="user_firstname">Firstname</label>
		<input type="text" class="form-control" name="user_firstname" required>
	</div>


	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" name="user_lastname" required>	
	</div>

	<div class="form-group">
		<select  name="user_role" id="">
			<option value="subscriber">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		
			
		</select>	
	</div>

	

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required>	
	</div>


	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">	
	</div> -->



	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="text" class="form-control" name="user_email" required>	
	</div>


	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password" required>	
	</div>



	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">	
	</div>

</form>