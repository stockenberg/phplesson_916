<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:53
 */

namespace Marten\classes\controllers;

use Marten\classes\App;
use Marten\classes\Status;

class OrderController
{

	public $errors
		= [
			'firstname' => 'Bitte füllen sie das Feld Vorname aus',
			'lastname'  => 'Bitte tragen sie ihren Nachname ein',
			'email'     => 'Geben sie eine E-Mail Adresse ein',
			'street'    => 'Bitte geben sie ihre Straße an',
			'postcode'  => 'Bitte tragen sie ihre Postleitzahl ein',
			'city'      => 'Bitte geben sie ihren Wohnort an',
		];

	public function run()
	{

		if (isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'customer_data':

					if ($this->validateCustomerData($_POST)) {
						$_SESSION['customer_data'] = $_POST['customer_data'];
						App::redirectTo('order-overview');
					}

					break;

				case 'save':

					if($this->validateSubmission($_POST)){

					}else{
						App::redirectTo('order-overview');
					}

					/**
					 * check if AGB is true - DONE
					 * Check if Privacy is true - DONE
					 * Save Customer
					 * Use Customer ID to save order
					 * Use Order and Product ID to save orders_products
					 * Send Mail to Admin
					 * Send Mail to Customer
					 * Redirect to Success Page
					 */

					break;
			}
		}

	}

	public function validateSubmission(Array $post = NULL) : bool
	{
		if(isset($post['submit'])){
			if(!isset($post['agb'])){
				Status::write('Bitte bestätige die AGBs');
			}

			if(!isset($post['privacy'])){
				Status::write('Bitte bestätige die Datenschutzerklärung');
			}

			if(Status::empty()){
				return true;
			}
		}

		return false;

	}

	public static function allowDataView()
	{
		if(isset($_SESSION['cart'])){
			if(!empty($_SESSION['cart'])){
				return true;
			}
			App::redirectTo('cart');
		}
		App::redirectTo('cart');
	}

	public static function allowOverView()
	{
		if(isset($_SESSION['cart'], $_SESSION['customer_data'])){
			if(!empty($_SESSION['cart']) && !empty($_SESSION['customer_data'])){
				return true;
			}
			App::redirectTo('cart');
		}
		App::redirectTo('cart');
	}

	public function validateCustomerData(Array $post = null): bool
	{

		if (isset($post['submit'])) {

			foreach ($post['customer_data'] as $field => $value) {

				switch ($field) {

					default:
						if ($value === '') {
							Status::write($this->errors[$field]);
						}
						break;
				}

			}

			if (Status::empty()) {
				return true;
			}

			return false;

		}

		return false;

	}

}