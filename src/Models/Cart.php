<?php

namespace App\Models;

use App\Config\Database;
use App\Models\Model;

class Cart extends Model
{

    public function __construct()
    {

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addProduct($product_id)
    {
        if (isset($_SESSION['user'])) {
            $_SESSION['cart'][$product_id] += 1;
                    } else {
            $_SESSION['notice-cart'] = 'Vous devez vous connecter pour commander';
            header('Location: /fournil/index.php?page=sign-in');
            exit;
        }
    }
}
