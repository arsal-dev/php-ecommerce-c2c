<?php
include './database/db_connect.php';
session_start();
unset($_SESSION['id']);
session_destroy();
header('Location: ./signin.php');
?>