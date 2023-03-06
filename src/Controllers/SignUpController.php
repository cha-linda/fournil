<?php

use App\Models\UsersModel;
use App\Config\FormManager;

$usersModel = new UsersModel;

$content = FormManager::register();

require_once 'src/Views/sign-up.php';
