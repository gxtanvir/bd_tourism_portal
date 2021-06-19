 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->



            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>CMS</a>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">



                    <?php
                    // $query= "SELECT * FROM categories";
                    // $select_all_categories = mysqli_query($connection,$query);
                    // while ($row=mysqli_fetch_assoc($select_all_categories)) {
                    //     $cat_title=$row['cat_title'];
                    //     echo "<li><a href='#'>{$cat_title}</a></li>";
                    // }
                    ?>


                    <!-- <li>
                        <a href="admin">Admin</a>
                    </li> -->
                    
                    <?php
                    if(isset($_SESSION['user_role']))
                    {
                        echo " <li>
                        <a href='user_post.php?source=user_add_post'>Add Post</a>
                    </li>" ;
                            if($_SESSION['user_role']=='admin')
                            {
                               echo "<li>
                                <a href='admin'>Admin</a>
                            </li> "; 
                            }
                    
                    }
                    else
                    {
                        echo " <li>
                                     <a href='registration.php'>Registration</a>
                              </li> ";
                    }
                    ?>
                     <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <!--  <li>
                        <a href="user_post.php?source=user_add_post">Add Post</a>
                    </li> -->

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['user_role'])):?>
                    <li><a href="#" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php else: ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?> 
            </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

  <!-- Button to Open the Modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center"><i class="fa fa-user-circle fa-4x fa-spin" style="color:#033746" aria-hidden="true"></i></br><b>User Login</b></h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form action="includes/login.php" method="post">
                   <!--  <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input name="username" type="text"  placeholder="Enter username">
                    </div> -->
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                      <input class="form-control" type="text" name="username"placeholder="Enter username">
                    </div>
                </br>

                  
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                      <input name="password" type="password" id="password" class="form-control" placeholder="Enter password"> 
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="text-center">
                          <button name="login" type="submit" class="btn btn-success">Submit</button>
                          <i class="far fa-eye" id="togglePassword" style="float:right;margin-left: -25px;margin-top: -40px;margin-right: px;position: relative;z-index: 2;cursor: pointer"></i>
                          <p><a href="registration.php">New user?Create an account</a></p>
                    </div>
                </div>
                    <script src="js/app.js"></script>
                    
                    </form>
        </div>
        
        
        
      </div>
    </div>
  </div>
  
</div>



