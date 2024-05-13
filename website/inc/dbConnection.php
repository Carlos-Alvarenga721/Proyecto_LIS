<?php

// Conexion con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hbwebsite";

// Creamos la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificacmos la conexcion en caso exista un error
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>