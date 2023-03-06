<?php

use App\Models\UsersModel;
use App\Config\FormManager;

$usersModel = new UsersModel;

$content = FormManager::login();

require_once 'src/Views/sign-in.php';
