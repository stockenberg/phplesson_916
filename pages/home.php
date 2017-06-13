<h1><?= $title ?></h1>
<p><?= do_something() ?></p>
<ul>
	<?php foreach ($arr as $prodName) : ?>
		<li><?= $prodName ?></li>
	<?php endforeach; ?>
</ul>