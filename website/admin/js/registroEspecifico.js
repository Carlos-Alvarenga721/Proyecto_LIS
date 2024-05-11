const reservationSelect = document.getElementById('reservationSelect');
const reservationDetails = document.getElementById('reservationDetails');
const inputFechaEntrada = document.getElementById('check_in');
const inputFechaSalida = document.getElementById('check_out');
const adultSelect = document.querySelector('select[name="adult"]');
const childrenSelect = document.querySelector('select[name="children"]');
const btnActualizar = document.getElementById('btnActualizar');
const btnEliminar = document.getElementById('btnEliminar');


//Obtener los datos de una reservacion por su id
function fetchReservationDetails(reservationId) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `./tomarReservaEspecifica.php?id=${reservationId}`); // Pass ID as query parameter
  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText); // Assuming JSON response
      const reservationData = response.data;
      if (reservationData) { // Check if data exists for the ID
        inputFechaEntrada.value = reservationData.fechaEntrada;
        inputFechaSalida.value = reservationData.fechaSalida;
        adultSelect.value = reservationData.adultos;
        childrenSelect.value = reservationData.menores;
      } else {
        console.error('Reservation details not found for ID:', reservationId);
        // Optionally display an error message to the user
      }
    } else {
      console.error('Error fetching reservation details:', xhr.statusText);
    }
  };
  xhr.send();
}

reservationSelect.addEventListener('change', function() {
  const selectedId = this.value;
  if (selectedId !== "") { // Check if a valid ID is selected
    reservationDetails.style.display = 'block'; // Show reservation details container
    btnActualizar.removeAttribute('hidden'); // Unhide 'Actualizar' button
    btnEliminar.removeAttribute('hidden'); // Unhide 'Eliminar' button
    fetchReservationDetails(selectedId); // Fetch and update reservation details
  } else {
    reservationDetails.style.display = 'none'; // Hide reservation details container
    btnActualizar.setAttribute('hidden', true); // Hide 'Actualizar' button
    btnEliminar.setAttribute('hidden', true); // Hide 'Eliminar' button
    // Clear form elements (optional)
  }
});