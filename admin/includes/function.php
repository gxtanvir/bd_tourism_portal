
<?php

function confirmQuery($result)
{
	global $connection;
	if(!$result)
	{
		die("Query Failed".mysqli_error($connection));
	}
}

function insert_categories()
{
	global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
         
        $sql="SELECT * FROM categories WHERE cat_title = '{$cat_title}'";

        $res=mysqli_query($connection,$sql);

        if (mysqli_num_rows($res) > 0) {
                
            $row = mysqli_fetch_assoc($res);
            if($cat_title==isset($row['cat_title']))
                {
                    echo "<p> <font color=red>*Categories already exists</font> </p>";
                }
                
        }
           else
           {
                if($cat_title=="" || empty($cat_title))
                {
                    echo "<p> <font color=red>*This field should not be empty</font> </p>";
                }
                else
                {
                    $query="INSERT INTO categories (cat_title) VALUES('{$cat_title}')";
                    $create_category_query = mysqli_query($connection,$query);

                    if(!$create_category_query)
                    {
                        die("Query failed" . mysqli_error($connection));
                    } 
                }  
           }
    }
}




function findAllCategories()
{
global $connection;
$query= "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

while ($row=mysqli_fetch_assoc($select_categories)) {

    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
}
}


function deleteCategories()
{
global $connection;
if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");
}
}


?>