<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hotel - About</title>	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<?php require('inc/links.php');?>
	<style>
		.box{
			border-top-color: var(--teal) !important;
		}
	</style>
</head>
<body class="bg-light">
	<!--header-->
	<?php require('inc/header.php');?>

	<div class="my-5 px-4">
		<h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
		<div class="h-line bg-dark"></div>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe velit tenetur fugit accusantium, nobis facere eligendi accusamus quaerat, <br> molestias, sunt exercitationem necessitatibus earum voluptatem voluptatum ducimus perferendis ea porro enim!
		</p>
	</div>

	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
				<h3 class="mb-3">Lorem ipsum, dolor sit</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, recusandae. Facilis praesentium ea itaque consequatur beatae consectetur ut, illum quos voluptas necessitatibus suscipit dolor totam tenetur doloremque ratione quae deserunt.</p>
			</div>
			<div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
				<img src="images/about/about.jpg" alt="cofunder" class="w-100">
			</div>
		</div>
	</div>

	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-3 col-md-6 mb-4 px-4">
				<div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
					<img src="images/about/hotel.svg" alt="Rooms" width="70px">
					<h4 class="mt-3">100+ ROOMS</h4>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4 px-4">
				<div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
					<img src="images/about/customers.svg" alt="Customers" width="70px">
					<h4 class="mt-3">200+ CUSTOMERS</h4>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4 px-4">
				<div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
					<img src="images/about/rating.svg" alt="reviews" width="70px">
					<h4 class="mt-3">150+ REVIEWS</h4>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-4 px-4">
				<div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
					<img src="images/about/staff.svg" alt="staff" width="70px">
					<h4 class="mt-3">200+ STAFF</h4>
				</div>
			</div>
		</div>
	</div>

	<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
	<div class="container px-4">
		<!-- Swiper -->
		<div class="swiper mySwiper">
			<div class="swiper-wrapper mb-5">
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="images/about/buki.jpg" alt="employe1" class="w-100">
				<h5>Marco Antonio Solis</h5>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="images/about/cr7.jpg" alt="employe1" class=" h-100">
				<h5>Cristiano Ronaldo</h5>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="images/about/employee.jpg" alt="employe1" class="w-100">
				<h5>David Stevan</h5>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="images/about/chayane.jpg" alt="employe1" class="w-100 h-100">
				<h5>Chayane</h5>
			</div>
		</div>
		<div class="swiper-pagination"></div>
  </div>

	</div>
	<!-- Footer -->
	<?php require('inc/footer.php');?>

	
	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".mySwiper", {
		spaceBetween: 40,
		pagination: {
			el: ".swiper-pagination",
		}, breakpoints: {
	      	320: {
	      		slidesPerView: 1,
	      	},
	      	640: {
	      		slidesPerView: 1,
	      	},
	      	768: {
	      		slidesPerView: 3,
	      	},
	      	1024: {
	      		slidesPerView: 3,
	      	},
	      }
		});
	</script>
		
</body>
</html>