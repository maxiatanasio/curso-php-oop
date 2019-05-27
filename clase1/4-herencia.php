<?php

class Persona {
    public $nombre;
    public $nacimiento;

    public function getEdad() {
        $date2 = $this->nacimiento->diff(new DateTime());
        
        return $date2->y.' years'."\n";
    }
}

class Cantante extends Persona {
    public $discos;

    public function cantar() {
        echo "Shalalala"; 
    }

    public function getCantidadDiscos() {
        return count($this->discos);
    }

}

class CantanteOpera extends Cantante {
    public function entonar() {
        echo "AAAAAAAAA";
    }
}

// 1 Sabiendo la edad de una persona
$juan = new Persona();
$juan->nombre = "Juan";
$juan->nacimiento = new DateTime('1990-08-19');

echo $juan->getEdad();

// 2 Cantante
$shakira = new Cantante();
$shakira->nombre = "Shakira";
$shakira->nacimiento = new DateTime('1978-01-02');

echo $shakira->getEdad();
$shakira->cantar();

// 3 alumno
$pavarotti = new CantanteOpera();
$pavarotti->nombre = 'Pavarotti';
$pavarotti->nacimiento = new DateTime('1967-12-12');

$pavarotti->entonar();