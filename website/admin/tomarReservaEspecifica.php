<?php

require_once('inc/dbConnection.php');

// Check if ID is provided in the query string
if (isset($_GET['id'])) {
  $reservationId = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input

  // Build the query with a WHERE clause to filter by ID
  $sql = "SELECT id, fechaEntrada, fechaSalida, adultos, menores FROM reservaciones WHERE id = $reservationId";
} else {
  // If no ID provided, return an error or empty data
  $sql = "SELECT NULL AS id, NULL AS fechaEntrada, NULL AS fechaSalida, NULL AS adultos, NULL AS menores"; // For example
}

$result = mysqli_query($conn, $sql);

$reservationData = []; // Array to store reservation data (might be empty)

if ($result && mysqli_num_rows($result) > 0) {
  $reservationData = mysqli_fetch_assoc($result); // Assuming only one row for specific ID
}

$response = [
  'data' => $reservationData, // Reservation data (might be empty)
];

echo json_encode($response); // Convert to JSON

mysqli_close($conn);

?>
