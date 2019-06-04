<?php

class Router {

	private $routes = [];

	public function __construct($routes) {
		foreach($routes as $action => $controllerString) {
			list($controller, $method) = explode('@', $controllerString);
			$this->routes[] = new Route($action, $controller, $method);
		}
	}

	public function handleRequest() {

		$this->setContentHeader();

		$action = $_GET['action'];
		$result = false;

		$request = new Request();

		foreach($this->routes as $route) {
			if($route->getAction() == $action) {
				$controller = $route->getController();
				$method = $route->getMethod();
				$result = (new $controller($request))->$method();
			}
		}

		if(!$result) {
			echo json_encode([
				'error' => 'Invalid Action'
			]);
			exit();
		}

		echo json_encode($result);

	}

	private function setContentHeader() {
		header('Content-Type: application/json');
	}

}