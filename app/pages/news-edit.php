<div class="container">

    <table class="table table-striped">

        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($app->content['news'] as $index => $news) : ?>
            <tr>
                <td><?= $news['id'] ?></td>
                <td><?= $news['title'] ?></td>
                <td><?= $news['content'] ?></td>
                <td><?= date('d.m.Y H:i', strtotime($news['created_at'])) ?> Uhr</td>
                <td><?= date('d.m.Y H:i', strtotime($news['updated_at'])) ?> Uhr</td>
                <td><a href="?p=news-edit&action=edit&edit=<?= $news['id'] ?>" class="btn btn-warning">Edit</a></td>
                <td><a href="?p=news-edit&action=delete&delete=<?= $news['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>



        </tbody>

    </table>

    <div class="row">
        <!--  -->
        <form action="?p=news-edit&action=insert" method="post">

            <div class="form-group">

                <label for="">Title</label>
                <input type="text" class="form-control"
                       value="<?= $app->content['edit'][0]['title'] !== '' ? $app->content['edit'][0]['title'] : '' ?>"
                       name="title">
                <p class="text-danger">
                    <?= \Marten\classes\Status::read('title') ?>
                </p>

            </div>

            <div class="form-group">

                <label for="">Text</label>
                <textarea class="form-control" name="content"><?=
					$app->content['edit'][0]['content'] !== '' ? $app->content['edit'][0]['content'] : ''
                    ?></textarea>
                <p class="text-danger">
                    <?= \Marten\classes\Status::read('content') ?>
                </p>

            </div>

            <input type="submit" name="submit" value="Speichern" class="btn btn-success">

        </form>

    </div>

</div>