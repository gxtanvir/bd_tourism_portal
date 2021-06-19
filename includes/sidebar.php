 <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!--Search form-->
                    <!-- /.input-group -->
                </div>



                <!-- Login -->
                <?php if(!isset($_SESSION['user_role'])):?>
                <div class="well">   
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <input name="password" type="password" id="password" class="form-control" placeholder="Enter password">
                        <i class="far fa-eye" id="togglePassword" style="float: right;margin-left: -25px;margin-top: -25px;margin-right: 5px;position: relative;z-index: 2;cursor: pointer"></i> 
                        <button name="login" type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
                        <p><a href="registration.php">New user?Create an account</a></p>
                        
                    </div>
                    <script src="js/app.js"></script>
                    </form> <!--Search form-->
                    <!-- /.input-group -->
                    
                </div>
                <?php endif; ?> 





                <!-- Blog Categories Well -->
                <div class="well">

                    <?php
                    $query= "SELECT * FROM categories";
                    $select_categories_sidebar = mysqli_query($connection,$query);

                    ?>



                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php

                                while ($row=mysqli_fetch_assoc($select_categories_sidebar)) {
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];

                                    echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "includes/widget.php"; ?>

            </div>
