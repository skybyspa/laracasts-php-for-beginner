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
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

// check if account exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // Someone with the email already exists
    // If yes, redirect to a login page
    header('location: /website/demo/');
    exit();
}

else {
    // If no, save one to the database and then log the user in and redirect
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        // Never store password as cleartext. Hash first
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('location: /websites/demo/');
    exit();
}


