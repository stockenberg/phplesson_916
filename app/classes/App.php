<?php

/**
 * Created by PhpStorm. !
 * User: workstation
 * Date: 20.06.17
 * Time: 16:05
 */
include CLASSES.'models/Model.php';
include CLASSES.'Auth.php';
include CLASSES.'GETValidator.php';
include CLASSES.'controllers/CartController.php';
include CLASSES.'controllers/HomeController.php';
include CLASSES.'controllers/ContactController.php';
include CLASSES.'controllers/LoginController.php';
include CLASSES.'controllers/NewsController.php';
include CLASSES.'controllers/OrderController.php';

class App
{

	public $page;
	public $content = [];
	public $whitelist
		= [
			'news-edit',
			'home',
			'news',
			'products',
			'cart',
			'order-data',
			'order-overview',
			'login',
			'contact',
		];


	/**
	 * Creates pages in pages folder based on entries of the whitelist.
	 * Pages that already exists, are ignored
	 */
	public function generateFilesFromWhitelist(): void
	{
		foreach ($this->whitelist as $value) {
			$filename = BASE_PATH.'pages/'.$value.'.php';
			if (!file_exists($filename)) {
				fopen(BASE_PATH.'pages/'.$value.'.php', 'w+');
			}
		}

	}

	public static function getUserId()
	{
		return $_SESSION['user']['id'] ?? 0;
	}


	public static function getUserRole()
	{
		return $_SESSION['user']['role'] ?? 0;
	}

	/**
	 * Application Boot and Request Routing
	 */
	public function boot()
	{

		$validate = new GETValidator($this->whitelist, $_GET['p'] ?? '',
			__DIR__.'/../pages/');
		$this->page = $validate->getValidatedPage();

		switch ($this->page) {
			case 'news-edit':

				Auth::allow(App::getUserRole(), [ADMIN, AUTHOR]);

				$news = new NewsController();
				$news->run();
				$this->content['news'] = $news->requestNews();

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
				$login->run();
				break;

			case 'contact':
				$contact = new ContactController();
				break;


		}

		if (isset ($_GET['action']) && $_GET['action'] == 'logout') {

			session_destroy();
			session_unset();

			header('Location: ?p=home');
			exit();
		}

	}

}
