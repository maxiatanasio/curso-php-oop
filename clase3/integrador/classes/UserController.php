<?php
class UserController  extends Controller{

	private $userDB;

	public function __construct($request) {
		parent::__construct($request);
		$this->userDB = new UserDB;
	}

	public function all() {
		$users = $this->userDB->getAll();

		$usersResult = [];

		foreach($users as $user) {
			$usersResult[] = [
				'id' => $user->getId(),
				'username' => $user->getUsername(),
				'createdAt' => $user->getCreatedAt()
			];
		}

		return [
			'users' => $usersResult
		];
	}

	public function get() {
		$data = $this->request->getData();
		$user = $this->userDB->get($data['id']);

		$userResult = [
			'id' => $user->getId(),
			'username' => $user->getUsername(),
			'createdAt' => $user->getCreatedAt()
		];

		return [
			'user' => $userResult
		];
	}

}