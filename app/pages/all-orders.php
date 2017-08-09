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
			<tr>
				<td><?= $order['order']['created_at'] ?></td>
				<td><?= $order['order']['order_id'] ?></td>
				<td><?= $order['order']['firstname'] ?></td>
				<td><?= $order['order']['lastname'] ?></td>
				<td>##PREIS##</td>
                <td><?= $order['order']['state_id'] ?></td>

            </tr>
            <tr>
                <td colspan="6">
                    <?php foreach ($order['products'] as $index => $product) : ?>
                        <li><?= $product['name'] ?></li>
                        <li><?= $product['price'] ?></li>
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

