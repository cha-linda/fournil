<?php
use App\Config\FormManager;

$content = FormManager::logoutAdmin();

require_once 'Views/logout-admin.php';
