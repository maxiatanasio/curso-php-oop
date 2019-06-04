<?php

class Connection extends PDO {

	public function __construct() {
		global $config;
		try {
			if(!isset($config['database'])) {
				throw new Exception('database field missing in config file');
			}
			$database = $config['database'];
		
			parent::__construct("mysql:host={$database['host']};dbname={$database['database']}", $database['username'], $database['password']);
		} catch (Exception $e) {
			echo json_encode([
				'error' => $e->getMessage()
			]);
			exit;
		}
	}

}