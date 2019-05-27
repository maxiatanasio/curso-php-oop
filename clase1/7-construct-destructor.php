<?php

class Heroe {

    public $nombreHeroico;
    public $poder;
    public $vida;

    public function __construct($nombre, $poder, $vida)
    {
        $this->nombreHeroico = $nombre;
        $this->poder = $poder;
        $this->vida = $vida;
    }

    public function recibirAtaque($ataque) {
        $this->vida = $this->vida - $ataque < 0 ? 0 : $this->vida - $ataque ;
        $this->evaluarEstado();
    }

    public function atacar($heroe) {
        $heroe->recibirAtaque($this->poder * 0.5);
    }

    public function mostrarVida() {
        echo $this->nombreHeroico . " tiene " . $this->vida . " de vida.";
        echo "</br>";
    }

    public function evaluarEstado() {
        if($this->vida === 0) {
            echo $this->nombreHeroico . ' ha muerto.';
        }
    }

}

class HeroeDios extends Heroe {

    public function __construct()
    {
        
    }

}

// Utilizando construct y destruct
$hercules = new Heroe('Hercules', 670, 1000);
$thor = new Heroe('Thor', 1500, 3000);

$thor->atacar($hercules);
$hercules->mostrarVida();
$thor->atacar($hercules);
$hercules->mostrarVida();
$thor->atacar($hercules);
$hercules->mostrarVida();
$thor->atacar($hercules);
$hercules->mostrarVida();