<?php

namespace project\Controllers;

use Framework\DatabaseTable;

class Employee
{
    public function __construct(public DatabaseTable $employeeTable)
    {

    }

    public function list()
    {
        $employees = $this->employeeTable->find('rol', 'empleado');
        return [
            'title' => 'Listado de Empleados',
            'template' => 'employeelist.html.php',
            'variables' => [
                'employees' => $employees
            ]
        ];
    }
}