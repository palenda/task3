<?php include_once "layouts/header.php" ?>
<?php include_once "layouts/footer.php" ?>
<link rel="stylesheet" href="../../assets/css/style.css">
<script type="text/javascript" src="../../assets/js/validate.js"></script>
<body>
<form name="myForm" action="/users/update" method="post" onsubmit="return validate();">
    <div>
        <h1>Edit user</h1>
    </div>
        <?php foreach ($params['user'] as $user): ?>
        <div class="form-group">
            <label>First name and last name</label>
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <input type="text" name = "name" value="<?= $user['name']; ?>" class="form-control input" placeholder="Enter your name and surname">
        </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name = "email" value="<?= $user['email']; ?>" class="form-control input" placeholder="Enter your email">
            </div>
            <select class="input" name="gender">
                <?php if ($user['gender'] == 'Female'): ?>
                <option selected><?= $user['gender']; ?></option>
                <option>Male</option>
                <?php else :?>
                <option selected><?= $user['gender']; ?></option>
                <option>Female</option>
                <?php endif; ?>
            </select><br><br>
            <select class="input" name="status">
                <?php if ($user['status'] == 'Active'): ?>
                    <option selected><?= $user['status']; ?></option>
                    <option>Inactive</option>
                <?php else :?>
                    <option selected><?= $user['status']; ?></option>
                    <option>Active</option>
                <?php endif; ?>
            </select><br><br>
            <button type="submit" class="btn btn-light">Update user</button>
        <?php endforeach; ?>
</form>
</body>

