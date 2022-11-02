<!doctype html>
<html lang="en">
<head>
    <link href="../assets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post">
    <div>
        <h1>Your form</h1>
    </div>
    <div class="mb-3">
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
    <button type="submit" class="btn btn-primary" href="/usersForm/new">Submit</button>
</form>
</body>
</html>

