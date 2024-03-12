<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE username = :username AND pwd = :pwd;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":pwd",$pwd);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        
        die();
    } catch (PDOException $e) {
        printf("algo malo paso y no se que es <br>");
        die("Query failed: ". $e->getMessage());
    }
}else{
    header("Location: ../index.php");
} 
