<?php

require_once __DIR__ . '/config.php';

require_once __DIR__ . '/routes.php';

$router = new Router();

$router->handleRequest();


