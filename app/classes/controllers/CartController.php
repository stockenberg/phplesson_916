<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:52
 */
namespace Marten\classes\controllers;

use Marten\classes\models\Product;

class CartController
{

	public function getCartItems(array $cart = NULL) : array
	{
		$product = new Product();

		$result = [];

		$counter = 0;
		foreach ($cart as $productId => $amount){
			$thisProduct = $product->getProductById($productId)[0];

			$result[$counter] = $thisProduct;
			$result[$counter]['amount'] = $amount;

			$counter++;
		}

		return $result;
	}

}