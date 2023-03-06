<?php

use App\Models\ProductsModel;
use App\Config\FormManager;

$productsModel = new ProductsModel;

$content = FormManager::addProduct();

require 'Views/create-product.php';