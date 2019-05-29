<?php

class UserController {

    private $userDB;

    public function __construct()
    {
        $this->userDB = new UserDB();
    }

    public function addHandler() {
        return ["a" => 1];
    }

    public function getAllHandler() {
        $users = $this->userDB->getAll();
        
        $usersTransform = [];
        foreach($users as $user) {

            $usersTransform[] = [
                "id" => $user->getId(),
                "username" => $user->getUsername(),
                "email" => $user->getEmail()
            ];
        }

        return ["users" => $usersTransform];
    }

    public function getHandler() {

    }

    public function deleteHandler() {

    }

    public function updateHandler() {

    }

}