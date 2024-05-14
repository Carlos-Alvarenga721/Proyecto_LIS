<?php

require_once('inc/dbConnection.php');

// Chequeo de si la id es suministrada
if (isset($_GET['id'])) {
  $reservationId = mysqli_real_escape_string($conn, $_GET['id']);

  // Uso de WHERE para filtrar por ID
  $sql = "SELECT id, fechaEntrada, fechaSalida, adultos, menores FROM reservaciones WHERE id = $reservationId";
} else {
  // Si la id no es brindada, se suministra data vacia
  $sql = "SELECT NULL AS id, NULL AS fechaEntrada, NULL AS fechaSalida, NULL AS adultos, NULL AS menores";
}

$result = mysqli_query($conn, $sql);

$reservationData = []; // Array para almacenar los datos de reservacion

if ($result && mysqli_num_rows($result) > 0) {
  $reservationData = mysqli_fetch_assoc($result); // Fila por ID
}

$response = [
  'data' => $reservationData, // Datos de reservacion
];

echo json_encode($response); // Pasar a JSON

mysqli_close($conn);

?>
