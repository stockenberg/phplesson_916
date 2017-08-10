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

		endforeach;

	}

	public function getCustomerOrders()
	{
		$SQL = "SELECT P.*, OP.*, O.*, C.*
				FROM 
				orders_products AS OP, 
				products AS P, 
				orders AS O, 
				customers AS C
				WHERE OP.product_id = P.id 
				AND OP.order_id = O.id 
				AND O.customer_id = C.id 
				ORDER BY O.created_at DESC";

		$stmt = $this->db->prepare($SQL);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/*



	 */

}