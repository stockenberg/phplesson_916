<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 26.06.17
 * Time: 15:50
 */
require_once CLASSES . 'models/Home.php';

class HomeController
{
	//

	public function requestNews() : Array
	{
		$home = new Home();
		return $home->getNews();
	}

}





