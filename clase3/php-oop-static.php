<?php

/**
 * La palabra static nos sirve para que un metodo o propiedad pertenezca 
 * a la clase y no a la funcion instanciada
 */

/**
 * Supongamos que yo tengo una clase Robot y yo quiero de alguna manera
 * poder tener una referencia a todos los robots que fueron creados.
 * Esta propiedad pertenece especificamente a la clase Robot y no a cada
 * robot, ya que cada robot en si no esta interesado en eso. 
 */

class Robot {

  private static $robots;

  private $nombre;
  private $modelo;

  public function __construct(string $nombre, string $modelo) 
  {
    $this->nombre = $nombre;
    $this->modelo = $modelo;

    Robot::addRobot($this);
  }

  private static function addRobot($robot) {
    Robot::$robots[] = $robot;
  }

  public static function getRobots() {
    return Robot::$robots;
  }

}

$robot1 = new Robot('Alexys','T3000');
$robot2 = new Robot('Giunda', 'XL65');
$robot3 = new Robot('Freddix', 'AS400');

$robots = Robot::getRobots();

echo "<pre>";
print_r($robots);
echo "</pre>";