<div class="container">
    <div class="row">
        <h3>Shopping Cart</h3>
        <table class="table table-bordered">
            <thead>
            <tr >
                <th>Produkt</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Anzahl</th>
                <th>Preis</th>
                <th>Entfernen</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($app->content['cart'] as $index => $product) : ?>

                <tr class="text-center">
                    <td>
                        <img height="25" src="uploads/img/products/<?= $product['img'] ?>" alt="<?= $product['title'] ?>">
                    </td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['amount'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td>X</td>
                </tr>

			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>