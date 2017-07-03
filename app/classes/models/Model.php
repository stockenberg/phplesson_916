<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 26.06.17
 * Time: 17:28
 */
class Model
{
	public $db;

	public function __construct()
	{
		$this->db = new PDO(DSN, DBUSER, DBPASS);
		echo "test";
	}

}