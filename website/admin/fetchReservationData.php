<?php

  require_once('inc/dbConnection.php');

  $sql = "SELECT id, fechaEntrada, fechaSalida, adultos, menores FROM reservaciones";
  $result = mysqli_query($conn, $sql);

  $reservationData = []; // Array to store reservation data
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $reservationData[] = $row;
    }
  }

  echo json_encode($reservationData); // Convert array to JSON

  mysqli_close($conn);

?>