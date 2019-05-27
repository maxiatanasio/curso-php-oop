<?php

require (__DIR__ . '../exceptions/DatabaseException.class.php');

class MysqlConnection {
    
    private $connection;
    private $error;
    private $lastQuery;
    private $lastResultSet;
    
    public function __construct($host, $database, $user, $password) {
        $this->connection = @mysqli_connect($host, $user, $password, $database);
        if(!$this->connection) {
            $this->error = mysqli_connect_error();
            throw new DatabaseException($this, 1);
        }
    }

    public function query($query){
        $this->lastQuery = $query;
        $this->lastResultSet = @mysqli_query($this->connection, $query);
        if(!$this->lastResultSet) {
            $this->error = mysqli_error($this->connection);
            throw new DatabaseException($this, 2);
        }
        return $this->lastResultSet;
    }

    public function arrayFromResult() {
        $result = [];
        while($result[] = mysqli_fetch_assoc($this->lastResultSet));
        return $result;
    }

    public function getRowsNum() {
        return mysqli_num_rows($this->lastResultSet);
    }

    function __destroy() {
        mysqli_close($this->connection);
    }

    public function getError(){
        return $this->error;
    }

}