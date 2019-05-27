-<?php

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
  //Bindear sin anonimamente o en forma de vector
  $stmt = $conn->prepare("select * from notes where id > :id");
  $noteId = 7;
  $stmt->bindValue(':id',$noteId, PDO::PARAM_INT);

  $stmt->execute();

  foreach($stmt as $note){
    echo "<div>";
    echo $note->title;
    echo "</div>";
  }

  echo "<hr />";

  $noteId = 8;

  $stmt->execute();

  foreach($stmt as $note){
    echo "<div>";
    echo $note->title;
    echo "</div>";
  }

  /**
   * En este caos podemos ver qwue como bindeo por valor
   * entonces cuando cambio la variable no pasa nada
   */

} catch (PDOException $ex) {

}