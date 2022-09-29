<?php
    include './database/db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $product_desc = $_POST['product_desc'];
        $stock = $_POST['stock'];
        $category_id = $_POST['category'];
        $product_id = $_POST['product_id'];


        $conn->query("UPDATE `products` SET `category_id`='$category_id',`name`='$name',`price`='$price',`product_desc`='$product_desc',`stock`='$stock' WHERE id = $product_id");

        if($conn->error){
            echo 'Please talk to shair hassan web master: ' . $conn->error;
        }
        else {
            echo '<script>window.location.replace("./products.php");</script>';
        }
    }