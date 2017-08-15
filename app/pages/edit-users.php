<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($app->content['users'] ?? [] as $index => $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['updated_at'] ?></td>
                    <td>EDIT: <?= $user['id'] ?></td>
                    <td><a href="?p=edit-users&action=delete&id=<?= $user['id'] ?>">Delete</a></td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="?p=edit-users&action=create" method="post" role="form">
            <legend>Add Users</legend>

            <div class="form-group">
                <label for="">Benutzername</label>
                <input type="text" class="form-control" name="username" id=""
                       placeholder="">
                <p class="text-danger"><?= \Marten\classes\Status::read('username') ?></p>
            </div>

            <div class="form-group">
                <label for="">E-Mail-Adresse</label>
                <input type="text" class="form-control" name="email" id=""
                       placeholder="">
                <p class="text-danger"><?= \Marten\classes\Status::read('email') ?></p>

            </div>

            <div class="form-group">
                <label for="">Rolle</label>
                <select name="role" id="" class="form-control">
                    <option selected value="">bitte wählen...</option>
                    <option value="<?= ADMIN ?>">Admin</option>
                    <option value="<?= AUTHOR ?>">Author</option>
                </select>
                <p class="text-danger"><?= \Marten\classes\Status::read('role') ?></p>

            </div>

            <div class="form-group">
                <label for="">Passwort</label>
                <input type="password" class="form-control" name="password"
                       id=""
                       placeholder="">
                <p class="text-danger"><?= \Marten\classes\Status::read('password') ?></p>

            </div>


            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>