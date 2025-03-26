<?php
namespace project\Controllers;
use Framework\DatabaseTable;

class Lodgement
{
    public function __construct(public DatabaseTable $lodgementTable)
    {

    }
//PARA HACER: Detalle de cada hospedaje
    public function list() {
        $lodgements = $this->lodgementTable->findAll();
        return [
            'title' => 'Reservas',
            'template' => 'lodgmentlist.html.php',
            'variables' => [
                'lodgements' => $lodgements
            ]
        ];
    }
}