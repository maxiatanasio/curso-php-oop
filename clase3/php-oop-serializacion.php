<?php

/**
 * Serializar es la transformacion de informacion en cadenas de texto y 
 * viseversa.
 * Se utiliza para lograr persistir los objetos
 * Si logramos que un objeto se transforme en un string entonces es facil
 * guardarlo en una base de datos.
 */

 /**
  * En PHP contamos con los metodos:
  * serialize()
  * unserialize()
  */

class Perro {

  private $nombre;
  private $raza;

  const MESTIZO = 1;

  public function __construct($nombre, $raza)
  {
    $this->nombre = $nombre;
    $this->raza = $raza;
  }

  public function guau() {
    echo "<p>Guau!!!!</p>";
  }

}

$teddy = new Perro('Teddy', Perro::MESTIZO);

$teddy->guau();
$teddy->guau();

$teddyString = serialize($teddy);

echo "<p>";
echo $teddyString;
echo "</p>";

$teddyDeNuevo = unserialize($teddyString);

$teddyDeNuevo->guau();

var_dump($teddy === $teddyDeNuevo);