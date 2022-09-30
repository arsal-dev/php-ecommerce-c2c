<?php

include './db_connect.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $cart = json_decode($_COOKIE["cart"]);

    $newCart = [];

    foreach($cart as $c) {
        if ($c->id != $id) {
            array_push($newCart, $c);
        }
    }

    setcookie("cart", json_encode($newCart), time() + 86400, '/');
    header('Location: ../index.php');

}