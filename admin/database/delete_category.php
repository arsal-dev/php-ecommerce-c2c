<?php 

    include './db_connect.php';


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn->query("DELETE FROM categories WHERE id = $id");

        if($conn->error)
        {
            echo $conn->error;
        }
        else {
            echo "<script>window.location.replace('../categories.php');</script>";
        }
    }


?>