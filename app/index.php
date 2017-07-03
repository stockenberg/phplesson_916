<?php

include __DIR__ . '/config.php';
include __DIR__ . '/classes/App.php';


$app = new App();
$app->boot();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/Article-List.css">
	<link rel="stylesheet" href="assets/css/Footer-Basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
	<link rel="stylesheet" href="assets/css/Simple-Slider.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title>916 CMS</title>
</head>

<body>
<div>

	<nav class="navbar navbar-default navigation-clean">
		<div class="container">
			<div class="navbar-header"><a href="#" class="navbar-brand navbar-link">Company Name</a>
				<button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			</div>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="nav navbar-nav navbar-right">
					<li role="presentation"><a href="?p=home">Startseite</a></li>
					<li role="presentation"><a href="?p=login">Login</a></li>
					<li role="presentation"><a href="#">Third Item</a></li>
					<li class="dropdown"><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle">Dropdown <span class="caret"></span></a>
						<ul role="menu" class="dropdown-menu">
							<li role="presentation"><a href="#">First Item</a></li>
							<li role="presentation"><a href="#">Second Item</a></li>
							<li role="presentation"><a href="#">Third Item</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<main>
	<?php
	include __DIR__ . "/pages/" . $app->page . '.php';
	?>
</main>

<div class="footer-basic">
	<footer>
		<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
		<ul class="list-inline">
			<li><a href="#">Home</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Terms</a></li>
			<li><a href="#">Privacy Policy</a></li>
		</ul>
		<p class="copyright">Company Name © 2016</p>
	</footer>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
</body>



</body>
</html>