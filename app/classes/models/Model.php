<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 26.06.17
 * Time: 17:28
 */
namespace Marten\classes\models;


class Model
{
	public $db;

	public function __construct()
	{
		$this->db = new \PDO(DSN, DBUSER, DBPASS);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public function fetch(String $sql, array $executeArray) : array
	{
		$stmt = $this->db->prepare($sql);
		$stmt->execute($executeArray);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function set(String $sql, array $executeArray) : void
	{
		$stmt = $this->db->prepare($sql);
		$stmt->execute($executeArray);
	}


}