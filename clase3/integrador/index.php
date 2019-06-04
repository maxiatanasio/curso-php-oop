<?php

require_once 'config.php';

require_once 'routes.php';

$router = new Router($routes);

$router->handleRequest();
