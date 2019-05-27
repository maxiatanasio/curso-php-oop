<?php

class DatabaseException extends Exception {

    public function __construct($connection, $code = null) {
        $error = $connection->getError() ?? $connection->error ?? $connection->connect_error;
        $message = "There was a problem with the database: $error";
        parent::__construct($message, $code);
    }

}