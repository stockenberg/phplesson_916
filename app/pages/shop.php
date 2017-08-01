<div class="article-list">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Shop</h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam
                sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet
                vitae. </p>
        </div>
        <div class="row articles">
			<?php foreach ($app->content['products'] as $index => $products)  :
				?>
                <div class="col-md-4 col-sm-6 item">
                    <a href="#">
                        <img src="uploads/img/products/<?= $products['img'] ?>"
                             class="img-responsive"/>
                    </a>
                    <h3 class="name">
						<?php echo $products['name'] ?>
                    </h3>
                    <p class="description">
						<?= $products['description'] ?>
                    </p>
                    <form action="?p=shop&action=add_to_cart" method="post">
                        <input type="number" min="0" max="<?= $products['amount'] ?>" name="amount" id="amount">
                        <input type="hidden" name="id" value="<?= $products['id'] ?>">
                        <button type="submit">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                        </button>
                    </form>
                </div>
			<?php endforeach; ?>


        </div>
    </div>