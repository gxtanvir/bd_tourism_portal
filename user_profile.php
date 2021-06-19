<?php 
include "includes/db.php";
?>
<?php 
include "includes/header.php";
?>

<?php
if(isset($_SESSION['username']))
{
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection,$query);
    if(!$select_user_profile_query)
	{
		die("Query Failed".mysqli_error($connection));
	}

  while($row = mysqli_fetch_array($select_user_profile_query))
  {
    $user_id=$row['user_id'];
    $username=$row['username'];
    $user_password=$row['user_password'];
    $user_firstname =$row['user_firstname'];
    $user_lastname=$row['user_lastname'];    
    $user_email=$row['user_email'];
    $user_image=$row['user_image'];
    $user_role=$row['user_role'];
  }

}
else
{
	header("Location: index.php");
}
?>

<body>
  <?php

  if (isset($_POST['edit_user'])) {
  
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    // $post_date= date('d-m-y');
    

    // $post_image=$_FILES['image']['name'];
    // $post_image_temp=$_FILES['image']['tmp_name'];

    
    //$user_role=$_POST['user_role'];
    $username=$_POST['username']; 
    //$post_cmmmnet_count=4;
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];



    if(!empty($user_password))
{
    $query_password = "SELECT user_password FROM users WHERE username = '{$username}'";
    $get_user_query = mysqli_query($connection,$query_password);
    if(!$get_user_query)
    {
        die("Query Failed".mysqli_error($connection));
    }
    $row = mysqli_fetch_array($get_user_query);
    $db_user_password =$row['user_password'];
    if($db_user_password != $user_password)
        {
            $user_password = password_hash($user_password, PASSWORD_BCRYPT,array('cost'=>12));
        }
    $query = "UPDATE users SET user_firstname = '{$user_firstname}',user_lastname = '{$user_lastname}',user_role = '{$user_role}',username = '{$username}',user_email= '{$user_email}',user_password = '{$user_password}' WHERE username = '{$username}'";


    $edit_user_query = mysqli_query($connection,$query);

    if(!$edit_user_query)
    {
        die("Query Failed".mysqli_error($connection));
    }

    $messege= "User Updated";

}



    // move_uploaded_file($post_image_temp,"../images/$post_image" );
 //    $query = "UPDATE users SET user_firstname = '{$user_firstname}',user_lastname = '{$user_lastname}',user_role = '{$user_role}',username = '{$username}',user_email= '{$user_email}',user_password = '{$user_password}' WHERE username = '{$username}'";


 //    $edit_user_query = mysqli_query($connection,$query);

 //    if(!$edit_user_query)
	// {
	// 	die("Query Failed".mysqli_error($connection));
	// }
}
else
{
   $messege= ""; 
}
?>










 <?php 
include "includes/navigation.php";
?>
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="background-image: url(images/giphy.gif); background-repeat: no-repeat;background-size: cover;">
                <div class="form-wrap">
                <h1>Edit your profile</h1>
                <?php echo $messege; ?>
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
						    <label for="user_firstname">Firstname</label>
						    <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
					    </div>
                        <div class="form-group">
						    <label for="lastname">Lastname</label>
						    <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
					    </div>
					    <div class="form-group">
						    <label for="username">Username</label>
						    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username"> 
						    <p class="text-warning">**Username not changeable</p>
					    </div>
					    <div class="form-group">
						    <label for="user_email">Email</label>
						    <input type="text" class="form-control" value="<?php echo $user_email; ?>" name="user_email"> 
						</div>
                         <div class="form-group">
						    <label for="user_password">Password</label>
						    <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password"> 
						 </div>
                
                        <div class="form-group">
					       <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">  
					  </div>
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    <hr>
    <?php include "includes/footer.php";?>
</section>
</div>
      



