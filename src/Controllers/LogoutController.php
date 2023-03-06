<?php

use App\Models\UsersModel;
use App\Config\FormManager;

$usersModel = new UsersModel;

$content = FormManager::logout();
// var_dump($_SESSION['user']);

require_once 'src/Views/logout.php';
