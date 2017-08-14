<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:52
 */
namespace Marten\classes\controllers;

use Marten\classes\App;
use Marten\classes\models\Product;
use Marten\classes\Status;

class CartController
{


	public function run()
	{
		if(isset($_GET['action'])){
			switch ($_GET['action']){
				case 'remove_from_cart':
					unset($_SESSION['cart'][$_GET['id']]);
					App::redirectTo('cart');
					break;

				case 'update_amount':
					if(!empty($_POST)){
						$product = new Product();
						$amount_in_db = $product->getProductById($_GET['id'])[0]['amount'];
						if($_POST['amount'] > $amount_in_db){
							Status::write('amount_' . $_GET['id'], "Es sind nurnoch {$amount_in_db} Produkte verfügbar..");
						}else {
							$_SESSION['cart'][$_GET['id']] = str_replace('-',
								'', $_POST['amount']);
							App::redirectTo('cart');
						}
					}
					break;
			}
		}
	}

	public function getCartItems(array $cart = NULL) : array
	{
		$product = new Product();

		$result = [];

		$_SESSION['total'] = 0;

		$counter = 0;
		foreach ($cart as $productId => $amount){
			$thisProduct = $product->getProductById($productId)[0];

			$result[$counter] = $thisProduct;
			$result[$counter]['ordered_amount'] = $amount;

			/** Get the Total in the session for saving in database */
			$_SESSION['total'] += $thisProduct['price'] * $amount;

			$counter++;
		}

		return $result;
	}

}