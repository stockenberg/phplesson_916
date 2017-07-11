<div class="article-list">
	<div class="container">
		<div class="intro">
			<h2 class="text-center">Latest Articles</h2>
			<p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
		</div>
		<div class="row articles">
			<?php foreach ($app->content['news'] as $index => $news)  : ?>
			<div class="col-md-4 col-sm-6 item">
				<a href="#">
					<img src="assets/img/<?= $news['img'] ?? 'desk.jpg' ?>" class="img-responsive" />
				</a>
				<h3 class="name">
					<?php echo $news['title'] ?>
				</h3>
				<p class="description">
					<?= $news['content'] ?>
				</p>
				<a href="#" class="action">
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
				</a>
			</div>
			<?php endforeach; ?>


	</div>
</div>