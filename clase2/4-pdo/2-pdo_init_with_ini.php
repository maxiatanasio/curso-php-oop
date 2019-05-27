<?php

$config = parse_ini_file('dev.ini', true);

echo "<pre>";
print_r($config);
echo "</pre>";

$dbconfig = $config['database'];

try {
  $conn = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']}", $dbconfig['user'],$dbconfig['pass']);
} catch (PDOException $ex) {
  echo $e->get_message();
}

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try {
  $stmt = $conn->query("select * from notes");
  //Aca puedo mostrar cualquier de los 2 ejemplos
  foreach($stmt as $note){
    echo "<div>{$note['title']}</div>";
  }
  while($note = $stmt->fetchObject()){
    echo "<div>{$note->title}</div>";
  }
} catch(PDOException $ex) {
  echo $e->get_message();
}