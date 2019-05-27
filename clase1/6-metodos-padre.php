<?php

class Armadura {

    public $energia;
    public $carga;
    public $indiceAtaque = 0.5;

    public function cargarEnergia() {
        $this->energia += $this->carga;
    }

    public function usarEnergia() {
        $this->energia = 0;
    }

    public function calcularAtaque() {
        return $this->energia * $this->indiceAtaque;
    }

    public function atacar() {
        $ataque = $this->calcularAtaque();
        $this->usarEnergia();
        return $ataque;
    }

}

class ArmaduraElectrica extends Armadura {
    public $energiaElectrica;

    public function cargarEnergia()
    {
        parent::cargarEnergia();
        $this->energiaElectrica += $this->carga;
    }

    public function usarEnergia()
    {
        parent::usarEnergia();
        $this->energiaElectrica = 0;
    }

    public function calcularAtaque()
    {
        return $this->energia * $this->indiceAtaque + $this->energiaElectrica;
    }

}

// 1 Utilizando la armadura
$pegazo = new Armadura();
$pegazo->energia = 50;
$pegazo->carga = 10;

$pegazo->cargarEnergia();
$pegazo->cargarEnergia();
$pegazo->cargarEnergia();

echo $pegazo->atacar();

echo "<br/>";

// 2 Utilizando armadura electrica
$armaduraThor = new ArmaduraElectrica();
$armaduraThor->energia = 100;
$armaduraThor->energiaElectrica = 70;
$armaduraThor->carga = 10;

echo $armaduraThor->atacar();