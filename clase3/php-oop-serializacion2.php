<?php

/**
 * Existe 2 metodos magicos en PHP para poder manejar que sucede aca:
 * __sleep()
 * __wakeup()
 */

 /**
  * En este caos en particular, no tiene sentido que guarde la conexion ya que la misma tiene que
  * volver a ser generada si vuelvo a cargar el objeto
  */
class Conexion {

  private $host;
  private $dbname;
  private $user;
  private $pass;
  private $conn;

  public function __construct($host, $dbname, $user, $pass) {
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->pass = $pass;

    $this->connect();
  }

  private function connect() {
    $this->conn = 'Conexion particular' . rand(0,1000); //ALGUNA FUNCION QUE CONECTE A LA BASE
  }

  public function __sleep()
  {
    return array('host','dbname','user','pass');
  }

  public function __wakeup()
  {
    $this->connect();
  }

}

$conn = new Conexion('localhost', 'notes', 'root', '');

echo "<pre>";
var_dump($conn);
echo "</pre>";

$connString = serialize($conn);

echo "<pre>";
var_dump($connString);
echo "</pre>";

$conn2 = unserialize($connString);

echo "<pre>";
var_dump($conn2);
echo "</pre>";
