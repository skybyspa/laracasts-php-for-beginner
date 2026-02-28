<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            // Match the password
            if (password_verify($password, $user['password']))
            {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
    }

    public function login($user)
    {
        // Mark that user has logged in
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }

}