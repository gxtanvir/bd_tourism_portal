<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
 if (isset($_POST['submit'])) {
    $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     ################################
      $query = "SELECT * FROM users WHERE username ='{$username}'";
      $res=mysqli_query($connection,$query);
      if(!$res)
      {
        die("Query Failed".mysqli_error($connection));
      }

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($username==isset($row['username']))
        {
            $message = "<p class='text-danger'><strong>*username  already exists</strong></p>";
        }
        }
        else
        {


     if(!empty($username) && !empty($email) && !empty($password) && strlen($username)>=4)
     {
         $username = mysqli_real_escape_string($connection,$username);
         $email = mysqli_real_escape_string($connection,$email);
         $password = mysqli_real_escape_string($connection,$password);

         $password = password_hash($password, PASSWORD_BCRYPT,array('cost'=>12));

         // $query = "SELECT randSalt FROM users";
         // $select_randsalt_query = mysqli_query($connection,$query);
         // if(!$select_randsalt_query)
         // {
         //    die("Query Failed".mysqli_error($connection));
         // }
         // $row = mysqli_fetch_array($select_randsalt_query);
         // $salt = $row['randSalt'];

        // $password = crypt($password,$salt);


        $query = "INSERT INTO users(username,user_email,user_password,user_role)VALUES('{$username}','{$email}','{$password}','subscriber')";
        $register_user_query = mysqli_query($connection,$query);
        if(!$register_user_query)
        {
            die("Query Failed".mysqli_error($connection).' '.mysqli_errno($connection));
        }
        $message = "<p class='text-success' >Your Ragistration has been submitted</p>";
     }
     else
     {

        $message = "<p class='text-danger'><strong>*Registarion fields caannot be empty and username should be at least 4 characters</strong></p>";
     }
 }
}

else
{
    $message="";
}




 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                         <h6 class="text-center"><?php echo $message ;?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <i class="far fa-eye" id="togglePassword" style="float: right;margin-left: -25px;margin-top: -25px;margin-right: 5px;position: relative;z-index: 2;cursor: pointer"></i> 
                        </div>
                        <script src="js/app.js"></script>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Create Account">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
  <hr>



<?php include "includes/footer.php";?>
</div>


      
