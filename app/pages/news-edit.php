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
                <td><a href="" class="btn btn-warning">Edit</a></td>
                <td><a href="?p=news-edit&action=delete&delete=ID_VOM_ARTIKEL" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>



        </tbody>

    </table>

    <div class="row">

        <form action="?p=news-edit&action=insert" method="post">

            <div class="form-group">

                <label for="">Title</label>
                <input type="text" class="form-control" name="title">

            </div>

            <div class="form-group">

                <label for="">Text</label>
                <textarea class="form-control" name="content"></textarea>

            </div>

            <input type="submit" name="submit" value="Speichern" class="btn btn-success">

        </form>

    </div>

</div>