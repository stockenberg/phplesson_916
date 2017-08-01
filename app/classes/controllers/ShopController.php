<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 01.08.17
 * Time: 14:40
 */

namespace Marten\classes\controllers;


class ShopController
{

	public function run()
	{
		if (isset($_GET['action'])){
			switch ($_GET['action']){
				case 'add_to_cart':
						if(!empty($_POST)){
							$_SESSION['cart'][$_POST['id']] = $_POST['amount'];
							header('Location: ?p=shop');
							exit();
						}
					break;
			}
		}
	}

}