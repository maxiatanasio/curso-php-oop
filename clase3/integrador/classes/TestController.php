<?php

class TestController {

	public function test() {
		return [
			'test' => rand(0,1000)
		];
	}

}