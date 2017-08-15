<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.08.17
 * Time: 14:40
 */

namespace Marten\classes\controllers;


use Marten\classes\App;
use Marten\classes\models\Product;
use Marten\classes\Status;

class ShopController
{

	public function run()
	{
		if (isset($_GET['action'])){
			switch ($_GET['action']){
				case 'add_to_cart':
						if(!empty($_POST) && $_POST['amount'] !== ''){
							$product = new Product();
							$amount_in_db = $product->getProductById($_POST['id'])[0]['amount'];
							if($_POST['amount'] > $amount_in_db){
								Status::write('amount_' . $_POST['id'], "Es sind nurnoch {$amount_in_db} Produkte verfügbar..");
							}else{
								$_SESSION['cart'][$_POST['id']] = str_replace('-', '', $_POST['amount']);
								App::redirectTo('cart');
							}
						}
						App::redirectTo('shop');
					break;
			}
		}
	}

}