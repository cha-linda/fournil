<?php
use App\Models\ProductsModel;
use App\Models\UsersModel;

if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
    $id = $_SESSION['user']['id'];
    $user = new UsersModel;
    $currentUser = $user->find($id);
    $firstname = $currentUser->firstname;
}

$productsModel = new ProductsModel;
$products = $productsModel->findAll();

// $searchProduct = $productsModel->search();

require_once 'src/Views/home.php';
