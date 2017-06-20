<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.06.17
 * Time: 15:35
 */
class Validate
{
	public $eyecolor = 'blue';

	public function validate()
	{

	}

}

class SaveDB extends Validate
{
	public $eyecolor = 'green';

	public function save()
	{

	}
}

class SaveToFile extends Validate
{
	public $eyecolor = 'green';

	public function save()
	{

	}
}

$save = new SaveToFile();
$save->validate();
$save->save();


$saveDB = new SaveDB();
$saveDB->validate();
$saveDB->save();

