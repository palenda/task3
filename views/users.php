<?php include_once "layouts/header.php" ?>
<?php include_once "layouts/footer.php" ?>
<h1>Database:</h1>
    <form action="/users" method="post">
        <input type="submit" class="btn btn-dark" value="Delete selected" onclick="return confirm('Delete this?');">
        <br><br>
        <div class="table-responsive-sm">
        <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col"><input type="checkbox" class="btn-check" id="checkAll"></th>
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
        <tr>
                <td><label>
                        <input type="checkbox" class="checkItem" value="<?=$user['id']?>" name="multiply[]">
                    </label></td>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['gender']; ?></td>
                <td><?= $user['status']; ?></td>
                <td>
                    <a href="/users/<?=$user['id']?>" class="btn btn-outline-dark" onclick="return confirm('Delete this?');">
                        Delete
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    </a>
                    <a href="/users/edit/<?=$user['id']?>" class="btn btn-outline-dark">
                        Edit
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    </a>
                </td>
        </tr>
        <?php endforeach;?>
    </tbody>
        </table>
    </div>
</form>
<div class="container my-5">
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a href="?page=<?=$_GET['page'] - 1;?>" class="page-link bg-dark">&laquo;</a></li>
            <?php for ($i = 1; $i <= $params['pages']; $i++): ?>
            <li class="page-item"><a href="?page=<?= $i; ?>" class="page-link bg-dark"><?= $i ?></a></li>
            <?php endfor;?>
            <li class="page-item"><a href="?page=<?=$_GET['page'] + 1;?>" class="page-link bg-dark">&raquo;</a></li>
        </ul>
    </nav>
</div>

