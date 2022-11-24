<?php include_once "layouts/header.php" ?>
<?php include_once "layouts/footer.php" ?>

<h1>Database:</h1>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($params['users'] as $user): ?>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['gender']; ?></td>
                <td><?= $user['status']; ?></td>
                <td>
                    <a href="/users/<?=$user['id']?>" class="btn btn-outline-dark" onclick="return confirm('Really delete?');">
                        Delete
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    </a>
                    <a href="/users/edit/<?=$user['id']?>" class="btn btn-outline-dark">
                        Edit
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</form>

