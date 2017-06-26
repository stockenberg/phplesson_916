<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 16:05
 */
include CLASSES . 'GETValidator.php';
include CLASSES . 'controllers/CartController.php';
include CLASSES . 'controllers/HomeController.php';
include CLASSES . 'controllers/ContactController.php';
include CLASSES . 'controllers/LoginController.php';
include CLASSES . 'controllers/NewsController.php';
include CLASSES . 'controllers/OrderController.php';

class App
{

	public $page;
	public $content = [];
	public $whitelist = ['home', 'news', 'products', 'cart', 'order-data', 'order-overview', 'login', 'contact'];


	/**
	 * Creates pages in pages folder based on entries of the whitelist.
	 * Pages that already exists, are ignored
	 */
	public function generateFilesFromWhitelist() : void
	{
		foreach ($this->whitelist as $value) {
			$filename = BASE_PATH . 'pages/' . $value . '.php';
			if (!file_exists($filename)) {
				fopen(BASE_PATH . 'pages/' . $value . '.php', 'w+');
			}
		}

	}


	/**
	 * Application Boot and Request Routing
	 */
	public function boot()
	{
		$validate = new GETValidator($this->whitelist, $_GET['p'] ?? '', __DIR__ . '/../pages/');
		$this->page = $validate->getValidatedPage();

		switch ($this->page) {
			case 'news':
				$news = new NewsController();
				break;

			case 'home':
				$home = new HomeController();
				$this->content['news'] = $home->requestNews();
				break;

			case 'products':
				$product = new ProductController();
				break;

			case 'cart':
				$cart = new CartController();
				break;

			case 'order-data':
				$order = new OrderController();
				break;

			case 'order-overview':
				$order = new OrderController();
				break;

			case 'login':
				$login = new LoginController();
				break;

			case 'contact':
				$contact = new ContactController();
				break;
		}

	}

}