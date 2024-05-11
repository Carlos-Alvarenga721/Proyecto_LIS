const updateButton = document.getElementById('updateButton');
const changeButton = document.getElementById('btnCambiar');

updateButton.addEventListener('click', fetchDataAndUpdateTableAndSelect);
changeButton.addEventListener('click', fetchDataAndUpdateTableAndSelect);

window.onload = function() {
    fetchDataAndUpdateTableAndSelect(); // Fetch and update table data
};

function fetchDataAndUpdateTableAndSelect() {
  // tratamiento de los datos
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'fetchReservationData.php'); // script PHP para la obtencion de los datos
  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText); // JSON
      const reservationData = response.data; // Todos los datos
      const reservationIds = response.ids // solo los id
      
      updateTableWithData(reservationData); // update de la tabla con los datos obtenidos
    
      // Llenar el select
      updateSelect(reservationIds);
    } else {
      console.error('Error fetching data:', xhr.statusText);
    }
  };
  xhr.send();
}

function updateTableWithData(data) {
  const tableBody = document.querySelector('table tbody'); // Seleccionar la parte tbody
  tableBody.innerHTML = ''; // Limpiar la tabla, menos los encabezados

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

function updateSelect(data){
  const selectElement = document.querySelector('.form-select');
  // Limpiar el select
  selectElement.innerHTML = '';

  const option1 = document.createElement('option');
  option1.value = 0;
  option1.text = 'Seleccione la id';
  selectElement.appendChild(option1);


  data.forEach(id => {
    const option = document.createElement('option');
    option.value = id;
    option.text = id;
    selectElement.appendChild(option);
  });
}