<?php 



$request = $_SERVER['REQUEST_URI'];


$routes = [
    '/ShopCoffee/' => 'views/home.php',
    '/ShopCoffee/login' => 'controllers/auth/loginController.php',
    '/ShopCoffee/register' => 'controllers/auth/registerController.php',
];

function Route($request, $routes) {
    if (array_key_exists($request, $routes)) {
        require($routes[$request]);
    } else {
        warning();
    }
}

function warning($code = 404) {
    http_response_code($code);

    require "{$code}.php";

    die();
}

Route($request, $routes);