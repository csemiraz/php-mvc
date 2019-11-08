<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5" style="max-width:400px">
    <h2>Database Setup</h2>
    <form action="/action_page.php">
        <div class="form-group">
            <label>Database Name:</label>
            <input type="email" class="form-control" placeholder="Database Name" name="database_name">
        </div>
        <div class="form-group">
            <label>Database User Name:</label>
            <input type="email" class="form-control" placeholder="Database User Name" name="user_name">
        </div>

        <div class="form-group">
            <label>Database Password:</label>
            <input type="password" class="form-control" placeholder="Database Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
