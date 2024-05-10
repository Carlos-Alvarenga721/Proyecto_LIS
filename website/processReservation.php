<?php

// Include the database connection script (if separate)
require_once('inc/dbConnection.php'); // Adjust the path if necessary

// Get form data (sanitize to prevent injection attacks!)
$check_in = filter_input(INPUT_POST, 'check_in', FILTER_UNSAFE_RAW);
$check_out = filter_input(INPUT_POST, 'check_out', FILTER_UNSAFE_RAW);
$adult = filter_input(INPUT_POST, 'adult', FILTER_UNSAFE_RAW);
$children = filter_input(INPUT_POST, 'children', FILTER_UNSAFE_RAW);

// Prepare SQL statement (prevents injection)
$sql = "INSERT INTO reservaciones (fechaEntrada, fechaSalida, adultos, menores) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters (improves security and performance)
$stmt->bind_param("ssss", $check_in, $check_out, $adult, $children);

if ($stmt->execute()) {
  // Reservation saved successfully
  // Set a success message and prepare modal data (JSON format)
  $message = "Reservation saved successfully!";
  $modalData = json_encode([
    'type' => 'success', // or 'error' for failure
    'message' => $message
  ]);

  // Redirect to index.php with modal data in query string
  $modalQueryString = "?modalData=" . $modalData;
  header('Location: index.php' . $modalQueryString);
  exit(); // Stop further execution

} else {
  // Reservation failed
  // Set an error message and prepare modal data (JSON format)
  $message = "Error: " . $conn->error;
  $modalData = json_encode([
    'type' => 'error', // or 'success' for failure
    'message' => $message
  ]);

  // Redirect to index.php with modal data in query string
  $modalQueryString = "?modalData=" . $modalData;
  header('Location: index.php' . $modalQueryString);
  exit(); // Stop further execution
}


// Close the statement and connection
$stmt->close();
$conn->close();

?>