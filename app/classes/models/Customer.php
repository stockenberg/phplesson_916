<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 09.08.17
 * Time: 15:52
 */

namespace Marten\classes\models;


class Customer extends Model
{

	public function save(Array $customer = null): int
	{
		$SQL
			= 'INSERT INTO customers 
				(email, firstname, lastname, street, postcode, city)
				VALUES 
				(:email, :firstname, :lastname, :street, :postcode, :city)';

		$stmt = $this->db->prepare($SQL);
		$stmt->execute(
			[
				':email'     => $customer['email'],
				':firstname' => $customer['firstname'],
				':lastname'  => $customer['lastname'],
				':street'    => $customer['street'],
				':postcode'  => $customer['postcode'],
				':city'      => $customer['city'],
			]
		);

		return $this->db->lastInsertId();
	}

}