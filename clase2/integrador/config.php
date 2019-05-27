<?php

function mi_autocargador($clase) {
    include 'classes/' . $clase . '.php';
}

spl_autoload_register('mi_autocargador');