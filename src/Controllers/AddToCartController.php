<?php
use App\Models\Cart;

$cart = new Cart;

function add() {
    $cart = new Cart;
    $cart->addProduct($_GET['id']);
    header('Location: /fournil/index.php?page=home');
    exit;
}


require_once 'src/Views/addtocart.php';

