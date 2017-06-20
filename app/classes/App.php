<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 16:05
 */
include 'GETValidator.php';

class App
{

	public $page;
	public $whitelist = ['home', 'about', 'contact'];

	public function boot()
	{

		$validate = new GETValidator($this->whitelist, $_GET['p'] ?? '', __DIR__ . '/../pages/');
		$this->page = $validate->getValidatedPage();

		switch ($this->page){
			case 'home':
				// Logik für die Startseite
				//echo "Logik für die Startseite";
				break;

			case 'about':
				// Logik für die About Seite
				echo "Logik für die About Seite";
				break;

			case 'contact':
				// Logik für Kontaktseite
				echo "Logik für die Kontaktseite";
				break;
		}

	}
	
}