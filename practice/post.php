<?php

/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.06.17
 * Time: 16:17
 */

//print_r($_POST);

$error = [];
$postData = [];

if (isset($_POST['submit'])) {

	/**
	 * Check Firstname
	 */
	if ($_POST['firstname'] === '') {
		$error['firstname'] = 'Bitte Vornamen ausfüllen';
	}else{
		if(strlen($_POST['firstname']) > 2){
			$postData['firstname'] = htmlentities(strip_tags($_POST['firstname']));
		}else{
			$error['firstname'] = 'Die Eingabe muss mindestens 3 Zeichen haben.';
		}
 	}

	/**
	 * check Email
	 */
	if ($_POST['email'] === '') {
		$error['email'] = 'Bitte E-Mail-Adresse ausfüllen';
	}else{
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$postData['email'] = htmlentities(strip_tags($_POST['email']));
		}else{
			$error['email'] = 'Bitte eine gültige E-Mail-Adresse eingeben';
		}
	}

	/**
	 * Message
	 */
	if ($_POST['message'] === '') {
		$error['message'] = 'Bitte Nachricht eingeben';
	}else{
		$postData['message'] = htmlentities(strip_tags($_POST['message']));
	}

	/**
	 * If Success
	 */
	if (empty($error)) {
		$header = 'From: system@mydomain.com' . "\r\n" .
			'Reply-To: ' . $postData['email'] . "\r\n" .
			'X-Mailer: PHP/' . PHP_VERSION;

		$empfaenger = 'm.stockenberg@sae.edu';
		$betreff = 'Neue Nachricht';
		$nachricht = 'Neue Nachricht aus dem Kontaktformular' . "\n";
		$nachricht .= "\n";
		$nachricht .= "Vorname: " . $postData['firstname'] . "\n";
		$nachricht .= "Email: " . $postData['email'] . "\n";
		$nachricht .= "Nachricht: " . $postData['message'] . "\n";


		if(mail($empfaenger, $betreff, $nachricht, $header)){
			echo 'E-Mail wurde erfolgreich versandt!';
		}
	}

}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<h1>Hallo <?= $postData['firstname'] ?? '' ?></h1>
<h2>Deine E-Mail-Adresse ist: <?= $postData['email'] ?? '' ?></h2>
<form action="" method="post">
	<div>
		<label for="">Vorname</label>
		<input type="text" name="firstname">
		<?= (isset($error['firstname'])) ? '<p>' . $error['firstname'] . '</p>' : '' ?>
	</div>

	<div>
		<label for="">E-Mail-Adresse</label>
		<input type="email" name="email">
		<?= (isset($error['email'])) ? '<p>' . $error['email'] . '</p>' : '' ?>
	</div>

	<div>
		<label for="">Nachricht</label>
		<textarea name="message" id="" cols="30" rows="10"></textarea>
		<?= (isset($error['message'])) ? '<p>' . $error['message'] . '</p>' : '' ?>
	</div>

	<div>
		<input type="submit" name="submit" value="Senden!">
	</div>

</form>

</body>
</html>
