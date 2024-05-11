<?php

  require_once('inc/dbConnection.php');

  $sql = "SELECT id, fechaEntrada, fechaSalida, adultos, menores FROM reservaciones ORDER BY id";
  $result = mysqli_query($conn, $sql);

  $reservationData = []; // Array para almacenar los datos de las reservaciones
  $reservationIds = []; // Array para almacenar IDs
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $reservationData[] = $row;
      $reservationIds[] = $row['id']; // Extrae ID
    }
  }

  $response = [
    'data' => $reservationData, // Todos los datos
    'ids' => $reservationIds // Solo los ID
  ];

  echo json_encode($response); // array a JSON

  mysqli_close($conn);

?>