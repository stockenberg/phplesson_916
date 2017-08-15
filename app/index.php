<?php
session_name('phplesson');
session_start();

include __DIR__.'/config.php';
require_once __DIR__.'/vendor/autoload.php';


$whoops = new Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$app = new Marten\classes\App();
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
	<link rel="stylesheet"
		  href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
	<link rel="stylesheet" href="assets/css/Simple-Slider.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title>916 CMS</title>
</head>

<body>
<p class="flash">
	<?= \Marten\classes\Status::read('error') ?>
</p>
<div>


	<nav class="navbar navbar-default navigation-clean">
		<div class="container">
			<div class="navbar-header"><a href="#"
										  class="navbar-brand navbar-link">Company
					Name</a>
				<button data-toggle="collapse" data-target="#navcol-1"
						class="navbar-toggle collapsed"><span
						class="sr-only">Toggle navigation</span><span
						class="icon-bar"></span><span
						class="icon-bar"></span><span
						class="icon-bar"></span></button>
			</div>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="nav navbar-nav navbar-right">
					<li role="presentation"><a href="?p=home">Startseite</a></li>
					<li role="presentation"><a href="?p=shop">Shop</a></li>
					<li role="presentation"><a href="?p=cart">Warenkorb
							(
							<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?>
							)
						</a></li>
					<li role="presentation"><a href="?p=imprint">Impressum</a></li>
					<li role="presentation"><a href="?p=privacy">Datenschutz</a></li>

					<?php if (!isset($_SESSION['user']['id'])) : ?>

						<li role="presentation"><a href="?p=login">Login</a>
						</li>

					<?php else: ?>



						<li class="dropdown"><a data-toggle="dropdown"
												aria-expanded="false" href="#"
												class="dropdown-toggle">Admin
								<span class="caret"></span></a>
							<ul role="menu" class="dropdown-menu">

                                <?php if(\Marten\classes\App::getUserRole() === ADMIN || \Marten\classes\App::getUserRole() === AUTHOR) : ?>
								<li role="presentation"><a href="?p=news-edit">News</a></li>
								<li role="presentation"><a href="?p=products-edit">Produkte</a></li>
                                <li role="presentation"><a href="?p=all-orders">Bestellungen</a></li>
                                <?php endif; ?>

								<?php if(\Marten\classes\App::getUserRole() === ADMIN) : ?>
                                <li role="presentation"><a href="?p=edit-state">Statusverwaltung</a></li>
                                <li role="presentation"><a href="?p=edit-users">Benutzer</a></li>
                                <?php endif; ?>

							</ul>
						</li>
						<li role="presentation"><a
								href="?action=logout">Logout</a></li>

					<?php endif; ?>




				</ul>
			</div>
		</div>
	</nav>
</div>

<main>
	<?php
	include __DIR__."/pages/".$app->page.'.php';
	?>
</main>

<div class="footer-basic">
	<footer>
		<div class="social"><a href="#"><i
					class="icon ion-social-instagram"></i></a><a href="#"><i
					class="icon ion-social-snapchat"></i></a><a href="#"><i
					class="icon ion-social-twitter"></i></a><a
				href="#"><i class="icon ion-social-facebook"></i></a></div>
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
<script>
    $(document).ready(function () {
        $('.show').click(function () {
            $(this).next().toggleClass('hidden');
        })

        var flash = $('.flash');

        if(flash[0].innerText === ''){
            flash.remove();
        }else{
            setTimeout(function () {
                flash.fadeOut(500, function () {
                    flash.remove();
                });
            }, 1500);
        }
    });
</script>
</body>


</body>
</html>