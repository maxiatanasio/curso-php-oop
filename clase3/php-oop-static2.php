<?php

/**
 * La palabra static nos sirve para que un metodo o propiedad pertenezca 
 * a la clase y no a la funcion instanciada
 */

/**
 * Ahora en vez de guardarlo en la clase robot, voy a usar otra clase
 * como la contenedora de esta informacion y asi separar responsabilidades
 */

class Robot {

  private $nombre;
  private $modelo;

  public function __construct(string $nombre, string $modelo) 
  {
    $this->nombre = $nombre;
    $this->modelo = $modelo;

    RobotStorage::addRobot($this);
  }

}

class RobotStorage {

  private static $robots;

  public static function addRobot(Robot $robot) {
    self::$robots[] = $robot;
  }

  public static function getRobots(): array {
    return self::$robots;
  }

}

$robot1 = new Robot('Alexys','T3000');
$robot2 = new Robot('Giunda', 'XL65');
$robot3 = new Robot('Freddix', 'AS400');

$robots = RobotStorage::getRobots();

echo "<pre>";
print_r($robots);
echo "</pre>";