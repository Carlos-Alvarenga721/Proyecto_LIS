<?php

// Detalles para Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hbwebsite";

// Se crea la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Check
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>