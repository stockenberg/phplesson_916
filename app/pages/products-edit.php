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
                    <td><img src="uploads/img/products/<?= $product['img'] ?>" height="50" alt=""></td>
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
        <form
                action="<?= isset($app->content['edit']) ? '?p=products-edit&action=update&update=' . $app->content['edit'][0]['id'] : '?p=products-edit&action=insert' ?>"
                method="post"
                role="form"
                enctype="multipart/form-data"
        >
            <legend>Products Edit <br>
            action: <?= isset($app->content['edit']) ? '?p=products-edit&action=update&update=' . $app->content['edit'][0]['id'] : '?p=products-edit&action=insert' ?>
            </legend>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id=""
                       placeholder="Input..."
                    value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['name'] : @$_POST['name']?>"
                >
                <p class="error text-danger"><?= \Marten\classes\Status::read('name') ?></p>
            </div>

            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" name="amount" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['amount'] : @$_POST['amount']?>"
                >
                <p class="error text-danger"><?= \Marten\classes\Status::read('amount') ?></p>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['price'] : @$_POST['price']?>"
                >
                <p class="error text-danger"><?= \Marten\classes\Status::read('price') ?></p>
            </div>

            <div class="form-group">
                <label for="">IMG</label>
                <input type="file" class="form-control" name="img" id=""
                       placeholder="Input..."
                       value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['img'] : ''?>"
                >
                <p class="error text-danger"><?= \Marten\classes\Status::read('img') ?></p>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id=""
                          placeholder="Input..."><?= isset($app->content['edit']) ? $app->content['edit'][0]['description'] : @$_POST['description']?></textarea>
                <p class="error text-danger"><?= \Marten\classes\Status::read('description') ?></p>
            </div>


            <input type="hidden" name="current_image" value="<?= isset($app->content['edit']) ? $app->content['edit'][0]['img'] : ''?>">
            <input type="submit" name='submit' value="speichern" class="btn btn-primary">
        </form>
    </div>

</div>