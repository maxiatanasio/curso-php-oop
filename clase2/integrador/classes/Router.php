<?php


class Router {

    private $routes;

    public function __construct()
    {

        global $routes;

        foreach($routes as $action => $handler) {
            $this->routes[] = new Route($action, $handler);
        }
    }

    public function handleRequest() {
        $this->setContentType();

        $actionRequested = $_GET['action'];
        
        foreach($this->routes as $route) {
            if($route->getAction() == $actionRequested) {
                $result = ($route->getHandler())();
            }
        }

        echo json_encode($result);

    }

    private function setContentType() {
        header('Content-Type: application/json');
    }

} 