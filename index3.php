<?php 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index2</title>
    <link rel="stylesheet" href="Style2.css">
</head>
<body>
    <div class="container">
    <h3>Form for searching Users</h3>
        <form action="search.php" method="post" class="searchForm">
            <label for="search"> Search for users:</label>
            <input type="text" id="search" name="usersearch" placeholder="Searching...">
            <button>Search</button>
        </form>
    </div>
</body>
</html>


