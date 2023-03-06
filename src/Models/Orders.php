<?php
namespace App\Models;

use App\Models\Model;

class Orders extends Model {

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            if (!isset($_SESSION['order'])) {
                $_SESSION['order'] = [];
            }
        } else {
            $_SESSION['notice'] = 'Vous devez vous connecter pour commander.';
            header('Location: /fournil/index.php?page=sign-in');
            exit;
        } 


    }

}
