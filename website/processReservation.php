<?php

// script de conexion a la base de datos
require_once('inc/dbConnection.php');

// obtencioN de los datos
$check_in = filter_input(INPUT_POST, 'check_in', FILTER_UNSAFE_RAW);
$check_out = filter_input(INPUT_POST, 'check_out', FILTER_UNSAFE_RAW);
$adult = filter_input(INPUT_POST, 'adult', FILTER_UNSAFE_RAW);
$children = filter_input(INPUT_POST, 'children', FILTER_UNSAFE_RAW);

// Preparacion del enunciado SQL
$sql = "INSERT INTO reservaciones (fechaEntrada, fechaSalida, adultos, menores) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssss", $check_in, $check_out, $adult, $children);

if ($stmt->execute()) {
  // Reserva exitosa
  // Mensaje de aviso y preparacion de datos para el modal (JSON format)
  $message = "Reservation saved successfully!";
  $modalData = json_encode([
    'type' => 'success', // or 'error' for failure
    'message' => $message
  ]);

  // Redireccion a index.php con los datos para el modal en query string
  $modalQueryString = "?modalData=" . $modalData;
  header('Location: index.php' . $modalQueryString);
  exit();

} else {
  // Fallo en la reservacion
  // Mensaje de aviso y preparacion de datos para el modal (JSON format)
  $message = "Error: " . $conn->error;
  $modalData = json_encode([
    'type' => 'error', // o 'success' para la reserva exitosa
    'message' => $message
  ]);

  // Redireccion a index.php con los datos para el modal en query string
  $modalQueryString = "?modalData=" . $modalData;
  header('Location: index.php' . $modalQueryString);
  exit();
}


// Cierre de statement y connection
$stmt->close();
$conn->close();

?>