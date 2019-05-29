<?php

class UserDB {

    private $connection;

    public function __construct()
    {
        global $config;

        $this->connection = new Connection(
            $config['database']['host'],
            $config['database']['database'],
            $config['database']['username'],
            $config['database']['password']
        );
    }

    public function add() {

    }

    public function getAll(){
        $result = $this->connection->query('select * from users');
        return $result->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public function get() {

    }

    public function  delete() {

    }

    public function update() {

    }



}