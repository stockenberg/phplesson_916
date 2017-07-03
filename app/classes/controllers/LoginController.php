<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:53
 */

require_once CLASSES . 'models/User.php';

class LoginController
{

	private $request;
	private $status = [];


	public function run() {

		$this->request = array_merge($_GET, $_POST);

		switch ($this->request['action'] ?? ''){
			case 'login':
				if($this->validateLoginForm($_POST)){
					// log me in
					$user = new User();
					$userData = $user->getUserByEmail($_POST['email'] ?? '');

					print_r($userData);
				}
				break;
		}

	}

	public function validateLoginForm(Array $post = []) : bool
	{
		print_r($post);
		if(isset($post['login'])){
			if($post['email'] == ''){
				$this->setStatus('email', 'Bitte E-Mail-Adresse eingeben!');
			}

			if($post['password'] == ''){
				$this->setStatus('password', 'Bitte Passwort eingeben!');
			}

			if(empty($this->getStatus())){
				return true;
			}

		}

	}
	/**
	 * @return array
	 */
	public function getStatus(): array
	{
		return $this->status;
	}

	/**
	 * @param String $key
	 * @param String $error
	 */
	public function setStatus(String $key, String $error)
	{
		$this->status[$key] = $error;
	}



}