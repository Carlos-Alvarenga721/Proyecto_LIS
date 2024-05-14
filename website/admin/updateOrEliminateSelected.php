<?php

// script de conexion a la base de datos
require_once('inc/dbConnection.php');

// obtencion de los datos
$id = filter_input(INPUT_POST, 'reservationSelect', FILTER_UNSAFE_RAW);
$check_in = filter_input(INPUT_POST, 'check_in', FILTER_UNSAFE_RAW);
$check_out = filter_input(INPUT_POST, 'check_out', FILTER_UNSAFE_RAW);
$adult = filter_input(INPUT_POST, 'adult', FILTER_UNSAFE_RAW);
$children = filter_input(INPUT_POST, 'children', FILTER_UNSAFE_RAW);


if(array_key_exists('btnCambiar', $_POST)) { 
    
  // Preparacion del enunciado SQL
  $sql = "UPDATE reservaciones 
            SET fechaEntrada = ?, 
                fechaSalida = ?, 
                adultos = ?, 
                menores = ? 
            WHERE id = ?";

  $stmt = $conn->prepare($sql);

  // Asignacion de parametros
  $stmt->bind_param("ssssi", $check_in, $check_out, $adult, $children, $id);

  if ($stmt->execute()) {
    header('Location: index.php');
    exit();

  } else {
    header('Location: index.php');
    exit();
  }

} 
else if(array_key_exists('btnEliminar', $_POST)) { 
  
  // Preparacion del enunciado SQL
  $sql = "DELETE FROM reservaciones
            WHERE id = ?";

  $stmt = $conn->prepare($sql);

  // Asignacion de parametros
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header('Location: index.php');
    exit();

  } else {
    header('Location: index.php');
    exit();
  }

}


// Cierre de statement y connection
$stmt->close();
$conn->close();

?>