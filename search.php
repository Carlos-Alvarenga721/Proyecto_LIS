<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usersearch = $_POST["usersearch"];
    

    try {
        
        require_once "includes/dbh.inc.php";

        $query = "SELECT*FROM comments WHERE username = :usersearch";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch",$usersearch);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        printf("algo malo paso y no se que es <br>");
        die("Query failed: ". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index2</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="container">
    <h3>Search Results:</h3> 
    <?php 
        if(empty($results))
    {
        echo "<div>";
        echo "<p>There is no results!</p>";
        echo "<div>";
    }     
    else{
        foreach ($results as $row){
            echo "<div class='results'>";
            echo "<h3>" .htmlspecialchars($row["username"]). "</h3>"; 
            echo "<p>".htmlspecialchars($row["comment_text"])."</p>"; 
            echo "<p>" .htmlspecialchars($row["created_at"]). "</p>"; 
            echo "<br>";
            echo "</div>";
        }
    }   
    ?>
</div>
</body>
</html>


