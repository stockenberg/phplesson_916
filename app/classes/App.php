<?php

/**
 * Created by PhpStorm. !
 * User: workstation
 * Date: 20.06.17
 * Time: 16:05
 */

namespace Marten\classes;


use Marten\classes\controllers\CartController;
use Marten\classes\controllers\ContactController;
use Marten\classes\controllers\HomeController;
use Marten\classes\controllers\LoginController;
use Marten\classes\controllers\NewsController;
use Marten\classes\controllers\OrderController;
use Marten\classes\controllers\ProductController;

class App
{

	public $page;
	public $content = [];
	public $whitelist
		= [
			'news-edit',
			'products-edit',
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

				// if not empty, we pressed the edit button and loaded news by id from database
				if (!empty($news->content)) {
					$this->content['edit'] = $news->content;
				}
				break;

			case 'products-edit':
				$product = new ProductController();
				$product->run();

				$this->content['products'] = $product->requestProducts();

				if (!empty($product->content)) {
					$this->content['edit'] = $product->content;
				}
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
