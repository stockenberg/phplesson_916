<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 26.06.17
 * Time: 16:15
 */
include CLASSES . 'models/Model.php';

class Home extends Model
{

	public function getNews()
	{
		// SQL STATEMENT
		$sql = 'SELECT * FROM news';

		//$ PREPARE STATEMENT
		$stmt = $this->db->prepare($sql);

		// Execute
		$stmt->execute();

		// Fetch
		$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $news;
	}

}