<?php

namespace project\Controllers;

use Framework\DatabaseTable;

class parking
{
    public function __construct(public DatabaseTable $parkingTable)
    {

    }

    public function list()
    {
        $parkings = $this->parkingTable->findAll();
        return [
            'title' => 'Listado del parqueadero',
            'template' => 'parkinglist.html.php',
            'variables' => [
                'parkings' => $parkings
            ]
        ];
    }
}