<?php

namespace project\Controllers;

use Framework\DatabaseTable;

class Stock
{
    public function __construct(public DatabaseTable $stockTable) {}

    public function list()
    {
        $stocks = $this->stockTable->findAll();
        return [
            'title' => 'Listado de inventarios',
            'template' => 'stocklist.html.php',
            'variables' => [
                'stocks' => $stocks
            ]
        ];
    }
}