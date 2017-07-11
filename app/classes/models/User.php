<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 03.07.17
 * Time: 17:42
 */

namespace Marten\classes\models;

class User extends Model
{

	public function getUserByEmail(String $email = NULL) : array
	{
		$SQL = 'SELECT * FROM users WHERE email = :email';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute(
			[':email' => $email]
		);

		$user = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		return $user;
	}

}