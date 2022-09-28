<?php   

    include './db_connect.php';

    $id = $_GET['id'];


    $result = $conn->query("SELECT thumbnail, pictures FROM products WHERE id = $id");

    $row = $result->fetch_assoc();

    unlink('.'.$row['thumbnail']);

    $pictures = explode(',', $row['pictures']);

    for($i = 0; $i < count($pictures); $i++){
        unlink('.' . $pictures[$i]);
    }

    $conn->query("DELETE FROM products WHERE id = $id");


    if($conn->error){
        echo 'Please Contact Web Master Shair Hassan: ' . $conn->error;
    }
    else {
        echo '<script>window.location.replace("../products.php");</script>';
    }
?>