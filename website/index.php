<?php
require_once('inc/dbConnection.php'); // Adjust the path if necessary
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto reservaciones</title> 	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<?php require('inc/links.php');?>
	<style type="text/css">
		.availability-form{
			margin-top: -75px;
			z-index: 2;
			position: relative;
		}

		@media screen and (max-width: 575px) {
			.availability-form{
				margin-top: 0px;
				padding: 0 35px;
			}
		}

		@media (min-width: 992px) and (max-width: 1199.98px){
			.boton{	
				margin-left: -1rem;	
			}
		}

		.modal {
            display: none; /* hidden al inicio */
            position: fixed;
            z-index:2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* background oscuro transparente */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* Boton de cerrar */
        .close {
            color: #fff;
            float: right;
            font-size: 36px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            cursor: pointer;
        }

        .modal-content.success {
            border-color: green;
        }

        .modal-content.error {
            border-color: red;
        }
		/*Parte del color de calendario*/
		.occupied-date {
            background-color: red;
        }
        .available-date {
            background-color: green;
		}

	</style>

</head>
<body class="bg-light">
	<!--Mando a llamar al archivo header-->
	<?php require('inc/header.php');?>

	<!-- Carousel -->
	<!-- Swiper -->
	<div class="container-fluid px-lg-4 mt-4">
		<div class="swiper swiper-container">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide">
		        <img src="images/carousel/img1.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/img2.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/img3.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/img4.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/img5.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/img6.png" class="w-100 d-block">
		      </div>
		    </div>
  		</div>
	</div>

	<!-- form de registro -->\
	<div class="container availability-form">
		<div class="row">
			<div class="col-lg-12 bg-white shadow p-4 rounded">
				<h5 class="mb-4">Chequeo de disponibilidad de reservacion</h5>

				<!-- processReservation.php para almacenar la reservacion en la base de datos -->
				<form action="processReservation.php" method="post">
					<div class="row align-items-end">
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Fecha de entrada</label>
					    	<input type="date" class="form-control shadow-none" name="check_in" id="check_in" min="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Fecha de salida</label>
					    	<input type="date" class="form-control shadow-none" name="check_out" id="check_out" min="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Adultos</label>
					    	<select class="form-select shadow-none" name="adult">
							  <option value="1" selected>1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							</select>
						</div>
						<div class="col-lg-2 mb-3">
							<label class="form-label" style="font-weight: 500;">Menores</label>
					    	<select class="form-select shadow-none" name="children">
							  <option value="0" selected>Selecciona</option>
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							</select>
						</div>
						<div class="boton col-lg-1 mb-lg-3 mt-2">
							<button type="submit" class="btn text-white shadow-none custom-bg" id="btnForm" hidden>Reservar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--Scripts para poder hacer los colores en el calendario-->
	<script>
		// Función para marcar las fechas ocupadas en los inputs de fecha
		function markReservedDates(reservedDates) {
			var checkInInput = document.getElementById('check_in');
			var checkOutInput = document.getElementById('check_out');
			var currentDate = new Date(checkInInput.value);
			var endDate = new Date(checkOutInput.value);
			while (currentDate <= endDate) {
				var dateString = currentDate.toISOString().slice(0, 10);
				if (reservedDates.includes(dateString)) {
					// Marcar la fecha como ocupada
					checkInInput.classList.remove('available-date');
					checkOutInput.classList.remove('available-date');
					checkInInput.classList.add('occupied-date');
					checkOutInput.classList.add('occupied-date');
				} else {
					// Marcar la fecha como disponible
					checkInInput.classList.remove('occupied-date');
					checkOutInput.classList.remove('occupied-date');
					checkInInput.classList.add('available-date');
					checkOutInput.classList.add('available-date');
				}
				currentDate.setDate(currentDate.getDate() + 1);
			}
		}

		// Cargar las fechas ocupadas al cargar la página
		window.onload = function() {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
					if (xhr.status === 200) {
						var reservedDates = JSON.parse(xhr.responseText);
						markReservedDates(reservedDates);
					
					} else {
						console.error('Hubo un error al cargar las fechas ocupadas.');
					}
				}
			};
			xhr.open('GET', 'getReservedDates.php', true);
			xhr.send();
		};
	</script>


	<!-- Modal con el resultado de la reservacion -->
	<div id="reservationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-content"></div>
        </div>
    </div>

	<script>
        // obtener el modal y el boton de cerrar
        const modal = document.getElementById('reservationModal');
        const closeBtn = document.querySelector('.close');

        function updateUrlOnClose() {
		  const url = new URL(window.location.href);
		  url.searchParams.delete('modalData');
		  window.history.replaceState({}, document.title, url.toString());
		}

        // Chequeo de si los datos para el modal estan en el query string
        const modalDataParam = new URLSearchParams(window.location.search).get('modalData');
        if (modalDataParam) {
            // Convertir el JSON y mostrar el modal
            const modalData = JSON.parse(modalDataParam);
            const modalContent = document.getElementById('modal-content');
            modalContent.innerHTML = modalData.message;

            // Establecer el tipo de modal
            modal.classList.add(modalData.type);

            // mostrar el modal
            modal.style.display = 'block';
        }

        // Cierre del modal
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            modal.classList.remove('success', 'error'); // Remover cualquier clase añadida
            updateUrlOnClose();
        });

        // Cierre del modal al tocar afuera
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                modal.classList.remove('success', 'error'); // Remover cualquier clase añadida
                updateUrlOnClose();
            }
        }
    </script>

    <!-- Validacion fechas -->
	<script>
		const checkInInput = document.getElementById('check_in');
		const checkOutInput = document.getElementById('check_out');
		const btnForm = document.getElementById('btnForm');
		const today = new Date().toISOString().split('T')[0]; // Fecha de hoy en YYYY-MM-DD
		var cont = 0;

		// Limpieza del check in y check out

		window.addEventListener('load', function() {
  			clearCheckInCheckOut(); // Call the clearing function
		});

		function clearCheckInCheckOut() {
		  const checkInInput = document.getElementById('check_in');
		  const checkOutInput = document.getElementById('check_out');

		  if (checkInInput && checkOutInput) {
		    checkInInput.value = ''; // Limpieza del check in
		    checkOutInput.value = ''; // Limpieza del check out
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
		  const checkInDate = checkInInput.value; // obtener la fecha del check in
		  if (!checkInDate) return; // si no hay fecha de check in seleccionada, no hacer nada

		  // fecha minima del check out igual a la fecha del check in
		  checkOutInput.min = checkInDate;
		}
	</script>

	<!-- Habitaciones -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" name="instalaciones" id="instalaciones">Instalaciones</h2>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 my-3">
				<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
				  <img src="images/rooms/c1.png" class="card-img-top">
				  <div class="card-body">
				    <h5>Cuarto simple</h5>
				    <h6 class="mb-4">$100 por noche</h6>
				    <div class="features mb-4">
				    	<h6 class="mb-1">Caracteristicas</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Cama grande
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Mesa de noche
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Baño
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Sofá
						</span>
				    </div>
				    <div class="facilities mb-4">
				    	<h6 class="mb-1">Comodidades</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		Wifi
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		AC
						</span>
				    </div>
					<div class="guests mb-4">
				    	<h6 class="mb-1">Capacidad</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		2 Adultos
						</span>
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">
				<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
				  <img src="images/rooms/c2.png" class="card-img-top">
				  <div class="card-body">
				    <h5>Cuarto grande</h5>
				    <h6 class="mb-4">$200 por noche</h6>
				    <div class="features mb-4">
				    	<h6 class="mb-1">Caracteristicas</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Cama grande
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		2 Camas pequeñas
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		2 Mesas de noche
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Baño
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		1 Sofa
						</span>
				    </div>
				    <div class="facilities mb-4">
				    	<h6 class="mb-1">Comodidades</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		Wifi
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		Television
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		AC
						</span>
				    </div>
					<div class="guests mb-4">
				    	<h6 class="mb-1">Capacidad</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		2 Adultos
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
					    	2 Niños
						</span>
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-3">
				<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
				  <img src="images/rooms/c3.png" class="card-img-top">
				  <div class="card-body">
				    <h5>Zona para eventos</h5>
				    <h6 class="mb-4">$300 por dia</h6>
				    <div class="features mb-4">
				    	<h6 class="mb-1">Caracteristicas</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		Amplio espacio
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		30 Sillas
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		4 Mesas
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		2 Baños
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		4 hamacas
						</span>
						<span class="badge rounded-pill text-bg-light text-wrap">
				    		Piscina
						</span>

				    </div>
				    <div class="facilities mb-4">
				    	<h6 class="mb-1">Comodidades</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		Wifi
						</span>
				    </div>
					<div class="guests mb-4">
				    	<h6 class="mb-1">Capacidad</h6>
				    	<span class="badge rounded-pill text-bg-light text-wrap">
				    		30 personas
						</span>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Comodidades -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" name="comodidades" id="comodidades">Nuestras comodidades</h2>
	<div class="container">
		<div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="images/facilities/wifi.svg" width="80px">
				<h5 class="mt-3">Wifi</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="images/facilities/tv.svg" width="80px">
				<h5 class="mt-3">Television</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="images/facilities/ac.svg" width="80px">
				<h5 class="mt-3">Aire acondicionado</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="images/facilities/radio.svg" width="80px">
				<h5 class="mt-3">Radio</h5>
			</div>
			<div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
				<img src="images/facilities/piscina.svg" width="80px">
				<h5 class="mt-3">Piscina</h5>
			</div>
		</div>
	</div>

	<!-- Testimonios -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" name="testimonios" id="testimonios">Testimonios</h2>
	<div class="container mt-5">
		<!-- Swiper -->
		<div class="swiper swiper-testimonials">
		<div class="swiper-wrapper mb-5">

	  		<div class="swiper-slide bg-white p-4">
		    	<div class="profile d-flex align-items-center mb-3">
		    		<img src="images/about/rating.svg" width="30px">
		    		<h6 class="m-0 ms-2">María López</h6>
		    	</div>
		    	<p>
		    		"¡Pasamos unas vacaciones inolvidables en este rancho! La ubicación era perfecta, a solo unos minutos de la hermosa playa San Diego. La propiedad era espaciosa y cómoda, con todo lo que necesitábamos para una estancia relajante. Los jardines eran hermosos y la piscina era perfecta para refrescarse en los días calurosos. Los anfitriones fueron muy amables y serviciales, siempre dispuestos a ayudarnos con cualquier cosa que necesitáramos. Sin duda, volveremos a este rancho en el futuro. ¡Lo recomiendo al 100%!"
		    	</p>
		    	<div class="rating">
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    	</div>
		  	</div>
		  	<div class="swiper-slide bg-white p-4">
		    	<div class="profile d-flex align-items-center mb-3">
		    		<img src="images/about/rating.svg" width="30px">
		    		<h6 class="m-0 ms-2">Carlos García</h6>
		    	</div>
		    	<p>
		    		"Estuvimos buscando un lugar tranquilo para desconectarnos de la rutina diaria y este rancho fue la elección perfecta. La tranquilidad del lugar, el sonido de las olas y la brisa del mar nos permitieron relajarnos y disfrutar de un ambiente totalmente diferente. La propiedad estaba muy bien equipada y limpia, y los anfitriones fueron muy atentos y serviciales. Nos ayudaron a planificar algunas actividades en la zona, como paseos a caballo y visitas a pueblos cercanos. Definitivamente, una experiencia que repetiremos."
		    	</p>
		    	<div class="rating">
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    	</div>
		  	</div>
		  	<div class="swiper-slide bg-white p-4">
		    	<div class="profile d-flex align-items-center mb-3">
		    		<img src="images/about/rating.svg" width="30px">
		    		<h6 class="m-0 ms-2">Ana Sánchez</h6>
		    	</div>
		    	<p>
		    		"Este rancho fue el lugar ideal para celebrar el cumpleaños de mi madre. Nos reunimos toda la familia y pasamos unos días increíbles. La propiedad era lo suficientemente grande para que todos tuviéramos espacio y pudiéramos disfrutar de diferentes actividades. Los niños se divirtieron mucho en la piscina y jugando en los jardines. Los adultos pudimos disfrutar de la tranquilidad del lugar y de la deliciosa comida que prepararon los anfitriones. Sin duda, una celebración que recordaremos por siempre."
		    	</p>
		    	<div class="rating">
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    		<i class="bi bi-star-fill text-warning"></i>
		    	</div>
		  	</div>

		</div>
		<div class="swiper-pagination"></div>
		</div>
	</div>

	<!-- Contactanos -->
	<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font" name="visitanos" id="visitanos">Visitanos</h2>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
				<iframe class="w-100 rounded" height="470px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15519.774255435173!2d-89.28014040000001!3d13.47757525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7cd24bde2dcdad%3A0x412db02b9e27496b!2sPlaya%20San%20Diego!5e0!3m2!1ses-419!2ssv!4v1715551732833!5m2!1ses-419!2ssv"loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="bg-white p-4 rounded mb-4">
					<h5>Llamanos</h5>
					<a href="tel: +503" class="d-inline-block mb-2 text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> 2257-1037
					</a>
					<br>
					<a href="tel: +503" class="d-inline-block text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> 2257-1037
					</a>
				</div>
				<div class="bg-white p-4 rounded mb-4">
					<h5>Escribenos</h5>
					<a href="tel: +503" class="d-inline-block mb-2 text-decoration-none text-dark">
						<i class="bi bi-envelope-fill"></i> playukiSanDiego@gmail.com
					</a>
				</div>
				<div class="bg-white p-4 rounded mb-4">
					<h5>Siguenos</h5>
					<a href="https://twitter.com/home" class="d-inline-block mb-3" target="_blank">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-twitter-x me-1"></i> Twitter
						</span>
					</a>
					<br>
					<a href="https://www.facebook.com/" class="d-inline-block mb-3" target="_blank">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-facebook me-1"></i> Facebook
						</span>
					</a>
					<br>
					<a href="https://www.instagram.com/" class="d-inline-block" target="_blank">
						<span class="badge bg-light text-dark fs-6 p-2">
							<i class="bi bi-instagram me-1"></i> Instagram
						</span>
					</a>
					<br>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php require('inc/footer.php');?>

	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<!-- Inicializacion del Swiper -->
	<script>
	    var swiper = new Swiper(".swiper-container", {
	      spaceBetween: 30,
	      loop: "true",
	      autoplay: {
	      	delay: 3500,
	      	disableOnInteraction: false
	      }
	    });

	    var swiper = new Swiper(".swiper-testimonials", {
	      effect: "coverflow",
	      grabCursor: true,
	      centeredSlides: true,
	      slidesPerView: "auto",
	      slidesPerView: 3,
	      loop: true,
	      coverflowEffect: {
	        rotate: 50,
	        stretch: 0,
	        depth: 100,
	        modifier: 1,
	        slideShadows: false,
	      },
	      pagination: {
	        el: ".swiper-pagination",
	      },
	      breakpoints: {
	      	320: {
	      		slidesPerView: 1,
	      	},
	      	640: {
	      		slidesPerView: 1,
	      	},
	      	768: {
	      		slidesPerView: 2,
	      	},
	      	1024: {
	      		slidesPerView: 3,
	      	},
	      }
	    });
  	</script>

	<!--Aqui tengo dudas porque deberia salir arriba del script de arriba-->
	
</body>
</html>