<?php

const AVAILABLE_ROUTES = [
    "index" => "HomeController.php",
    "home" => "HomeController.php",
    "sign-up" => "SignUpController.php",
    "sign-in" => "SignInController.php",
    "logout" => "LogoutController.php",
    "addtocart" => "AddToCartController.php",
    "cart" => "CartController.php",
];

function getRoute(): string
{
    $defaultControllerPath = "src/Controllers/";
    $routesName = array_keys(AVAILABLE_ROUTES);
    $path = realpath($defaultControllerPath . AVAILABLE_ROUTES["index"]);

    if (isset($_GET["page"]) && in_array($_GET["page"], $routesName, true)) {
        $path = realpath($defaultControllerPath . AVAILABLE_ROUTES[$_GET["page"]]);
    }
    // var_dump($defaultControllerPath . AVAILABLE_ROUTES[$_GET["page"]]);
    return $path;

} 
