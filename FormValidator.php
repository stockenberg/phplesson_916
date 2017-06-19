<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 19.06.17
 * Time: 16:24
 */
class FormValidator
{

	public $errorMessages = [
		'firstname' => 'Bitte Vornamen eingeben',
		'lastname' => 'Bitte Nachnamen eingeben',
		'message' => 'Bitte Nachricht eingeben',
	];

	public $errors = [];
	public $output = [];


	public function validate($post){

		foreach ($post as $formfield => $input){
			if(array_key_exists($formfield, $this->errorMessages)){
				if($input === ''){
					$this->errors[$formfield] = $this->errorMessages[$formfield];
				}else{
					$this->output[$formfield] = htmlentities(strip_tags($input));
				}
			}
		}

	}

}