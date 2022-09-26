<?php 
    include './database/db_connect.php';
    $result = $conn->query("SELECT * FROM categories");
?>