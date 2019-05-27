<?php

require ('./DatabaseException.class.php');

class MysqlConnectionEvolved extends mysqli {

    public $error;
    private $lastQuery;
    private $lastResultSet;
    
    public function __construct($host, $database, $user, $password) {
        @parent::__construct($host, $user, $password, $database);
        if(mysqli_connect_errno()) {
            throw new DatabaseException($this, 1);
        }
    }

    public function query($query, $resultmode = null){
        $this->lastQuery = $query;
        $this->lastResultSet = @parent::query($query);
        if(!$this->lastResultSet) {
            throw new DatabaseException($this, 2);
        }
        return $this->lastResultSet;
    }

    public function arrayFromResult() {
        $result = [];
        while($result[] = $this->lastResultSet->fetch_assoc());
        return $result;
    }

    public function getRowsNum() {
        return $this->lastResultSet->num_rows;
    }

    function __destroy() {
        $this->close();
    }

    public function getError(){
        return $this->error;
    }

}