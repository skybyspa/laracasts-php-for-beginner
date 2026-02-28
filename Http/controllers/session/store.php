<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/websites/demo/');
    }
    $form->error('email', 'No matching account found for that email address and password.');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
    // Don't manually repopulate password
    'email' => $_POST['email'],
    ]
);


return redirect('/websites/demo/login');





