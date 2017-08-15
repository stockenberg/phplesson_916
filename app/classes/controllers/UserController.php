<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.08.17
 * Time: 16:06
 */

namespace Marten\classes\controllers;


use Marten\classes\App;
use Marten\classes\models\User;
use Marten\classes\Status;

class UserController extends Controller
{

	public $errors
		= [
			'email'    => 'Bitte E-Mail-Adresse eingeben.',
			'username' => 'Bitte Benutzernamen eingeben.',
			'password' => 'Bitte Passwort eingeben',
			'role'     => 'Bitte Status wählen',
		];

	public function run()
	{
		if (isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'create':
					if ($this->validate($_POST, $this->errors)) {
						$user = new User();
						$user_exists = $user->getUserByEmail($_POST['email']);
						if (empty($user_exists)) {
							$user->save($_POST);
							App::redirectTo('edit-users');
						}
						Status::write('error', 'Die E-Mail-Adresse ist bereits in der Datenbank');

					}
					break;

				case 'delete':

					$user = new User();
					$user->delete($_GET['id'] ?? null);

					break;
			}
		}
	}

	public function requestUsers()
	{
		$user = new User();

		return $user->getAllExceptAdmin();
	}

}