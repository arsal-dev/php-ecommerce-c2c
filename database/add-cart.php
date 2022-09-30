<?php

include './db_connect.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $cart = [];

    if (isset($_COOKIE["cart"])) {
        $cart = json_decode($_COOKIE["cart"]);
        array_push($cart, array(
            'id' => $id,
            'quantity' => 1,
            'name' => $name
        ));
        setcookie("cart", json_encode($cart), time() + 86400, '/');
        header('Location: ../index.php');
    } else {
        array_push($cart, array(
            'id' => $id,
            'quantity' => 1,
            'name' => $name
        ));
        setcookie("cart", json_encode($cart), time() + 86400, '/');
        header('Location: ../index.php');
    }
}