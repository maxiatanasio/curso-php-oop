<?php

$config = parse_ini_file('dev.ini', true);

$dbconfig = $config['database'];

try {
  $conn = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']}", $dbconfig['user'],$dbconfig['pass']);
} catch (PDOException $ex) {
  echo $e->get_message();
}

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

try {
  
  $newNotes = [];
  for($i = 0; $i < 10; $i++) {
    $newNotes[] = ["title" => "Note Nro " . rand(0,1000), "body" => "Cuerpo de la nota"];
  }

  $stmt = $conn->prepare("insert into notes (title, body) values (:title, :body)");
  $title = "";
  $body = "";
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':body', $body);

  $conn->beginTransaction();
  foreach($newNotes as $newNote) {
    $title = $newNote['title'];
    $body = $newNote['body'];
    $stmt->execute();
    //Fijarse que por la forma de laburar de la base de datos,
    //se siguen sumando intentos.
    echo "Se intento agregar el ID ".$conn->lastInsertId();
  }
  //Lo interesante de eso, es que con que exista un solo error, ya todo se vuelve 
  //para atras
  $conn->query("select * fomfesf");
  $conn->commit();
  echo "<h1>Han sido creadas 10 notas</h1>";

} catch (PDOException $ex) {
  $conn->rollBack();
  echo "<div>{$ex->getMessage()}</div>";
}