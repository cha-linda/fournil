<?php
const AVAILABLE_ROUTES = [
    "index" => "LoginAdminController.php",
    "login-admin" => "LoginAdminController.php",
    "logout-admin" => "LogoutAdminController.php",
    "admin" => "AdminController.php",
    "create-product" => "CreateProductController.php",
    "delete-product" => "DeleteProductController.php",
    "edit-product" => "EditProductController.php",
];

function getRoute(): string
{
    $defaultControllerPath = "Controllers/";
    $routesName = array_keys(AVAILABLE_ROUTES);
    $path = realpath($defaultControllerPath . AVAILABLE_ROUTES["index"]);

    if (isset($_GET["page"]) && in_array($_GET["page"], $routesName, true)) {
        $path = realpath($defaultControllerPath . AVAILABLE_ROUTES[$_GET["page"]]);
    }
    return $path;
}
