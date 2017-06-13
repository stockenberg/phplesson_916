<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 06.06.17
 * Time: 10:34
 */

include_once (__DIR__ . "/core.php");

foreach ($arr as $k => $v){

}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= gen_title("home") ?></title>
</head>
<body>
<nav>
	<a href="">home</a>
	<a href="">about</a>
	<a href="">contact</a>
</nav>



<main class="content">

<?php
	include (__DIR__ . '/pages/' . $_GET["page"] . '.php');
?>

</main>


</body>
</html>
