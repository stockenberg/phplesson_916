<div class="container">
	<div class="row">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>Bestellt am</th>
                <th>Order_ID</th>
				<th>Vorname</th>
				<th>Nachname</th>
				<th>Preis</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
            <?php foreach ($app->content['orders'] as $order_id => $order) : ?>
			<tr class="activator">
				<td><?= date( 'd.m.y - H:i', strtotime($order['order']['created_at'])) ?> Uhr</td>
				<td><?= $order['order']['order_id'] ?></td>
				<td><?= $order['order']['firstname'] ?></td>
				<td><?= $order['order']['lastname'] ?></td>

				<td><?= number_format($order['order']['total'], 2, ',', '.') ?> &euro;</td>
                <td>


                    <form action="?p=all-orders&action=update_state&order_id=<?= $order['order']['order_id'] ?>" method="post">

                        <select name="state_id" id="">
                            <?php foreach ($app->content['states'] as $index => $state) : ?>
                                <option value="<?= $state['state_id'] ?>" <?= ($order['order']['state_id'] === $state['state_id']) ? "selected" : "" ?> >
                                    <?= $state['state'] // oder state_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Refresh">
                        
                    </form>


                </td>

            </tr>
            <tr class="">
                <td colspan="6">
                    <ul>
                    <?php foreach ($order['products'] as $index => $product) : ?>
                        <li><?= $product['name'] ?></li>

                        <li><?= number_format((int)$product['price'], 2, ',', '.') ?> &euro;</li>
                        <li><?= $product['product_amount'] ?></li>
                        <hr>
                    <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

