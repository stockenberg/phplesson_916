<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:52
 */

namespace Marten\classes\controllers;

use Marten\classes\models\Product;
use Marten\classes\Status;

class ProductController
{

	public function run()
	{

		switch ($_GET['action']) {

			case 'insert':
				if ($this->validate($_POST)) {
					$products = new Product();
					$products->save($_POST);

					header('Location: ?p=products-edit');
					exit();
				}
				break;

			case 'edit':

				break;


			case 'update':

				break;

			case 'delete':

				break;

		}

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