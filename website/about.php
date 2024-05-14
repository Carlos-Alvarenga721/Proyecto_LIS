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
		<h2 class="fw-bold h-font text-center">Sobre nosotros</h2>
		<div class="h-line bg-dark"></div>
		<p class="mt-3">
			Bienvenido a Rancho San Diego, su oasis de paz y tranquilidad frente al mar en Playa San Diego.
			Ubicado en un lugar privilegiado, a solo 45 minutos de la vibrante ciudad de San Salvador, Rancho San Diego ofrece a sus huéspedes un escape perfecto del ajetreo de la vida cotidiana. Rodeado de exuberantes jardines tropicales y con impresionantes vistas al Océano Pacífico, nuestro rancho es el lugar ideal para relajarse, recargar energías y crear recuerdos inolvidables.
			<br>
			<br>
			En Rancho San Diego, nos apasiona brindar a nuestros huéspedes una experiencia excepcional. Desde el momento en que llegue, será recibido por nuestro amable y atento personal, quienes se dedicarán a garantizar que su estadía sea perfecta. Ofrecemos una variedad de alojamientos para satisfacer todas sus necesidades, desde cómodas habitaciones estándar hasta espaciosas villas frente al mar. Todas nuestras habitaciones están decoradas con buen gusto y cuentan con todas las comodidades modernas para garantizarle una estancia confortable.
		</p>
	</div>

	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
				<h3 class="mb-3">Doña Sofía Martínez</h3>
				<p>Nació en un pequeño cantón cerca de San Diego, El Salvador, en el seno de una humilde familia de agricultores. Desde pequeña, Sofía se sintió fascinada por la belleza natural de la región, especialmente por las playas y las exuberantes montañas.
				<br>
				<br>
				A medida que crecía, desarrolló un profundo respeto por la tierra y un fuerte deseo de preservar su belleza natural. Cuando era joven, heredó una pequeña parcela de tierra de sus padres. Con trabajo duro y dedicación, transformó la tierra en una próspera granja, cultivando frutas y verduras frescas.
				<br>
				<br>
				Con el tiempo, Sofía comenzó a soñar con crear un lugar donde las personas pudieran conectarse con la naturaleza, disfrutar de la belleza de la región y encontrar paz y tranquilidad. Utilizando las ganancias de su granja, compró más tierras y comenzó a construir el Rancho San Diego. Con su visión y esfuerzo, transformó la tierra en un oasis de paz y belleza, con amplios jardines, huertos, establos y una hermosa casa de campo. El Rancho San Diego se convirtió rápidamente en un destino popular para las personas que buscaban escapar del ajetreo de la vida cotidiana y disfrutar de la belleza natural de El Salvador.
</p>
			</div>
			<div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
				<img src="images/about/about.png" alt="funder" class="w-100">
			</div>
		</div>
	</div>

	<h3 class="my-5 fw-bold h-font text-center">Nuestro equipo</h3>
	<div class="container px-4">
		<!-- Swiper -->
		<div class="swiper mySwiper">
			<div class="swiper-wrapper mb-5">
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="https://i.pinimg.com/564x/ae/9d/a3/ae9da3a68715bf7e052e0fcd4385dc19.jpg" alt="employe1" class="w-100">
				<h5>Karen Lopez</h5>
				<h6>Encarga de Limpieza</h6>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="https://i.pinimg.com/564x/c3/ab/18/c3ab18327516f02afc5a6083392f36fc.jpg" alt="Hugo" class=" w-100">
				<h5>Mario Artega</h5>
				<h6>Ingeniero Civil</h6>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="images/about/employee.jpg" alt="employe1" class="w-100">
				<h5>David Stevan</h5>
				<h6>Programador Web</h6>
			</div>
			<div class="swiper-slide bg-white text-center overflow-hidden rounded">
				<img src="https://i.pinimg.com/564x/12/ac/60/12ac606896dfc98f4806b7acababed67.jpg" alt="Jose" class="w-100 h-100" height="40px">
				<h5>Jose Torres</h5>
				<h6>Cocinero General</h6>
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