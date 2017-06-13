<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 06.06.17
 * Time: 12:14
 */

$title = "My Freakin Headline!";
$arr = ["Laptop", "Backpack"];

function do_something()
{
	echo "id did something";
}

function gen_title ($key)
{
	$titles = [
		"home" => "Das ist die Startseite",
		"about" => "Das ist die About Seite",
		"contact" => "Dast ist die Kontakt Seite"
	];

	return $titles[$key];
}