const checkInInput = document.getElementById('check_in');
const checkOutInput = document.getElementById('check_out');
const btnForm = document.getElementById('btnForm');
const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

// Limpieza del check in y check out

window.addEventListener('load', function() {
		clearCheckInCheckOut(); // Call the clearing function
});

function clearCheckInCheckOut() {
  const checkInInput = document.getElementById('check_in');
  const checkOutInput = document.getElementById('check_out');

  if (checkInInput && checkOutInput) {
    checkInInput.value = ''; // Clear check-in input
    checkOutInput.value = ''; // Clear check-out input
  }
}

checkInInput.addEventListener('change', () => {
	if (checkInInput.value < today) {
	  alert('Please select a check-in date on or after today.');
	  checkInInput.value = ''; // Clear the input if it's an invalid date
	}else{
		updateCheckoutMin();
	}
});
checkOutInput.addEventListener('change', () => {
	if (checkOutInput.value < today || checkOutInput.value < checkInInput.value) {
	  alert('Please select a correct check-out date');
	  checkOutInput.value = ''; // Clear the input if it's an invalid date
	}
});

function updateCheckoutMin() {
  const checkInDate = checkInInput.value; // Get the check-in date
  if (!checkInDate) return; // If no check-in date is selected, do nothing

  // Set the check-out input's min attribute to the check-in date
  checkOutInput.min = checkInDate;
}