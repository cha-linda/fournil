<?php
use App\Models\Cart;
use App\Config\FormManager;

$infos = FormManager::checkout();

$cart = new Cart;

$count = array_sum($_SESSION['cart']);

if(empty($_SESSION['cart'])) {
    $products = [];
} else {
    $products = $cart->display();
}

if (isset($_GET['del'])) {
    unset($_SESSION['cart'][$_GET['del']]);
    header('Location: /fournil/index.php?page=cart');
    exit;
}

if (isset($_GET['cancel'])) {
    unset($_SESSION['cart']);
    header('Location: /fournil/index.php?page=cart');
}

// var_dump($_SESSION['cart']);
// var_dump(array_keys($products));

require_once 'src/Views/cart.php';