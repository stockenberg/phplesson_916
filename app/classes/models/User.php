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

	public function delete(int $user_id)
	{
		$SQL = 'DELETE FROM users WHERE id = :id';
		$this->set($SQL, [':id' => $user_id]);
	}

	public function save(array $post) : void
	{
		$SQL = 'INSERT INTO users 
				(username, email, password, role) 
				VALUES
				(:username, :email, :password, :role)';

		$execute = [
			':username' => $post['username'],
			':email' => $post['email'],
			':password' => password_hash($post['password'], PASSWORD_BCRYPT, ['cost' => 12]),
			':role' => $post['role'],
		];

		$this->set($SQL, $execute);
	}



	public function getAllExceptAdmin()
	{
		$SQL = 'SELECT * FROM users WHERE id != 1';
		return $this->fetch($SQL, []);
	}
}