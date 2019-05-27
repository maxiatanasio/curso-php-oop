<?php

$conn = new mysqli('127.0.0.1', 'root', '12345678');

if($conn->connect_error){
  throw new Exception($conn->connect_error);
}

$stmt = $conn->query('show databases');

$dbs = $stmt->fetch_all();

echo "<pre>";
print_r($dbs);
echo "</pre>";