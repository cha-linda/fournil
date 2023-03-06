<?php
use App\Models\UsersModel;
use App\Config\FormManager;

$usersModel = new UsersModel;

$content = FormManager::loginAdmin();

require_once 'Views/login-admin.php';
