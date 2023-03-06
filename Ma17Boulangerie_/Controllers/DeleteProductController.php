<?php
use App\Models\ProductsModel;

$product = new ProductsModel;

function suppr() {
    $product = new ProductsModel;
    $product->delete($_GET['id']);
    header('Location: /fournil/Ma17Boulangerie_/index.php?page=admin');
    exit;
}

require 'Views/delete-product.php';