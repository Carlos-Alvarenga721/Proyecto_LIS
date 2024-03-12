<?php

declare(strict_types = 1);

function get_user(object $pdo, string $username){
    $query = "SELECT * FROM users WHERE username=:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
    //en esta caso el Fetch toma un solo resultado de la base de datos, y como parametro le ponemos fetch_assoc para referirnos a los datos dentro de nuestra BD, usando el nombre de la columna de la tabla, en vez de tomar los datos con un array indexado (osea con numeros) y con el fetch_assoc lo hacemos asociativo.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}