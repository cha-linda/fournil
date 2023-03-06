<?php
use App\Models\ProductsModel;
use App\Config\FormManager;

$productsModel = new ProductsModel;

$content = FormManager::editProduct($_GET['id']);

require 'Views/edit-product.php';