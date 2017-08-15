<div class="container">
    <div class="row">
        <h3>Shopping Cart</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Produkt</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Anzahl</th>
                <th>Preis</th>
                <th>Entfernen</th>
            </tr>
            </thead>
            <tbody>
			<?php
            $total = 0;
            foreach ($app->content['cart'] ?? [] as $index => $product) :
                $total += $product['price'] * $product['ordered_amount'];

                ?>

                <tr class="text-center">
                    <td>
                        <img height="25"
                             src="uploads/img/products/<?= $product['img'] ?>"
                             alt="<?= $product['name'] ?>">
                    </td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td>
                        <form action="?p=cart&action=update_amount&id=<?= $product['id'] ?>" method="post">
                            <input type="number" min="0" max="<?= $product['amount'] ?>" name="amount"
                                   value="<?= $product['ordered_amount'] ?>" id="">
                            <button type="submit">
                                <i class="glyphicon glyphicon-refresh"></i>
                            </button>
                        </form>
                        <p class="text-danger">
                            <?= \Marten\classes\Status::read('amount_' . $product['id']) ?>
                        </p>
                    </td>
                    <td><?= number_format(
                            $product['price'] * $product['ordered_amount'],
                            2,
                            ',',
                            '.'
                        ) ?> &euro;</td>
                    <td><a class="btn btn-danger"
                           href="?p=cart&action=remove_from_cart&id=<?= $product['id'] ?>">X</a>
                    </td>
                </tr>

			<?php endforeach; ?>
            </tbody>

            <tfooter>
                <tr>
                    <td colspan="5" class="text-right">
                        MwSt.: <?= number_format($total * 0.07, 2, ',', '.') ?> &euro;
                        <br>
                        Netto.: <?= number_format($total - $total * 0.07, 2, ',', '.') ?> &euro;
                        <br>
                        <hr>
                        Brutto: <?=
                        number_format($total, 2, ',', '.')
                        ?> &euro;
                     </td>
                    <td></td>
                </tr>
            </tfooter>
        </table>
        <a href="?p=order-data" class="btn btn-success">Weiter zur Dateneingabe</a>
    </div>
</div>