<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 31.07.17
 * Time: 13:37
 */

namespace Marten\classes\models;


class Product extends Model
{


	public function save(array $post = NULL, string $filename = 'placeholder.jpg')
	{
		// TODO : Hausaufgabe definieren Dummy Anwendungsablauf
		$SQL = 'INSERT INTO products (name, amount, price, description, img) VALUES (:name, :amount, :price, :description, :img)';
		$stmt = $this->db->prepare($SQL);

		$stmt->execute(
			[
				':name' => htmlentities(strip_tags($post['name'])),
				':amount' => htmlentities(strip_tags($post['amount'])),
				':price' => htmlentities(strip_tags($post['price'])),
				':description' => htmlentities(strip_tags($post['description'])),
				':img' => $filename !== '' ? $filename : 'placeholder.jpg'
			]
		);
	}

	public function update(array $post = null, int $id = null) : void
	{
		$SQL = 'UPDATE products 
				SET name = :name, amount = :amount, price = :price, description = :description 
				WHERE id = :id';

		$stmt = $this->db->prepare($SQL);

		$stmt->execute(
			[
				':name' => htmlentities(strip_tags($post['name'])),
				':amount' => htmlentities(strip_tags($post['amount'])),
				':price' => htmlentities(strip_tags($post['price'])),
				':description' => htmlentities(strip_tags($post['description'])),
				':id' => $id
			]
		);
	}

	public function getProductById(int $id = NULL) : array
	{
		$SQL = 'SELECT * FROM products WHERE id = :id';
		$stmt = $this->db->prepare($SQL);

		$stmt->execute(
			[':id' => $id]
		);

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getProducts() : array
	{
		$SQL = 'SELECT * FROM products';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function delete(int $id = NULL) : void
	{
		$SQL = 'DELETE FROM products WHERE id = :id';
		$stmt = $this->db->prepare($SQL);
		$stmt->execute([':id' => $id]);
	}


}