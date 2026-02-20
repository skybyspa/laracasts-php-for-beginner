<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/websites/demo/' => 'controllers/index.php',
    '/websites/demo/about' => 'controllers/about.php',
    '/websites/demo/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($statusCode = 404) {
    http_response_code(404);

    require "views/{$statusCode}.php";

    die();
}

routeToController($uri, $routes);
