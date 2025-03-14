<?php
namespace project\Controllers;
use Framework\Authentication;
use Framework\DatabaseTable;

class User
{
    public function __construct(private DatabaseTable $userTable, private Authentication $authentication)
    { }

    public function registerUser(): array {
        return [
            'template' => 'register.html.php',
            'title' => 'Registrar usuario',
        ];
    }
    public function registerUserSubmit() {
        $user = $_POST['user'];
        /*

        // Start with an empty array
        $errors = [];

        // But if any of the fields have been left blank, write an error to the array
        if (empty($user['name'])) {
            $errors[] = '';
        }

        if (empty($author['email'])) {
            $errors[] = 'Email cannot be blank';
        } else if (filter_var($author['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Invalid email address';
        } else { // If the email is not blank and valid:
            // convert the email to lowercase
            $author['email'] = strtolower($author['email']);

            // Search for the lowercase version of $author['email']
            if (count($this->authorsTable->find('email', $author['email'])) > 0) {
                $errors[] = 'That email address is already registered';
            }
        }

        if (empty($author['password'])) {
            $errors[] = 'Password cannot be blank';
        }*/

        // If there are no errors, proceed with saving the record in the database
        if ( true/*count($errors) === 0*/) {
            // Hash the password before saving it in the database
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

            // When submitted, the $author variable now contains a lowercase value for email
            // and a hashed password
            $this->userTable->save($user);

            header('Location: /user/success');
        } /*else {
            // If the data is not valid, show the form again
            return ['template' => 'register.html.php',
                'title' => 'Register an account',
                'variables' => [
                    'errors' => $errors,
                    'author' => $author
                ]
            ];
        }*/
    }

    public function success()
    {
        return [
            'template' => 'success.html.php',
            'title' => 'Usuario registrado',
        ];
    }

    public function home()
    {
        $user = $this->authentication->getUser();
        return [
            'template' => 'home.html.php',
            'variables' => [
                'user' => $user
            ]
        ];
    }

    public function login()
    {
        return [
            'template' => 'login.html.php',
            'title' => 'Login'
        ];
    }

    public function loginSubmit() {
        $success = $this->authentication->login($_POST['doc_number'], $_POST['password']);

        if ($success) {
            return ['template' => 'loginSuccess.html.php',
                'title' => 'Log In Successful'
            ];
        }
        else {
            return ['template' => 'loginForm.html.php',
                'title' => 'Log in',
                'variables' => [
                    'errorMessage' => true
                ]
            ];
        }

    }

}
