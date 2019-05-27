<?php

class DependencyManager {

    private $dependencies = [];

    public function add($name, $dependency) {
        $this->dependencies[$name] = $dependency;
    }

    public function get($name) {
        return $this->dependencies[$name];
    }

}