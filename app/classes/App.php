<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 16:05
 */
include 'GETValidator.php';
include CLASSES . 'controllers/CartController.php';
include CLASSES . 'controllers/ContactController.php';
include CLASSES . 'controllers/LoginController.php';
include CLASSES . 'controllers/NewsController.php';
include CLASSES . 'controllers/OrderController.php';
include CLASSES . 'controllers/ProductController.php';

class App
{

	public $page;
	public $whitelist = ['news', 'products', 'cart', 'order-data', 'order-overview', 'login', 'contact'];

	public function generateFilesFromWhitelist()
	{
		foreach ($this->whitelist as $value){
			fopen(BASE_PATH . 'pages/' . $value . '.php', 'w+');
		}

	}

	public function boot()
	{
		$validate = new GETValidator($this->whitelist, $_GET['p'] ?? '', __DIR__ . '/../pages/');
		$this->page = $validate->getValidatedPage();

		switch ($this->page) {
			case 'news':
				$news = new NewsController();
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