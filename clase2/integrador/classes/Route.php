<?php

class Route {

    /**
     * var string
     */
    private $action;

    /**
     * var Object
     */
    private $handler;

    public function __construct(string $action, $handler)
    {
        $this->action = $action;
        $this->handler = $handler;
    }

    public function getAction() {
        return $this->action;
    }

    public function getHandler() {
        return $this->handler;
    }

}