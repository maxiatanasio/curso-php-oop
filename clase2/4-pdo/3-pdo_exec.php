<?php

try {
  $conn = new PDO('mysql:host=127.0.0.1;dbname=notesapp','root','12345678');
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

$sql = "update notes set body = 'Cuerpo de la nota'";

$linesModified = $conn->exec($sql);

echo "<p>$linesModified notas han sido modificadas</p>";

/**
 * Aca se puede explicar que el numero de filas que devuelve
 * no es el numero de de registro que encuentra sino el numero
 * de registros que fueron afectados
 */
