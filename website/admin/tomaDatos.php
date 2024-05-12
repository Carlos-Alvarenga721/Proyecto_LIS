<?php

  require_once('inc/dbConnection.php');

  $sql = "SELECT id, fechaEntrada, fechaSalida, adultos, menores FROM reservaciones ORDER BY id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
      echo "<thead>";
        echo "<tr>";
          echo "<th class='text-center'>ID</th>";
          echo "<th class='text-center'>Fecha de entrada (dia/mes/año)</th>";
          echo "<th class='text-center'>Fecha de salida (dia/mes/año)</th>";
          echo "<th class='text-center'>Adultos</th>";
          echo "<th class='text-center'>Menores</th>";
        echo "</tr>";
      echo "<thead>";
      echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
              echo "<td class='text-center'>" . $row["id"] . "</td>";
              echo "<td class='text-center'>" . $row["fechaEntrada"] . "</td>";
              echo "<td class='text-center'>" . $row["fechaSalida"] . "</td>";
              echo "<td class='text-center'>" . $row["adultos"] . "</td>";
              echo "<td class='text-center'>" . $row["menores"] . "</td>";
            echo "</tr>";
        }
      echo "</tbody>";
    echo "</table>";
  } else {
    echo "No reservations found";
  }

  mysqli_close($conn);

?>