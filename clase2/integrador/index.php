<?php

require_once __DIR__ . '/config.php';

$dependencies = new DependencyManager();

$connection = new Connection('127.0.0.1', 'notesdb', 'root', '');
$userDB = new UserDB($connection);

$dependencies->add('UserDB', $userDB);

require_once __DIR__ . '/routes.php';

$router = new Router();

$router->handleRequest();


