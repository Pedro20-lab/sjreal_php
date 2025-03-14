<?php
namespace  project;

use Framework\Authentication;

class SjrealWebsite implements \Framework\Website
{

    private \Framework\Authentication $authentication;
    private \Framework\DatabaseTable $userTable;

    public function __construct()
    {
        $pdo = new \PDO('mysql:host=mysql;dbname=sjreal;charset=utf8mb4', 'v.je', 'v.je');
        $this->userTable = new \Framework\DatabaseTable($pdo, 'users', 'id');
        $this->authentication = new \Framework\Authentication($this->userTable, 'doc_number', 'password');

    }

    public function getLayoutVariables(): array
    {
        return [
            'loggedIn' => $this->authentication->isLoggedIn()
        ];
    }

    public function getDefaultRoute(): string
    {
        return 'user/login';
    }

    public function getController(string $controllerName): ?object
    {

        $controllers = [
            'user' => new \project\Controllers\User($this->userTable, $this->authentication)
        ];

        return $controllers[$controllerName] ?? null;
    }

    public function checkLogin(string $uri): ?string
    {

        /*$restrictedPages = [

        ];

        if (isset($restrictedPages[$uri])) {
            if (!$this->authentication->isLoggedIn()
                || !$this->authentication->getUser()->hasPermission($restrictedPages[$uri])) {
                header('location: /user/login');
                exit();
            }
        }

        return $uri;*/
        return  'On testing';
    }

}
