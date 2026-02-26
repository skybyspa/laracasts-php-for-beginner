<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a valid password';
}

if (! empty($errors)) {
    return view ('session/create.view.php', [
        'errors' => $errors
    ]);
}


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// Match the user
if ($user) {
    // Match the password
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /websites/demo/');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);


