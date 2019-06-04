<?php

class Route {

	private $action;
	private $controller;
	private $method;

	public function __construct($action, $controller, $method) {
		$this->action = $action;
		$this->controller = $controller;
		$this->method = $method;
	}

	public function getAction() {
		return $this->action;
	}

	public function getController() {
		return $this->controller;
	}

	public function getMethod() {
		return $this->method;
	}

}