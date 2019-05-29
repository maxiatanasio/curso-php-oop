<?php

$userController = new UserController();

$routes = [
    'add' => function () use ($userController) {
        return $userController->addHandler();
    },
    'getAll' => function () use ($userController) {
        return $userController->getAllHandler();
    },
    'get' => function () use ($userController) {
        return $userController->getHandler();
    },
    'delete' => function () use ($userController) {
        return $userController->deleteHandler();
    },
    'update' => function () use ($userController) {
        return $userController->updateHandler();
    }
];