<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 09.08.17
 * Time: 15:52
 */

namespace Marten\classes\models;


class Order extends Model
{

	public function save(Int $customer_id, float $total)
	{
		$SQL
			= 'INSERT INTO orders 
				(customer_id, state_id, shipped_at, total) 
				VALUES
				(:customer_id, :state_id, :shipped_at, :total)';

		$stmt = $this->db->prepare($SQL);

		$stmt->execute([
			":customer_id" => $customer_id,
			":state_id"    => 1,
			":shipped_at"  => null,
			':total' => $total
		]);

		return $this->db->lastInsertId();
	}

	public function saveOrderToProducts(array $cart, int $order_id)
	{

		$SQL
			= "INSERT INTO orders_products 
				(product_id, order_id, product_amount) 
				VALUES
				(:product_id, :order_id, :product_amount)";

		$stmt = $this->db->prepare($SQL);

		foreach ($cart as $product_id => $amount) :

			$stmt->execute(
				[
					':product_id'     => $product_id,
					':order_id'       => $order_id,
					':product_amount' => $amount,
				]
			);

			$this->substractAmount($product_id, $amount);

		endforeach;

	}

	public function updateState(Int $order_id, Int $state_id)
	{
		$SQL = 'UPDATE orders SET state_id = :state_id WHERE id = :order_id';
		$exec = [':state_id' => $state_id, ':order_id' => $order_id];

		$this->set($SQL, $exec);

	}


	public function getCustomerOrders()
	{
		$SQL = "SELECT P.*, OP.*, O.*, C.*, S.state
				FROM 
				orders_products AS OP, 
				products AS P, 
				orders AS O, 
				customers AS C,
				states AS S
				WHERE OP.product_id = P.id 
				AND OP.order_id = O.id 
				AND O.customer_id = C.id
				AND S.state_id = O.state_id
				ORDER BY O.created_at DESC";

		$stmt = $this->db->prepare($SQL);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function substractAmount(int $prod_id, int $amount)
	{
		// Select Product by ID
		$SQL = 'SELECT * FROM products WHERE id = :id';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':id' => $prod_id]);
		$res = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];

		// Substract amount and save temporarily
		$newAmount = $res['amount'] - $amount;

		// Update Product
		$SQL = 'UPDATE products SET amount = :amount WHERE id = :id';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':id' => $prod_id, ':amount' => $newAmount]);

	}


	public static function translateStateId(Int $statusId = NULL)
	{
		$SQL = 'SELECT state FROM states WHERE state_id = :id';
		$exec = [':id' => $statusId];


	}

	/*



	 */

}