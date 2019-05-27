<?php

class UserController {

    private $userDB;

    public function __construct($userDB)
    {
        $this->userDB = $userDB;
    }

    public function addHandler() {
        return ["a" => 1];
    }

    public function getAllHandler() {
        return ["a" => 1];
    }

    public function getHandler() {

    }

    public function deleteHandler() {

    }

    public function updateHandler() {

    }

}