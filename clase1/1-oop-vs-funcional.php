<?php

/**
 * Se requiere hacer un programa en el cual dado un auto
 * queremos que el mismo recorra X kilometros a partir de una
 * posicion inicial y una velocidad y nos diga donde termino
 * despues de 10 segundos
 * 
 * Inputs: 
 * Posicion inicial (metros)
 * Velocidad (metros / segundos)
 * 
 */

if(!$_GET['oop']) {
    //Solucion funcional
    $posicionInicial = $_GET['xo'];
    $velocidad = $_GET['v'];
    $auto = 'Fiat 600';

    $posicionFinal = calcularPosicionFinal($posicionInicial, $velocidad);

    echo json_encode(compact('posicionFinal'));

    
} else {
    //Solucion OOP
    $posicionInicial = $_GET['xo'];
    $velocidad = $_GET['v'];

    $auto = new Auto('Fiat 600');
    $auto->setPosicion($posicionInicial);
    $auto->setVelocidad($velocidad);

    $auto->avanzar(10);

    $outputer = new AutoOutputer($auto);
    $outputer->output();

    
}

function calcularPosicionFinal($posicionInicial, $velocidad) {
    return $posicionInicial + ($velocidad * 10);
}

class Auto {
    private $posicion;
    private $velocidad;
    private $modelo;

    public function __construct($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    public function getPosicion() {
        return $this->posicion;
    }

    public function avanzar($segundos) {
        $this->posicion += $this->velocidad * $segundos;
    }

}

class AutoOutputer {

    private $auto;

    public function __construct(Auto $auto) 
    {
        $this->auto = $auto;
    }

    public function output() {
        echo json_encode([
            'posicionFinal' => $this->auto->getPosicion()
        ]);
    }

}