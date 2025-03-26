<?php
//Ajustar según lo necesario!
namespace project\Controllers;

class Login
{
    public function __construct(private \Framework\Authentication $authentication) {}

    public function login() {
        return [
            'template' => 'login.html.php',
            'title' => 'Inicia sesión'
        ];
    }

    public function loginSubmit() {

        $success = $this->authentication->login(
            $_POST['doc_number'],
            $_POST['password'],
        );
        if ($success) {
            return [
                'template' => 'home.html.php',
                'title' => 'Log In Successful'
            ];
        } else {
            return [
                'template' => 'login.html.php',
                'title' => 'Log in',
                'variables' => [
                    'errorMessage' => true
                ]
            ];
        }
    }

    public function logout() {
        $this->authentication->logout();
        header('location: /');
    }
}

