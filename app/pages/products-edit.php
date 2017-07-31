<div class="container">

    <div class="row">
        <h3>Products</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amout</th>
                <th>Price</th>
                <th>Img</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($app->content['products'] as $index => $product) :?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['amount'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['img'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><a class="btn btn-warning" href="?p=products-edit&action=edit&edit=<?= $product['id'] ?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="?p=products-edit&action=delete&delete=<?= $product['id'] ?>">Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <!-- TODO : Action war leer -->
        <form action="<?= isset($app->content['edit']) ? '?p=products-edit&action=update&update=' . $app->content['edit'][0]['id'] : '?p=products-edit&action=insert' ?>" method="post" role="form">
            <legend>Products Edit</legend>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id=""
                       placeholder="Input..."
                    value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['name'] : ''?>"
                >
            </div>

            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" name="amount" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['amount'] : ''?>"
                >
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['price'] : ''?>"
                >
            </div>

            <div class="form-group">
                <label for="">IMG</label>
                <input type="file" class="form-control" name="img" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['img'] : ''?>"
                >
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id=""
                          placeholder="Input..."><?= isset($app->content['edit']) ? $app->content['edit'][0]['description'] : ''?></textarea>
            </div>



            <input type="submit" name='submit' value="speichern" class="btn btn-primary">
        </form>
    </div>

</div>