<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 06.06.17
 * Time: 12:14
 */

$title = "My Freakin Headline!";
$arr = ["Laptop", "Backpack"];

function gen_title ($key)
{
	$titles = [
		"home" => "Das ist die Startseite",
		"about" => "Das ist die About Seite",
		"contact" => "Dast ist die Kontakt Seite"
	];

	return $titles[$key];
}


$whitelistPages = [
	'home',
	'about',
	'contact'
];

/**
 * @param array $whitelist
 * @param String $page
 * @return String
 */
function validatePages(Array $whitelist = [], String $page = 'home') : String
{
	if (isset($_GET['p'])) {
		if (in_array($_GET['p'], $whitelist)) {
			if (file_exists(__DIR__ . '/pages/' . $_GET['p'] . '.php')) {
				$page = $_GET['p'];
			} else {
				$page = '404';
			}
		}
	}

	return $page;
}
