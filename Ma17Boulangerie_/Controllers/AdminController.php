<?php
use App\Models\UsersModel;
use App\Config\FormManager;
use App\Models\ProductsModel;

$usersModel = new UsersModel;

$productsModel = new ProductsModel;

$products = $productsModel->findAll();

$content = FormManager::loginAdmin();

require_once 'Views/admin.php';