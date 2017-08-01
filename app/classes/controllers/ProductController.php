<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:52
 */

namespace Marten\classes\controllers;

use Marten\classes\App;
use Marten\classes\Auth;
use Marten\classes\models\Product;
use Marten\classes\Status;

class ProductController
{

	public $content;

	public function run()
	{
		if (isset($_GET['action'])) {
			switch ($_GET['action']) {

				case 'insert':
					echo "<pre>";
					    print_r($_POST);
					echo "</pre>";

					echo "<pre>";
					    print_r($_FILES);
					echo "</pre>";

					if(!is_dir('uploads/img/products')){
						mkdir('uploads/img/products/', 0777, true);
					}
					move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/img/products/' . basename($_FILES['img']['name']));


					exit();


					/*
					if ($this->validate($_POST)) {

						$products = new Product();
						$products->save($_POST);

						header('Location: ?p=products-edit');
						exit();
					}*/
					break;

				case 'edit':
					if(isset($_GET['edit'])){
						$products = new Product();
						$this->content = $products->getProductById($_GET['edit']);

					}
						// TODO : PRINT Database results...
					break;


				case 'update':
					if ($this->validate($_POST)) {
						$products = new Product();
						$products->update($_POST, $_GET['update']);

						header('Location: ?p=products-edit');
						exit();
					}
					break;

				case 'delete':
					Auth::deny(App::getUserRole(), [AUTHOR]);
					if (isset($_GET['delete'])) {
						$product = new Product();
						$product->delete($_GET['delete']);

						header('Location: ?p=products-edit');
						exit();
					}
					break;

			}
		}
	}

	public function requestProducts(): array
	{
		$products = new Product();

		return $products->getProducts();
	}


	public function validate(array $post = null)
	{
		// TODO : submit prüfung fehlt
		if (isset($post['submit'])) {

			if ($post['name'] === '') {
				Status::write('name', 'Bitte Namen ausfüllen');
			}

			if ($post['amount'] === '') {
				Status::write('amount', 'Bitte Menge ausfüllen');
			}

			if ($post['price'] === '') {
				Status::write('price', 'Bitte Preis ausfüllen');
			}

			if ($post['description'] === '') {
				Status::write('description', 'Bitte Namen ausfüllen');
			}

			if (Status::empty()) {
				return true;
			}

			return false;
		}

		return false;

	}

}