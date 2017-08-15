<div class="container">
    <div class="row">
        <h2>Deine Bestellübersicht</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Produkt</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Anzahl</th>
                <th>Preis</th>
            </tr>
            </thead>
            <tbody>
			<?php
			$total = 0;
			foreach ($app->content['cart'] as $index => $product) :
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
						<?= $product['ordered_amount'] ?>
                    </td>
                    <td><?= number_format(
							$product['price'] * $product['ordered_amount'],
							2,
							',',
							'.'
						) ?> &euro;
                    </td>
                </tr>

			<?php endforeach; ?>
            </tbody>

            <tfooter>
                <tr>
                    <td colspan="4" class="text-right">
                        MwSt.: <?= number_format($total * 0.07, 2, ',', '.') ?>
                        &euro;
                        <br>
                        Netto.: <?= number_format($total - $total * 0.07, 2,
							',', '.') ?> &euro;
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
    </div>

    <div class="row">
        <h3>Persönliche Daten</h3>
        <p>
            Vorname: <?= $_SESSION['customer_data']['firstname'] ?><br/>
            Nachname: <?= $_SESSION['customer_data']['lastname'] ?> <br/>
            E-Mail-Adresse: <?= $_SESSION['customer_data']['email'] ?><br/>
            Straße: <?= $_SESSION['customer_data']['street'] ?><br/>
            Postleitzahl: <?= $_SESSION['customer_data']['postcode'] ?><br/>
            Stadt: <?= $_SESSION['customer_data']['city'] ?><br/>
        </p>
        <form action="?p=order-overview&action=save" method="post">
            <div class="">
                <label for="agb">Ich habe alles gelesen und akzeptiere</label>
                <input type="checkbox" name="agb" id="agb">
                <br>
                <label for="privacy">Ich habe die Datenschutzbestimmungen
                    gelesen
                    und aktzeptiere</label>
                <input type="checkbox" name="privacy" id="privacy">
            </div>
            <input type="submit" name="submit" class="btn btn-success"
                   value="kostenpflichtig Bestellen">
        </form>

    </div>
</div>