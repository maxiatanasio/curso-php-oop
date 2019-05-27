<?php

/**
 * En php podemos lanzar nuestra propias excepciones utilizando
 * throw new Exception(String mensaje) : Exception
 */

//throw new Exception('Mi primera excepcion');
//echo "Esto nunca sera ejecutado";

/**
 * Si bien esto representa una gran utilizada, sobre todo cuando queremos
 * generar buen codigo o inclusive codigo para terceros lo utilicen,
 * no tendria mucho sentido sino existira la posibilidad de "capturar" la excepcion
 * 
 * http://php.net/manual/es/class.exception.php
 */

try {
    //Aca hacemos algo de codigo donde sabemos que existe cierto
    //tipo de excepcion
    throw new Exception('Esto es una excepcion que sera capturada');

    echo "Esta linea de codigo nunca sera ejecutada";
} catch (Exception $ex){
    echo "Ha ocurrido una excepcion: {$ex->getMessage()} </br>";
    echo "Archivo: {$ex->getFile()} </br>";
    echo "Linea: {$ex->getLine()} </br>";
}

echo "Continua el codigo por aca </br>";

/**
 * De esta forma logramos capturar una excepcion que fue lanzada. 
 * Sin embargo no tiene mucho sentido no? Es decir, si lanzamos una
 * excepcion ahi mismo es porque sabemos que un error va a ocurrir,
 * quizas solo con un if podriamos solucionar.
 * ¿Entonces?
 * Generalmente las excepciones se utilizan para informar a los desarrolladores
 * que usan nuestro codigo que un error esta ocurriendo
 */

class DBConnection {

    public function __construct($host, $database, $username, $password){
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->_connect();
    }

    private function _connect() {
        //Intentamos conectar de alguna forma conveniente
        $conectado = false;
        if(!$conectado){
            throw new Exception('Hubo un error en la conexion con la base de datos');
        }
    }

}

function displayException($e) {
    echo "Ha ocurrido una excepcion: {$e->getMessage()} </br>";
    echo "Archivo: {$e->getFile()} </br>";
    echo "Linea: {$e->getLine()} </br>";
}

try {
    $conn = new DBConnection("http://awkdnwakudh.com","testdb","maxi","1234");
} catch (Exception $e) {
    displayException($e);
}

/**
 * Tambien en PHP existe la posibilidad de ejecutar un codigo
 * independientemente si hay exito o no en el intento.
 * Esto se realiza utilizando finally
 */

function getPostData() {
    //Esto puede llegar a hacer un CURL para obtener datos
    //de una API externa
    if(rand(0,10) < 5) {
        throw new Exception('Hubo un problema con el request');
    } else {
        return [
            ["title" => "Titulo 1", "body" => "Body 1"],
            ["title" => "Titulo 2", "body" => "Body 2"],
            ["title" => "Titulo 3", "body" => "Body 3"],
        ];
    }
}

function p($text){
    return "<p>$text</p>";
}

$posts = [];

 try {
    echo p("Trying to get post data");
    $posts = getPostData();
    echo p("post data get");
 } catch (Exception $e){
    displayException($e);
 } finally {
    echo p("Post data intent finish");
 }

 var_dump($posts);
 echo p('');

 /**
  * Como podemos observar, estamos usando una funcion llamada displayException para
  * poder trabajar. PHP nos permite extender la clase Exception para poder
  * crear nuestras propias excepciones
  */

class CustomException extends Exception {

    public function displayError() {
        echo "Ha ocurrido una excepcion: {$this->getMessage()} </br>";
        echo "Archivo: {$this->getFile()} </br>";
        echo "Linea: {$this->getLine()} </br>";
    }

}

function fibonacci($n){
    if($n < 0) {
        throw new CustomException("El parametro tiene que ser mauyor a cero");
        //Es necesario que sea esta clase, sino no va a ser capturada
    }
}

try{
    fibonacci(-1);
} catch (CustomException $e) {
    //de esta manera declaramos que tipo de excepcion estamos queriendo capturar
    $e->displayError();
}

/**
 * Por ultimo lo que podemos hacer con las excepciones es capturar todas las excepciones que no estamos
 * teniendo en cuenta cambiando el handler global
 */

function handleExceptions($ex){
    echo "Ha ocurrido una excepcion: {$ex->getMessage()} </br>";
    echo "Archivo: {$ex->getFile()} </br>";
    echo "Linea: {$ex->getLine()} </br>";
}

set_exception_handler('handleExceptions');

throw new Exception('Esto es una excepcion no controlada');

/**
 * Referencias:
 * https://www.w3schools.com/php/php_exception.asp
 * http://php.net/manual/es/language.exceptions.php
 * 
 */