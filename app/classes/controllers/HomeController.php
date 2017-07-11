<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 26.06.17
 * Time: 15:50
 */
namespace Marten\classes\controllers;

use Marten\classes\models\Home;

class HomeController
{
	//

	public function requestNews() : array
	{
		$home = new Home();
		return $home->getNews();
	}

}





