<?php 
	require_once('config.php');
	require_once( ROOT_PATH . '/language.php');
	require_once( ROOT_PATH . '/includes/public_functions.php');

	$posts = getPosts();
	$products = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<title><?= $lang['MENU_TITLE']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="images/logo.ico" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/animate.css" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="css/aos.css" type="text/css">
	<link rel="stylesheet" href="css/ionicons.min.css" type="text/css">
	<link rel="stylesheet" href="css/flaticon.css" type="text/css">
	<link rel="stylesheet" href="css/icomoon.css" type="text/css">
	<link rel="stylesheet" href="leaflet/leaflet.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="js/jquery.min.js"></script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" onLoad="javascript:init();">

	<!-- Navigation Bar   -->
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?= BASE_URL ?>"><img src="images/logo1.png"></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span>
			</button>
			<div class="collapse navbar-collapse text-light" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span><?= $lang['MENU_HOME']; ?></span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span><?= $lang['MENU_SERVICES']; ?></span></a></li>
					<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#products-section" id="navbardrop" data-toggle="dropdown">
							<?= $lang['MENU_PRODUCTS']; ?>
						</a>
						<div class="dropdown-menu">
							<?php foreach ($products as $product): ?>
								<a class="dropdown-item" href="<?= BASE_URL . 'products.php?title=' . htmlspecialchars($product['title']) ?>"><?= htmlspecialchars($product['title']) ?></a>
							<?php endforeach ?>
						</div>
					</li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span><?= $lang['MENU_PROJECTS']; ?></span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span><?= $lang['MENU_ABOUT']; ?></span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span><?= $lang['MENU_CONTACT_US']; ?></span></a></li>
				</ul>
			</div>
			<div class="collapse navbar-collapse text-light" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-itemlanguage nav-item"><a href="?lang=en" class="nav-link <?php if($_GET['lang'] == "en"){echo "active";} ?>"><span>EN</span></a></li>
					<li class="nav-itemlanguage nav-item"><a href="?lang=id" class="nav-link <?php if($_GET['lang'] == 'id'){echo 'active';} ?>"><span>ID</span></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Carousel -->
	<section id="home-section" class="hero">
		<div class="home-slider js-fullheight owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="slider-text js-fullheight align-items-center justify-content-end" style="transition: 100ease;" data-scrollax-parent="true">
						<div class="img js-fullheight" style="background-image:url(images/carousel1.jpg);">
							<div class="container d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading"><?= $lang['CAROUSEL_WELCOME'] ?></span>
									<h1 class="mb-4 mt-3"><?= $lang['CAROUSEL_TEXT_ONE'] ?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
						<div class="img js-fullheight" style="background-image:url(images/carousel2.jpg);">
							<div class="container d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading"><?= $lang['CAROUSEL_WELCOME'] ?></span>
									<h1 class="mb-4 mt-3"><?= $lang['CAROUSEL_TEXT_TWO'] ?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Services Section -->
	<section class="ftco-section bg-light" id="services-section">
		<div class="container">
			<div class="row justify-content-center pb-3">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2 style="color: #40ce94;" id="serpis"><?= $lang['SERVICE_TITLE'] ?></h2>
					<br><br>
				</div>
			</div>

			<div class="row ftco-animate mb-2 pb-3">
				<div class="col-md-6 col-lg-3 py-3">
					<div class="service-picture">
						<a href="#sustainableModal" role="button" data-toggle="modal"><img class="block-20" src="images/sustainable.jpg" style="padding: 0px;"></a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 py-3">
					<div class="service-picture">
						<a href="#industrialModal" role="button" data-toggle="modal"><img class="block-20" src="images/industrial.jpg"></a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 py-3">
					<div class="service-picture">
						<a href="#productModal" role="button" data-toggle="modal"><img class="block-20" src="images/cube-new.jpg"></a>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 py-3">
					<div class="service-picture">
						<a href="#profitModal" role="button" data-toggle="modal"><img class="block-20" src="images/profit-new.jpg"></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- the services modals -->
	<!-- sustainable -->
	<div class="modal fade" id="sustainableModal" tabindex="-1" role="dialog" aria-labelledby="sustainableModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="sustainableModalTitle">Sustainable Procurement</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<!-- sustainable end -->
	<!-- industrial -->
	<div class="modal fade" id="industrialModal" tabindex="-1" role="dialog" aria-labelledby="industrialModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="industrialModalTitle">Industrial Engineering</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<!-- industrial end -->
	<!-- product -->
	<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="productModalTitle">Product Development</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<!-- product end -->
	<!-- profit -->
	<div class="modal fade" id="profitModal" tabindex="-1" role="dialog" aria-labelledby="profitModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="profitModalTitle">Profit Share Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
			</div>
		</div>
	</div>
	<!-- profit end -->

	<!-- Parralax -->
	<section class="parallax-window partners-section parralax-satu" data-parallax="scroll" data-image-src="images/parralax2.jpg"></section>

	<!-- Product Section -->
	<section class="ftco-section" id="products-section">
		<div class="container">
			<div class="row justify-content-center pb-3">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2 style="color: #40ce94;"><?= $lang['PRODUCT_TITLE'] ?></h2>
					<br><br>
				</div>
			</div>
			<div class="row ftco-animate mb-2">

				<!-- looping -->
				<?php foreach ($products as $product): ?>
					<div class="col">
						<div class="product">
							<a href="<?= BASE_URL . 'products.html?title=' . htmlspecialchars($product['title']) ?>"><img src="<?= BASE_URL . '/admin/img/product_image/' . $product['image'] ?>"></a>
							<button type="button" class="tombol"><h3><a href="<?= BASE_URL . 'products.html?title=' . htmlspecialchars($product['title']) ?>"><?= htmlspecialchars($product['title']) ?></a></h3</button>
							<!-- <a href="#link" class="btn tombol" role="button">Rubber</a> -->
						</div>	
					</div>
				<?php endforeach ?>
			</div>
	</section>

	<!-- parallax -->
	<section class="parallax-window partners-section" data-parallax="scroll" data-image-src="images/parralax1.jpg"></section>

	<!-- Network Map -->
	<section class="ftco-section ftco-project bg-light" id="projects-section">
		<div class="container px-md-5 peta">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 style="color: #40ce94;"><?= $lang['NETWORK_MAP_TITLE'] ?></h2>
				</div>
			</div>
			<div class="map ftco-container">
				<div class="ftco-animate" id="peta" style="height: 500px"></div>
			</div>
		</div>
	</section>

	<!-- Project Section -->
	<section class="ftco-section ftco-project " style="background-color: #414141;">
		<div class="container px-md-5">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4 text-light"><?= $lang['PROJECT_TITLE'] ?></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-6 align-items-center text-center">
					<div class="project">
						<div class="img">
							<img src="images/new-logo-siklus-png.png" class="img-fluid" alt="Colorlib Template">
							<h1 class="text-white blink_me"><?= $lang['PROJECT_COMING_SOON'] ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Section -->
	<section class="ftco-section img ftco-section ftco-no-pt ftco-no-pb " id="about-section">
		<div class="container ftco-counter img ftco-no-pt ftco-no-pb">
			<div class="row d-flex">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img d-flex align-self-stretch align-items-center"style="background-image:url(images/used.jpg);"></div>
				</div>
				<div class="col-md-6 col-lg-7 pl-lg-5 py-5">
					<div class="counter-wrap ftco-animate d-flex mt-md-3">
						<div class="containerabout" ><img src="images/logo3.png" height="90px" width="130px"></div>
					</div>
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<h3 style="color: #40ce94; font-weight: bold;"><?= $lang['ABOUT_VISION'] ?></h3>
								<p><?= $lang['ABOUT_VISION_TEXT'] ?></p>
								<h3 style="color: #40ce94; font-weight: bold;"><?= $lang['ABOUT_MISSION'] ?></h3>
								<p><?= $lang['ABOUT_MISSION_TEXT'] ?></p>
								<h3 style="color: #40ce94; font-weight: bold;"><?= $lang['ABOUT_ATTITUDE'] ?></h3>
								<p><?= $lang['ABOUT_ATTITUDE_TEXT'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Team Section -->
	<section class="ftco-section img ftco-section ftco-no-pt ftco-no-pb bg-light">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-6 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;"><br><?= $lang['TEAM_TITLE'] ?></h2>
				</div>
			</div>
			<div class="rowstaffdesktop">
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/James.jpg);">
							</div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">James Willis</h3>
								<span class="position mb-4" style="color: black;">CFO</span><br>
								<div class="faded">
									<ul class="ftco-social text-center">										
										<li class="ftco-animate"><a href="https://www.facebook.com/james.willis.7737769?fref=profile_friend_list&hc_location=friends_tab" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/jacob.jpeg);"></div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">Jacob Holmes</h3>
								<span class="position mb-4" style="color: black;">CEO</span><br>
								<div class="faded">
									<ul class="ftco-social text-center">
										<li class="ftco-animate"><a href="https://www.linkedin.com/in/jacob-holmes-491045147/" target="_blank"><span class="icon-linkedin"></span></a></li>
										<li class="ftco-animate"><a href="https://www.facebook.com/jacob.holmes.5264382" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/newpanji.jpeg);"></div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">Panji Rystho</h3>
								<span class="position mb-4" style="color: black;">Business Development Lead</span>
								<div class="faded">
									<ul class="ftco-social text-center">
										<li class="ftco-animate"><a href="https://www.linkedin.com/in/panji-rystho-ramadhan-370971146/" target="_blank"><span class="icon-linkedin"></span></a></li>
										<li class="ftco-animate"><a href="https://www.facebook.com/panji.r.ramadhan" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="rowstaffmobile">
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/James.jpg);">
							</div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">James<br> Willis</h3>
								<span class="position mb-4" style="color: black;">CFO</span><br>
								<div class="faded">
									<ul class="ftco-social text-center">									
										<li class="ftco-animate"><a href="https://www.facebook.com/james.willis.7737769?fref=profile_friend_list&hc_location=friends_tab" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/jacob.jpeg);"></div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">Jacob<br> Holmes</h3>
								<span class="position mb-4" style="color: black;">CEO</span><br>
								<div class="faded">
									<ul class="ftco-social text-center">
										<li class="ftco-animate"><a href="https://www.linkedin.com/in/jacob-holmes-491045147/" target="_blank"><span class="icon-linkedin"></span></a></li>
										<li class="ftco-animate"><a href="https://www.facebook.com/jacob.holmes.5264382" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(images/newpanji.jpeg);"></div>
						</div>
						<div class="text d-flex align-items-center pt-3 text-center">
							<div>
								<h3 class="mb-2" style="color: #40ce94;">Panji Rystho</h3>
								<span class="position mb-4" style="color: black;">Business Development Lead</span>
								<div class="faded">
									<ul class="ftco-social text-center">
										<li class="ftco-animate"><a href="https://www.linkedin.com/in/panji-rystho-ramadhan-370971146/" target="_blank"><span class="icon-linkedin"></span></a></li>
										<li class="ftco-animate"><a href="https://www.facebook.com/panji.r.ramadhan" target="_blank"><span class="icon-facebook"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="ftco-section" id="blog-section" >
		<div class="container">
			<div class="row justify-content-center mb-5 pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;"><a href="blogs.php"><?= $lang['BLOG_TITLE'] ?></a</h2>
					<br>
				</div>
			</div>
			<div class="row d-flex justify-content-center">

				<!-- looping -->
				<?php foreach ($posts as $post): ?>
					<div class="col-md-7 col-lg-4 d-flex ftco-animate">
						<div class="blog-entry text-center">
							<div class="containerblog">
								<a href="<?= BASE_URL . 'blog.php?post-slug=' . htmlspecialchars($post['slug']) ?>" class="block-20" style="background-image: url('<?php echo BASE_URL . '/admin/img/post_image/' . $post['image']; ?>');"></a>
							</div>
							<div class="text mt-3 float-right d-block justify-content-center">
								<div class="containerblogtext">
									<h3 class="heading"><a href="<?= BASE_URL . 'blog.php?post-slug=' . htmlspecialchars($post['slug']) ?>"><?= $post['title']; ?></a></h3>
								</div>
								<div class="containerblogtext">
									<p style="font-weight: normal;"><?= substr($post['text_highlight'], 0 ,80) ?></p>
								</div>
								<div class="d-flex align-items-center mt-4 meta justify-content-center">
									<p class="mb-0"><a href="<?= BASE_URL . 'blog.php?post-slug=' . htmlspecialchars($post['slug']) ?>" class="btn btn-primary"><?= $lang['BLOG_READ_MORE'] ?> <span class="ion-ios-arrow-round-forward"></span></a></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<!-- looping end -->

			</div>
		</div>
	</section>
	<!-- blog end -->

	<!-- Contact Section -->
	<section class="ftco-section contact-section ftco-no-pb bg-light" id="contact-section">
		<div class="container desktop pb-5">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;"><?= $lang['CONTACT_TITLE'] ?></h2>
				</div>
			</div>
			<div class="row d-flex contact-info pb-5">
				<div class="col d-flex ftco-animate">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2746061242647!2d106.80491801529517!3d-6.227480162723933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f13dae348f75%3A0x59801b675cfb09e8!2sWeWork%20Revenue%20Tower!5e0!3m2!1sen!2sid!4v1594117901147!5m2!1sen!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<div class="col d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center" style="background-color: #40ce94;">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Address</h3>
						<p>Revenue Tower - Distrcit 8 SCBD</p>
						<p>Jl. Jend. Sudirman No.52-53, Senayan, Jakarta</p>
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<h3 class="mb-4">Email</h3>
						<p><a href="mailto:info@yoursite.com">admin@siklus.co.id</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="container mobile">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;">Contact Us</h2>
				</div>
			</div>
			<div class="row d-flex contact-info mb-5">
				<div class="col-md-7 ftco-animate">
					<div class="align-self-stretch box p-4 text-center" style="background-color: #40ce94;">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Address</h3>
						<p>Revenue Tower - Distrcit 8 SCBD</p>
						<p>Jl. Jend. Sudirman No.52-53, Senayan, Jakarta</p>
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<h3 class="mb-4">Email</h3>
						<p><a href="mailto:info@yoursite.com">admin@siklus.co.id</a></p>
					</div>
				</div>
				<div class="col-md-7 ftco-animate" style="height: 350px">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2746061242647!2d106.80491801529517!3d-6.227480162723933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f13dae348f75%3A0x59801b675cfb09e8!2sWeWork%20Revenue%20Tower!5e0!3m2!1sen!2sid!4v1594117901147!5m2!1sen!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="ftco-footer ftco-section" style="background-color: #414141;">
		<div class="container">
			<div class="row mb-2">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<p><?= $lang['ABOUT_FOOTER'] ?></p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="https://www.linkedin.com/company/siklus-indonesia-mandiri/" target="_blank"><span class="icon-linkedin"></span></a></li>
							<li class="ftco-animate"><a href="https://www.facebook.com/PT-Siklus-Indonesia-Mandiri-104560911113305/" target="_blank"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="https://www.instagram.com/siklus.indonesia/?hl=en" target="_blank"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-2">
						<div class="panel-body text-right">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPT-Siklus-Indonesia-Mandiri-104560911113305%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="430" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						</div>	
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Siklus &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> 
					</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#40ce94" />
		</svg>
	</div>

	<!-- scripts -->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/velocity.ui.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyV5X7IAfKefGlRtTSHKeUHesFM_LeMsI&sensor=false"></script>
	<script src="js/main.js"></script>
	<script src="js/parallax.min.js"></script>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<script src="leaflet/leaflet.js"></script>
	<script src='Leaflet.Sleep.js'></script>
</body>
</html>