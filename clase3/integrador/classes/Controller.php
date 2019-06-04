<?php

abstract class Controller {

	protected $request;

	public function __construct($request) {
		$this->request = $request;
	}

}