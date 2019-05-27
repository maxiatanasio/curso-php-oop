<?php

class Persona {

    public $nombre;
    public $apellido;

    public function getNombreCompleto() {
        return $this->nombre . " " . $this->apellido;
    }

}

//---------------------------//
// 1 - Atributos
$maxi = new Persona();
$maxi->nombre = 'Maxi';
$maxi->apellido = 'Atanasio';

$rodrigo = new Persona();
$rodrigo->nombre = 'Rodrigo';
$rodrigo->apellido = 'Finamore';

echo "El profesor se llama $maxi->nombre";
echo "<br />";
echo "El alumno se llama $rodrigo->nombre";
echo "<br />";

// 2 - Mostremos nombre completo
$telma = new Persona();
$telma->nombre = "Telma";
$telma->apellido = "Farango";

echo $telma->nombre . " " . $telma->apellido;
echo "<br />";
echo $maxi->nombre . " " . $maxi->apellido;
echo "<br />";
echo $rodrigo->nombre . " " . $rodrigo->apellido;
echo "<br />";

// 3 - Mejorando el 2
echo $telma->getNombreCompleto();
echo "<br />";
echo $maxi->getNombreCompleto();
echo "<br />";
echo $rodrigo->getNombreCompleto();
echo "<br />";