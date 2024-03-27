<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto reservaciones</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

	<style type="text/css">
		 .merienda-uniquifier> {
		  font-family: "Merienda", cursive;
		  font-optical-sizing: auto;
		  font-weight: weight;
		  font-style: normal;
		}

		.poppins-regular {
		  font-family: "Poppins", sans-serif;
		  font-weight: 400;
		  font-style: normal;
		}

		.poppins-medium {
		  font-family: "Poppins", sans-serif;
		  font-weight: 500;
		  font-style: normal;
		}

		.poppins-semibold {
		  font-family: "Poppins", sans-serif;
		  font-weight: 600;
		  font-style: normal;
		}

		*{
			font-family: "Poppins", sans-serif;
		}

		.h-font{
			font-family: "Merienda", cursive;
		}

		/* Ocultar las flechas del input number */

		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		  -webkit-appearance: none;
		  margin: 0;
		}

		/* Firefox */
		input[type=number] {
		  -moz-appearance: textfield;
		}

		.custom-bg{
			background-color: #2ec1ac;
		}

		.custom-bg:hover{
			background-color: #279e8c;
		}

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

	</style>
</head>
<body class="bg-light">
	
<?php  require_once('inc/header.php');?>
	<!-- Carousel -->
	<!-- Swiper -->
	<div class="container-fluid px-lg-4 mt-4">
		<div class="swiper swiper-container">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide">
		        <img src="images/carousel/1.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/2.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/3.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/4.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/5.png" class="w-100 d-block">
		      </div>
		      <div class="swiper-slide">
		        <img src="images/carousel/6.png" class="w-100 d-block">
		      </div>
		    </div>
  		</div>
	</div>

	<!-- Check availability form -->\
	<div class="container availability-form">
		<div class="row">
			<div class="col-lg-12 bg-white shadow p-4 rounded">
				<h5 class="mb-4">Check Booking Availability</h5>
				<form>
					<div class="row align-items-end">
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Check-in</label>
					    	<input type="date" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Check-out</label>
					    	<input type="date" class="form-control shadow-none">
						</div>
						<div class="col-lg-3 mb-3">
							<label class="form-label" style="font-weight: 500;">Adult</label>
					    	<select class="form-select shadow-none">
							  <option selected>Open this select menu</option>
							  <option value="1">One</option>
							  <option value="2">Two</option>
							  <option value="3">Three</option>
							</select>
						</div>
						<div class="col-lg-2 mb-3">
							<label class="form-label" style="font-weight: 500;">Children</label>
					    	<select class="form-select shadow-none">
							  <option selected>Open this select menu</option>
							  <option value="1">One</option>
							  <option value="2">Two</option>
							  <option value="3">Three</option>
							</select>
						</div>
						<div class="boton col-lg-1 mb-lg-3 mt-2">
							<button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<br><br><br>
	<br><br><br>

	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
	    var swiper = new Swiper(".swiper-container", {
	      spaceBetween: 30,
	      loop: "true",
	      autoplay: {
	      	delay: 3500,
	      	disableOnInteraction: false
	      }
	    });
  	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></body>
</html>