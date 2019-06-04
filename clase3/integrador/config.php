<?php

function miAutoCargador($clase) {
	include_once __DIR__ . '/classes/' . $clase . '.php';
}

spl_autoload_register('miAutoCargador');

$config = [
	'database' => [
		'host' => 'localhost',
		'database' => 'clase3php',
		'username' => 'root',
		'password' => ''
	]
];