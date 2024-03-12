<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);

        $option = [
            'cost' => 12
        ];
        
        $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT, $option);
        
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":pwd",$hashedPwd);
        $stmt->bindParam(":email",$email);

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
