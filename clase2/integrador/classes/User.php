<?php

class User {

    private $username;
    private $password;
    private $name;
    private $email;
    private $createdAt;
    private $updatedAt;

    public function __construct($params)
    {
        foreach($params as $name => $value) {
            if(property_exists('User', $name)) {
                $this->$name = $value;
            }
        }
    }

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
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

}