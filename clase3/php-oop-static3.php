<?php

/**
 * La palabra static nos sirve para que un metodo o propiedad pertenezca 
 * a la clase y no a la funcion instanciada
 */

class Robot {

  private $nombre;
  private $modelo;

  public function __construct(string $nombre, string $modelo) 
  {
    $this->nombre = $nombre;
    $this->modelo = $modelo;
  }

}

class RobotStorage {

  private static $robots;

  public static function create(string $nombre, string $modelo) {
    $robot = new Robot($nombre, $modelo);
    self::addRobot($robot);
    return $robot;
  }

  private static function addRobot(Robot $robot) {
    self::$robots[] = $robot;
  }

  public static function getRobots(): array {
    return self::$robots;
  }

}

$robot1 = RobotStorage::create('Alexys','T3000');
$robot2 = RobotStorage::create('Giunda', 'XL65');
$robot3 = RobotStorage::create('Freddix', 'AS400');

$robots = RobotStorage::getRobots();

echo "<pre>";
print_r($robots);
echo "</pre>";