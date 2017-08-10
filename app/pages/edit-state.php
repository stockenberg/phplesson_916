<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($app->content['states'] as $index => $state) : ?>
                <tr>
                    <td><?= $state['state_id'] ?></td>
                    <td><?= $state['name'] ?></td>
                    <td>
                        <a href="?p=edit-state&action=delete&id=<?= $state['id'] ?>"
                           class="btn">Delete</a></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>


    </div>
    <div class="row">
        <form action="?p=edit-state&action=insert" method="post" role="form">
            <legend>Insert new Status</legend>

            <div class="form-group">
                <label for=""></label>
                <input type="text" class="form-control" name="name" id=""
                       placeholder="Input...">
                <p class="label label-danger "><?= \Marten\classes\Status::read('name'); ?></p>
            </div>

            <div class="form-group">
                <label for=""></label>
                <input type="number" min="1" class="form-control"
                       name="state_id" id=""
                       placeholder="Input...">
                <p class="label label-danger"><?= \Marten\classes\Status::read('state_id') ?></p>
            </div>

            <div class="form-group">


                <input type="submit" name="submit" class="btn btn-primary"
                       value="Submit">
            </div>

        </form>
    </div>
</div>