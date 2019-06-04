<?php

/**
 * Visibilidad de los metodos y propiedades
 * Public, Private, Protected
 */

abstract class Ser {
  public $nombre;
  private $fecha_nacimiento;

  public function __construct($nombre, $fecha_nacimiento)
  {
    $this->nombre = $nombre;
    $this->fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $fecha_nacimiento);
  }

  /**
   * Como queremos que este metodo sea privado pero visible para las clases que heredan
   * entonces tenemos que ponerles como protected
   */
  final protected function edad() {
    return $this->fecha_nacimiento->diff(new DateTime());
  }
  
}

class Persona extends Ser {

  public $apellido;

  public function __construct($nombre, $fecha_nacimiento, $apellido)
  {
    parent::__construct($nombre, $fecha_nacimiento);
    $this->apellido = $apellido;
  }

  public function saludar() {
    echo "Hola, mi nombre es $this->nombre $this->apellido";
  }

  public function decimeTuEdad() {
    $edad = $this->edad();
    echo "Tengo {$edad->y} años";
  }

  /**
   * Como yo no quiero que el usuario tenga acceso a esta funcion
   * Entonces deberia hacerla privada
   */
  // private function edad() {
  //   return $this->fecha_nacimiento->diff(new DateTime());
  // }

  /**
   * Como el metodo es final, entonces no se puede sobreescribir
   */
  protected function edad(){}

}

$german = new Persona('German', '16/05/1991', "Perez");
$german->saludar();
$german->decimeTuEdad();
//$german->edad(); //Esto me va a generar un FATAL ERROR