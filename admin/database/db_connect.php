<?php

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'ecom';


    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die($conn->error);
?>