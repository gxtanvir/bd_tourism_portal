<?php 
include "includes/db.php";
?>

<?php 
include "includes/header.php";
?>
<?php
if (!isset($_SESSION['user_role'])) {
    //if($_SESSION['user_role']=='subscriber'){
    header("Location: index.php");
//}
}
?>

<body>


    <!-- Navigation -->
   <?php 
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                     <?php
                       if(isset($_GET['source']))
                       {
                        $source = $_GET['source'];
                       }
                       else
                       {
                        $source='';
                       }

                       switch ($source) {
                        
                           case 'user_add_post':
                               include "includes/user_add_post.php";
                               break;
                           case 'user_edit_post':
                           include "includes/user_edit_post.php";
                           break;
                           //     // case '200':
                           //     // echo "Nice 200";
                           //     // break;
                           
                           // default:
                           //     include "includes/view_all_posts.php";
                           //     break;
                       }





                       ?>
                


               
            </div>


            <!-- Blog Sidebar Widgets Column -->
<?php 
include "includes/sidebar.php";
?>
           
        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
<?php 
include "includes/footer.php";
?>
</div>


</body>

</html>
