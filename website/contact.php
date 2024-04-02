<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hotel - Contact</title>	

	<?php require('inc/links.php');?>
	<style>
		.pop:hover{
			border-top-color: var(--teal) !important;
			transform: scale(1.03);
			transition: all 0.3s ;
		}
	</style>
</head>
<body class="bg-light">
	<!--Mando a llamar al archivo header-->
	<?php require('inc/header.php');?>

	<div class="my-5 px-4">
		<h2 class="fw-bold h-font text-center">CONTACT US</h2>
		<div class="h-line bg-dark"></div>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe velit tenetur fugit accusantium, nobis facere eligendi accusamus quaerat, <br> molestias, sunt exercitationem necessitatibus earum voluptatem voluptatum ducimus perferendis ea porro enim!
		</p>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 mb-5 px-4">
				<div class="bg-white rounded shadow p-4">
				<iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15528.428566436925!2d-89.00638889999999!3d13.343610850000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7cba1049086983%3A0xda43ef28ca8faef3!2sPlaya%20Costa%20del%20Sol!5e0!3m2!1ses-419!2ssv!4v1711497030150!5m2!1ses-419!2ssv"loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				
				<h5>Adress</h5>
					<a href="https://maps.app.goo.gl/ZGGJrMZ1oYpycQQu7" rel="noopener noreferrer" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
						<i class="bi bi-geo-alt-fill"></i>Rancho Costa San Diego
					</a>

				<h5 class="mt-4">Call us</h5>
					<a href="tel: +503" class="d-inline-block mb-2 text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> 22736000
					</a>
					<br>
					<a href="tel: +503" class="d-inline-block text-decoration-none text-dark">
						<i class="bi bi-telephone-fill"></i> 2273-6000
					</a>

				<h5 class="mt-4">Email</h5>
					<a href="mailto: playukiSanDiego@gmail.com" class="d-inline-block text-decoration-none text-dark">
					<i class="bi bi-envelope-fill"></i> playukiSanDiego@gmail.com
					</a>

				<h5 class="mt-4">Follow us</h5>
					<a href="https://twitter.com/home" class="d-inline-block text-dark fs-5 me-2" rel="noopener noreferrer" target="_blank">
						<i class="bi bi-twitter-x me-1"></i>
					</a>
					<a href="https://www.facebook.com/UDBelsalvador" class="d-inline-block text-dark fs-5 me-2" rel="noopener noreferrer" target="_blank">
						<i class="bi bi-facebook me-1"></i>
					</a>
					<a href="https://www.instagram.com/udbelsalvador/" class="d-inline-block text-dark fs-5" rel="noopener noreferrer" target="_blank">
						<i class="bi bi-instagram me-1"></i>				
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 mb-5 px-4">
				<div class="bg-white rounded shadow p-4">
					<form action="">
						<h5>Send a Message</h5>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php require('inc/footer.php');?>

	
</body>
</html>