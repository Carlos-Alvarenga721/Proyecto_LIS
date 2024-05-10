<?php
require ('inc/essentials.php');
adminLogin();
session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">


    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <button type="button" class="btn btn-success mb-3" style="float: right;" id="updateButton">Actualizar datos</button>
                <script>
                    const updateButton = document.getElementById('updateButton');

                    updateButton.addEventListener('click', fetchDataAndUpdateTable);

                    function fetchDataAndUpdateTable() {
                      // 1. Fetch Reservation Data (Similar to the PHP code above)
                      const xhr = new XMLHttpRequest();
                      xhr.open('GET', 'fetchReservationData.php'); // Replace with your actual data fetching script URL
                      xhr.onload = function() {
                        if (xhr.status === 200) {
                          const reservationData = JSON.parse(xhr.responseText); // Assuming JSON response
                          updateTableWithData(reservationData); // Function to update table with fetched data
                        } else {
                          console.error('Error fetching data:', xhr.statusText);
                        }
                      };
                      xhr.send();
                    }

                    function updateTableWithData(data) {
                      const tableBody = document.querySelector('table tbody'); // Assuming you have a <tbody> element in your table
                      tableBody.innerHTML = ''; // Clear existing table rows

                      data.forEach(reservation => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                          <td class='text-center'>${reservation.id}</td>
                          <td class='text-center'>${reservation.fechaEntrada}</td>
                          <td class='text-center'>${reservation.fechaSalida}</td>
                          <td class='text-center'>${reservation.adultos}</td>
                          <td class='text-center'>${reservation.menores}</td>
                        `;
                        tableBody.appendChild(row);
                      });
                    }
                </script>

                <?php require('tomaDatos.php');?>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php');?>

</body>
</html>