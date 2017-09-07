<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 15.08.17
 * Time: 16:31
 */

namespace Marten\classes\controllers;


use Marten\classes\Status;

class Controller
{

	public function validate(Array $post, array $errors) : bool
	{

		if (isset($post['submit'])) {

			foreach ($post as $field => $value) {

				switch ($field) {

					default:
						if ($value === '') {
							Status::write($field, $errors[$field]['empty']);
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