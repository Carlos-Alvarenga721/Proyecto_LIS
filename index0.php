<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="container">
        <h3>Change Account</h3>

        <form action="includes/userupdate.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="email" placeholder="Email">
            <button>Update</button>
        </form>

        <h3>Delete Account</h3>

        <form action="includes/userdelete.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Delete</button>
        </form>

    </div>
</body>
</html>