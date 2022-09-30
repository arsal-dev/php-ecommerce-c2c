<?php

include './db_connect.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $cart = json_decode($_COOKIE["cart"]);

    foreach($cart as $c) {
        if ($c->id == $id) {
            $c->quantity = $quantity;
        }
    }

    setcookie("cart", json_encode($cart), time() + 86400, '/');
    header('Location: ../cart.php');

}