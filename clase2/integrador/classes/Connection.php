<?php

class Connection extends PDO{

    public function __construct($host, $database, $user, $password)
    {
        try {
            $db = parent::__construct("mysql:host={$host};dbname={$database}", $user, $password);
          } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
            exit();
          }
    }

}