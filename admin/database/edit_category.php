<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $slug = $_POST['slug'];


        $conn->query("UPDATE `categories` SET `category_name`='$name',`category_slug`='$slug' WHERE id = $id");

        if($conn->error){
            echo $conn->error;
        }
        else {
            echo "<script>window.location.replace('./categories.php');</script>";
        }
    }
?>