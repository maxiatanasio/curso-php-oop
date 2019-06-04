<?php

class Request {

	private $data;

	public function __construct() {
		$content = file_get_contents("php://input");
		$this->data = json_decode($content,true);
	}

	public function getData() {
		return $this->data;
	}

}