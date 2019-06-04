<?php

/**
 * Los objetos en PHP se pueden clonar
 */

class Familia {

  private $miembros;
  private $apellido;

  public function __construct($apellido)
  {
    $this->apellido = $apellido;
  }

  public function agregarMiembro(Persona $persona) {
    $this->miembros[] = $persona;
  }

  public function __clone()
  {
    // for($i = 0; $i < count($this->miembros); $i++) {
    //   $this->miembros[$i] = clone $this->miembros[$i];
    // }

    $this->miembros = array_map(function($miembro) {
      return clone $miembro;
    }, $this->miembros);
  }
}

class Persona {

  private $nombre;

  public function __construct($nombre)
  {
    $this->nombre = $nombre;
  }

}

$maxi = new Persona('Maxi');

$maxi2 = clone $maxi;

echo "<pre>";
var_dump($maxi2);
echo "</pre>";

$familia = new Familia('Educacion IT');
$familia->agregarMiembro($maxi);

echo "<pre>";
var_dump($familia);
echo "</pre>";

$familia2 = clone $familia;

echo "<pre>";
var_dump($familia2);
echo "</pre>";
