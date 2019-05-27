<?php

foreach(PDO::getAvailableDrivers() as $driver) {
    var_dump($driver);
}

/**
 * la habilitacion de drivers se realiza en el PHP INI
 */

 /**
  * Vamos a comenzar con una conexion a una base de datos
  * mysql
  */

$params = [
    "host" => 'localhost',
    "user" => 'root',
    'password' => '',
    'database' => 'notesdb'
];
//Si algo de esto esta mal, entonces tira una excepcion

try {
    $db = new PDO("mysql:host={$params['host']};dbname={$params['database']}", $params['user'], $params['password']);
    echo "Conexion realizada con exito";
} catch (PDOException $e) {
    echo $e->getMessage();
}

$operation = $_GET['action'] ?? 'get';

switch ($operation) {
    case 'get':
    foreach($db->query("select * from notes") as $note) {
        echo "Note: {$note['title']} </br>";
    }
    break;
    case 'add':
    $randomNumber = rand(0,1000);
    $db->exec("insert into notes (title, body) values ('Titulo - {$randomNumber}','Cuerpo de la nota')");
    echo "Note $randomNumber added";
    break;
    default:
    foreach($db->query("select * from notes") as $note) {
        echo "Note: {$note['title']} </br>";
    }
}





$db = null; //Cierra la conexion