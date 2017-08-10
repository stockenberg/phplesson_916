<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.08.17
 * Time: 16:26
 */

namespace Marten\classes\models;


class State extends Model
{

	public function getStates() : array
	{
		$SQL = 'SELECT * FROM states';

		$stmt = $this->db->prepare($SQL);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getStateById(Int $id) : array
	{
		$SQL = 'SELECT * FROM states WHERE state_id = :id';

		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':id' => $id]);

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function save(array $post)
	{
		$SQL = 'INSERT INTO states (name, state_id) VALUES (:name, :state_id)';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':name' => $post['name'], ':state_id' => $post['state_id']]);

	}

	public function delete(int $id)
	{
		$SQL = 'DELETE FROM states WHERE id = :id';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':id' => $id]);
	}

}