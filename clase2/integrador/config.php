<?php

function mi_autocargador($clase) {
    include 'classes/' . $clase . '.php';
}

spl_autoload_register('mi_autocargador');

$config = [
    'database' => [
        'host' => '127.0.0.1',
        'database' => 'notesdb',
        'username' => 'root',
        'password' => ''
    ]
];