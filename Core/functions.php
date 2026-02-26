<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($statusCode = 404)
{
    http_response_code(404);

    require base_path("views/{$statusCode}.php");

    die();
}

function authorise($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('/views/' . $path);
}

function login($user)
{
    // Mark that user has logged in
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
    // Log the user out.
    $_SESSION = [];
    session_destroy();

    // Update cookie and set expiration
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}