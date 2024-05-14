<?php

// script de conexion a la base de datos
require_once('inc/dbConnection.php'); // Adjust the path if necessary

// toma de datos del form
$check_in = filter_input(INPUT_POST, 'check_in', FILTER_UNSAFE_RAW);
$check_out = filter_input(INPUT_POST, 'check_out', FILTER_UNSAFE_RAW);
$adult = filter_input(INPUT_POST, 'adult', FILTER_UNSAFE_RAW);
$children = filter_input(INPUT_POST, 'children', FILTER_UNSAFE_RAW);

//-------------------------------------PARTE DE LAS RESERVAS EN MEDIO
// Verificar si las fechas seleccionadas están disponibles
try {
  $sql = "SELECT * FROM reservaciones WHERE (fechaEntrada BETWEEN '$check_in' AND '$check_out') OR (fechaSalida BETWEEN '$check_in' AND '$check_out')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // fallo en la reservacion
      // Mensaje de error y preparacion de la informacion para el modal (JSON)
      $message = "Lo sentimos, las fechas seleccionadas ya están reservadas.";
      $modalData = json_encode([
          'type' => 'error',
          'message' => $message

      ]);
      // Redireccion a index.php con los datos para en modal en query string
      $modalQueryString = "?modalData=" . $modalData;
      header('Location: index.php' . $modalQueryString);
      exit();
      
} else {
    // Las fechas están disponibles, permitir al usuario hacer la reserva
    $sql = "INSERT INTO reservaciones (fechaEntrada, fechaSalida, adultos, menores) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  // Asignacion de parametros
  $stmt->bind_param("ssss", $check_in, $check_out, $adult, $children);

  if ($stmt->execute()) {
    // Reservacion exitosa
    // Mensaje de exito y preparacion de la informacion para el modal (JSON)
    $message = "Reservation saved successfully!";
    $modalData = json_encode([
      'type' => 'success',
      'message' => $message
    ]);

    // Redireccion a index.php con los datos para en modal en query string
    $modalQueryString = "?modalData=" . $modalData;
    header('Location: index.php' . $modalQueryString);
    exit();

  } else {
    // fallo en la reservacion
    // Mensaje de error y preparacion de la informacion para el modal (JSON)
    $message = "Error: " . $conn->error;
    $modalData = json_encode([
      'type' => 'error',
      'message' => $message
    ]);

    // Redireccion a index.php con los datos para en modal en query string
    $modalQueryString = "?modalData=" . $modalData;
    header('Location: index.php' . $modalQueryString);
    exit();
  }

  // Cerrar statement y la conexion
  $stmt->close();
  $conn->close();
}

}catch (Exception $e) {
  echo json_encode(['error' => $e->getMessage()]);
  exit;
}

//-----------------------------------------------------------
// Consultar la base de datos para obtener las fechas ocupadas

// Prepare SQL statement (prevents injection) ES LA PARTE DE CRUZ
  
//PARTE DEL CALENDARIO CON COLORES 


?>