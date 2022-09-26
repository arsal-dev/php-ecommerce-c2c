<?php   

        include './database/db_connect.php';

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $slug = $_POST['slug'];

            if(empty($name)){
                $error = "Please Enter Category Name";
            }
            elseif(empty($slug)){
                $error = "Please Enter Category Slug";
            }
            else {
                $conn->query("INSERT INTO `categories` (`category_name`, `category_slug`) VALUES ('$name', '$slug')");

                if($conn->error){
                    $error = "There was a DB error Please contact Web Master -> " . $conn->error;
                }
                else {
                    // header('Location: categories.php');
                    echo "<script>window.location.replace('./categories.php');</script>";
                }
            }
        }    
    ?>