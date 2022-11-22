<?php
include_once "layouts/header.php";
include_once "layouts/footer.php";
?>
<body>
<form action="/users/create" method="post">
    <div>
        <h1>Your form</h1>
    </div>
    <div class="form-group">
        <label>First name and last name</label>
        <input type="text" name = "name" class="form-control" placeholder="Enter your name and surname">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name = "email" class="form-control" placeholder="Enter your email">
    </div>
    <select name="gender">
        <option selected>Male</option>
        <option>Female</option>
    </select><br><br>
    <select name="status">
        <option selected>Active</option>
        <option>Inactive</option>
    </select><br><br>
    <button type="submit" class="btn btn-primary">Add user</button>
</form>
</body>
