<?php include_once "layouts/header.php" ?>
<?php include_once "layouts/footer.php" ?>
<form name="myForm" action="/users/create" method="post" onsubmit="return validate();">
    <h1>Your form</h1>
    <div class="form-group">
        <label>First name and last name</label>
        <input type="text" name = "name" class="form-control input" placeholder="Enter your name and surname">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name = "email" class="form-control input" placeholder="Enter your email">
    </div>
    <div>
    <select class="input" name="gender">
        <option selected>Male</option>
        <option>Female</option>
    </select><br><br>
    </div>
    <div>
    <select class="input" name="status">
        <option selected>Active</option>
        <option>Inactive</option>
    </select><br><br>
    </div>
    <button type="submit" class="btn btn-light">Add user</button>
</form>


