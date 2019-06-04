<?php 

class User {
	private $id;
	private $username;
	private $name;
	private $email;
	private $password;
	private $created_at;

	public function getId() {
		return $this->id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getCreatedAt() {
		return $this->created_at;
	}

}