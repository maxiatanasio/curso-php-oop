<?php

class UserDB {

	private $connection;

	public function __construct() {
		$this->connection = new Connection();
	}

	public function getAll() {
		$result = $this->connection->query('select * from users');
		return $result->fetchAll(PDO::FETCH_CLASS, 'User');
	}

	public function get($id) {
		$result = $this->connection->query('select * from users where id = ' . $id);
		return ($result->fetchAll(PDO::FETCH_CLASS, 'User'))[0];
	}

}