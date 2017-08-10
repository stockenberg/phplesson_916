<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.08.17
 * Time: 16:24
 */

namespace Marten\classes\controllers;


use Marten\classes\App;
use Marten\classes\models\State;
use Marten\classes\Status;

class StateController
{

	public function run()
	{
		if(isset($_GET['action'])){
			switch ($_GET['action']){
				case 'insert':
					if($this->validateInput($_POST)){
						$state = new State();
						$state->save($_POST);

						App::redirectTo('edit-state');
					}
					break;
				case 'delete':
						$state = new State();
						$state->delete($_GET['id']);

						App::redirectTo('edit-state');
					break;
			}
		}
	}

	public function validateInput(Array $post)
	{
		if(isset($post['submit'])){
			foreach ($post as $field => $value){
				if($value === ''){
					Status::write($field, "please fill {$field}");
				}
			}

			if(Status::empty()){
				return true;
			}
			return false;
		}
	}

	public function requestStates() : array
	{
		$state = new State();
		return $state->getStates();
	}

	public function requestStateById(Int $id) : array
	{
		$state = new State();
		return $state->getStateById($id);
	}

}