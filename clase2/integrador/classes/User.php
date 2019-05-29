<?php

class User {

    private $id;
    private $username;
    private $password;
    private $name;
    private $email;
    private $created_at;
    private $updated_at;

    // public function __construct($params)
    // {
    //     foreach($params as $name => $value) {
    //         if(property_exists('User', $name)) {
    //             $this->$name = $value;
    //         }
    //     }
    // }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getId() {
        return $this->id;
    }

}