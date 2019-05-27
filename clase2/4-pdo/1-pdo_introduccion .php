<?php

foreach (PDO::getAvailableDrivers() as $driver) {
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
  "host" => '127.0.0.1',
  "user" => 'root',
  'password' => '12345678',
  'database' => 'notesapp'
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
    getNotes();
    break;
  case 'add':
    addNote();
    break;
  default:
    getNotes();
}

function getNotes()
{
  global $db;
  foreach ($db->query("select * from notes") as $note) {
    echo "Note: {$note['title']} </br>";
  }
}

function addNote() {
  global $db;
  $randomNumber = rand(0, 1000);
    $db->exec("insert into notes (title, body) values ('Titulo - {$randomNumber}','Cuerpo de la nota')");
    echo "Note $randomNumber added";
}




$db = null; //Cierra la conexion