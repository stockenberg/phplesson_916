<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 17:53
 */

namespace Marten\classes\controllers;

use Marten\classes\App;
use Marten\classes\models\Customer;
use Marten\classes\models\Order;
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

					if ($this->validateSubmission($_POST)) {

						$customer = new Customer();
						$customer_id
							= $customer->save($_SESSION['customer_data']);

						$order = new Order();
						$order_id = $order->save($customer_id);

						$order->saveOrderToProducts($_SESSION['cart'],
							$order_id);

						// TODO : Send mail to Admin
						// TODO : Send mail to Customer

						unset($_SESSION['cart']);
						unset($_SESSION['customer_data']);

						App::redirectTo('success');

					}

					break;
			}
		}

	}

	public function requestOrders()
	{
		$order = new Order();
		$orders = $order->getCustomerOrders();

		// TODO : Transfer total to orders table for avoiding hazzle

		$output = [];

		foreach ($orders as $index => $orderData) {

			$output[$orderData['order_id']]['order'] = [
				'firstname'   => $orderData['firstname'],
				'lastname'    => $orderData['lastname'],
				'email'       => $orderData['email'],
				'city'        => $orderData['city'],
				'street'      => $orderData['street'],
				'postcode'    => $orderData['postcode'],
				'customer_id' => $orderData['customer_id'],
				'order_id'    => $orderData['order_id'],
				'shipped_at'  => $orderData['shipped_at'],
				'state_id'    => $orderData['state_id'],
				'updated_at'  => $orderData['updated_at'],
				'created_at'  => $orderData['created_at'],
			];

			$output[$orderData['order_id']]['products'][] = [
				'name'           => $orderData['name'],
				'product_amount' => $orderData['product_amount'],
				'price'          => $orderData['price'],
				'product_id'     => $orderData['product_id'],
			];

		}

		return $output;
	}

	public function validateSubmission(Array $post = null): bool
	{
		if (isset($post['submit'])) {
			if (!isset($post['agb'])) {
				Status::write('agb', 'Bitte bestätige die AGBs');
			}

			if (!isset($post['privacy'])) {
				Status::write('privacy',
					'Bitte bestätige die Datenschutzerklärung');
			}

			if (Status::empty()) {
				return true;
			}
		}

		return false;

	}

	public static function allowDataView()
	{
		if (isset($_SESSION['cart'])) {
			if (!empty($_SESSION['cart'])) {
				return true;
			}
			App::redirectTo('cart');
		}
		App::redirectTo('cart');
	}

	public static function allowOverView()
	{
		if (isset($_SESSION['cart'], $_SESSION['customer_data'])) {
			if (!empty($_SESSION['cart'])
				&& !empty($_SESSION['customer_data'])) {
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