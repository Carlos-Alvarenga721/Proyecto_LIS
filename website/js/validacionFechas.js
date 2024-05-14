const checkInInput = document.getElementById('check_in');
const checkOutInput = document.getElementById('check_out');
const btnForm = document.getElementById('btnForm');
const today = new Date().toISOString().split('T')[0]; // Obtencion de la fecha de hoy en YYYY-MM-DD
var cont = 0;

// Limpieza del check in y check out

window.addEventListener('load', function() {
		clearCheckInCheckOut(); // Llamado a la funcion de limpieza del form
});

function clearCheckInCheckOut() {
  const checkInInput = document.getElementById('check_in');
  const checkOutInput = document.getElementById('check_out');

  if (checkInInput && checkOutInput) {
    checkInInput.value = ''; // Limpieza del check-in
    checkOutInput.value = ''; // Limpieza del check-out
    cont = 0;
  }
}

checkInInput.addEventListener('change', () => {
	if (checkInInput.value < today) {
	  alert('Please select a check-in date on or after today.');
	  checkInInput.value = ''; // Limpieza del input si la fecha es invalida
	}else{
		cont++;
		updateCheckoutMin();
		if(cont == 2){
			btnForm.removeAttribute("hidden");
 		}
	}
});
checkOutInput.addEventListener('change', () => {
	if (checkOutInput.value < today || checkOutInput.value < checkInInput.value) {
	  alert('Please select a correct check-out date');
	  checkOutInput.value = ''; // Limpieza del input si la fecha es invalida
	}else{
		cont++;
		if(cont == 2){
			btnForm.removeAttribute("hidden");
		 }
	}
});

function updateCheckoutMin() {
  const checkInDate = checkInInput.value; // Tomar la fecha del check-in
  if (!checkInDate) return; // Si no hay fecha seleccionada, no hacer nada

  // Establecer una fecha minima para el check-out igual a la fecha del check-in
  checkOutInput.min = checkInDate;
}