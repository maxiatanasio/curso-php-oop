<?php

require __DIR__ . '/classes/MysqlConnection.php';
// require( __DIR__ . '/mySQLExtend.class.php');

$operation = $_GET['action'] ?? 'get';

try {
    $mysql = new MySQLConnection("localhost", "notesdb", "root", "");

    switch($operation) {
        case 'get' : 
            $mysql->query('select * from notes');
            print_r($mysql->arrayFromResult());
            var_dump($mysql->getRowsNum());
        break;
        case 'add' :
            $randomNumber = rand(0,1000);
            $mysql->query("insert into notes (title, body) values ('Titulo - {$randomNumber}','Cuerpo de la nota')"); 
            echo "Note $randomNumber added";
        break;
        default: 
    }
} catch (DatabaseException $e) {
    echo $e->get();
}