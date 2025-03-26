<?php
namespace  project;

use Framework\Authentication;

class SjrealWebsite implements \Framework\Website
{

    private \Framework\Authentication $authentication;
    private \Framework\DatabaseTable $userTable;
    private \Framework\DatabaseTable $lodgementTable;
    private  \Framework\DatabaseTable $stockTable;
    private \Framework\DatabaseTable $parkingTable;


    public function __construct()
    {
        $pdo = new \PDO('mysql:host=mysql;dbname=sjreal;charset=utf8mb4', 'v.je', 'v.je');
        $this->userTable = new \Framework\DatabaseTable($pdo, 'users', 'id');
        $this->authentication = new \Framework\Authentication($this->userTable, 'doc_number', 'password');
        $this->lodgementTable = new \Framework\DatabaseTable($pdo, 'hospedajes', 'id:hospedajes');
        $this->stockTable = new \Framework\DatabaseTable($pdo, 'inventarios', 'id_inventario');
        $this->parkingTable = new \Framework\DatabaseTable($pdo, 'parqueaderos', 'id_parqueadero');

    }

    public function getLayoutVariables(): array
    {
        return [
            'loggedIn' => $this->authentication->isLoggedIn()
        ];
    }

    public function getDefaultRoute(): string
    {
        return 'login/login';
    }

    public function getController(string $controllerName): ?object
    {

        $controllers = [
            'user' => new \Project\Controllers\User($this->userTable, $this->authentication),
            'login' => new \Project\Controllers\Login($this->authentication),
            'lodgement' => new \Project\Controllers\Lodgement($this->lodgementTable),
            'stock' => new \Project\Controllers\Stock($this->stockTable),
            'employee' => new \project\Controllers\Employee($this->userTable),
            'parking' => new \project\Controllers\Parking($this->parkingTable),
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
