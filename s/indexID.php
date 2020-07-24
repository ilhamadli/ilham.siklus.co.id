<?php 
	require_once('config.php');
	require_once( ROOT_PATH . '/includes/public_functions.php');

	$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<title>Siklus - Selamat datang di Siklus</title>
	
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
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
		id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="images/logo1.png"></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
				data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span>
			</button>

			<div class="collapse navbar-collapse text-light" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Beranda</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Layanan</span></a></li>
					<li class="nav-item"><a href="#products-section" class="nav-link"><span>Produk</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Proyek</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>Tentang Kami</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Hubungi Kami</span></a></li>
				</ul>
			</div>
			<div class="collapse navbar-collapse text-light" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-itemlanguage"><a href="<?= BASE_URL ?>" class="nav-link"><span>EN</span></a></li>
					<li class="nav-itemlanguage"><a href="#" class="nav-link"><span>ID</span></a></li>
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
					<div class="slider-text js-fullheight align-items-center justify-content-end" style="transition: 100ease;"
						data-scrollax-parent="true">
						<div class="img js-fullheight" style="background-image:url(images/carousel1.jpg);">
							<div class="container d-flex js-fullheight align-items-center ftco-animate"
								data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading">Welcome to <b>the Siklus</b></span>
									<h1 class="mb-4 mt-3">Siklus bekerja untuk membuat bahan bakar bio yang <span>layak secara komersial </span>yang dihasilkan dari bahan <span>limbah yang tidak diinginkan</span></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="slider-text js-fullheight align-items-center justify-content-end"
						data-scrollax-parent="true">
						<div class="img js-fullheight" style="background-image:url(images/carousel2.jpg);">
							<div class="container d-flex js-fullheight align-items-center ftco-animate"
								data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading">Welcome to <b>the Siklus</b></span>
									<h1 class="mb-4 mt-3">Siklus bekerja untuk membuat bahan bakar bio yang <span>layak secara komersial </span>yang dihasilkan dari bahan <span>limbah yang tidak diinginkan</span></h1>
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
					<h2 style="color: #40ce94;" id="serpis"><span>Our</span> <span style="font-weight: bold;">Services</span></h2>
					<!-- <h5 class="mb-2" style="color: #40ce94;">Our duty towards you is to share our experience we're
						reaching in our work path with you.</h5> -->
						<br><br>
				</div>
			</div>
			<!-- <div class="container"> -->
			<div class="row ftco-animate mb-2">
				<div class="col">
					<div>
						<img class="icon-services" src="images/procurement.png">
						<h4 style="color: #40ce94; text-align: center;">Sustainable<br> Procurement</h4>
					</div>
				</div>
				<div class="col d-flex justify-content-center">
					<div>
						<img class="icon-services" src="images/industrial.png">
						<h4 style="color: #40ce94; text-align: center;">Industrial<br> Engineering</h4>
					</div>
				</div>
				<div class="col d-flex justify-content-center">
					<div>
						<img class="icon-services text-center" src="images/cube.png">
						<h4 style="color: #40ce94; text-align: center;">Product<br> Development</h4>
					</div>
				</div>
				<div class="col d-flex justify-content-center">
					<div>
						<img class="icon-services" src="images/profit.png">
						<h4 style="color: #40ce94; text-align: center;">Profit Share<br> Project</h4>
					</div>
				</div>
			<!-- </div> -->
		</div>
	</section>

	<!-- Parralax -->
	<section class="parallax-window partners-section parralax-satu" data-parallax="scroll" data-image-src="images/parralax2.jpg">
	</section>
	
	<!-- Product Section -->
	<section class="ftco-section" id="products-section">
		<div class="container">
			<div class="row justify-content-center pb-3">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2 style="color: #40ce94;"><span>Our</span> <span style="font-weight: bold;">Products</span></h2>
					<!-- <h5 class="mb-2" style="color: #40ce94;">All types of businesses need access to development
						resources, so we give you the option to decide how much you need to use.</h5> -->
						<br><br>
				</div>
			</div>
			<div class="row ftco-animate mb-2">
				<div class="col">
					<div class="product">
						<img src="images/crumbed.jpg">
						<button type="button" class="tombol" data-toggle="modal" data-target="#myModal1"><h3>Crumb Rubber</h3</button>
					</div>	
				</div>
				<div class="col">
					<div class="product">
						<img src="images/pyrolysis.jpg">
						<button type="button" class="tombol" data-toggle="modal" data-target="#myModal2"><h3>Pyrolysis Oil</h3</button>
					</div>	
				</div>
			</div>
			<div class="row ftco-animate mb-2">
				<div class="col">
					<div class="product">
						<img src="images/coal substitute.jpg">
						<button type="button" class="tombol" data-toggle="modal" data-target="#myModal3"><h3>Coal Substitutes</h3</button>
					</div>	
				</div>
				<div class="col">
					<div class="product">
						<img src="images/biodiesel.jpg">
						<button type="button" class="tombol" data-toggle="modal" data-target="#myModal4"><h3>Bio Diesel</h3</button>
					</div>	
				</div>
			</div>
	</section>

	<!-- the modal -->
	<div class="modal" id="myModal1" data-easein="expandIn" tabindex="-1" role="dialog"
		aria-labelledby="costumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- modal header -->
				<div class="modal-header d-block">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h1 class="modal-title text-center">Crumb Rubber</h1>
				</div>
				<!-- modal body -->
				<div class="modal-body">
					<img src="images/crumbed.jpg" alt="image" class="img-fluid mx-auto d-block mb-4" style="width: 500px; height: 300px;">
					<!-- <h2>Some text to enable scrolling</h2> -->
					<p style="text-align: center;">
					Crumb rubber adalah bahan yang diproduksi dengan cara menghancurkan ban bekas. 
					Selama proses daur ulang ini, besi dan karet ban dilepas, menghasilkan karet ban dengan konsistensi granular.
					</p>
					
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- the modal -->
	<div class="modal" id="myModal2" data-easein="expandIn" tabindex="-1" role="dialog"
		aria-labelledby="costumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- modal header -->
				<div class="modal-header d-block">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h1 class="modal-title text-center">Pyrolysis Oil</h1>
				</div>
				<!-- modal body -->
				<div class="modal-body">
					<img src="images/oil.jpg" alt="image" class="img-fluid mx-auto d-block mb-4" style="width: 500px; height: 300px;">
					<!-- <h2>Some text to enable scrolling</h2> -->
					<p style="text-align: center;">
					Juga dikenal sebagai biocrude atau bio-oil, adalah bahan bakar sintetis yang sedang dalam penelitian sebagai pengganti minyak bumi. 
					Pyrolysis oil diperoleh dengan memanaskan biomassa kering tanpa oksigen dalam reaktor pada suhu sekitar 500 ° C dengan pendinginan berikutnya.
					</p>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- the modal -->
	<div class="modal" id="myModal3" data-easein="expandIn" tabindex="-1" role="dialog"
		aria-labelledby="costumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- modal header -->
				<div class="modal-header d-block">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h1 class="modal-title text-center">Coal Substitutes</h1>
				</div>
				<!-- modal body -->
				<div class="modal-body">
					<img src="images/coal substitute.jpg" alt="image" class="img-fluid mx-auto d-block mb-4" style="width: 500px; height: 300px;">
					<!-- <h2>Some text to enable scrolling</h2> -->
					<p style="text-align: center;">
					Coal Substitute atau carbon black adalah bentuk serbuk karbon dalam bentuk partikel koloid berbentuk seperti lingkaran dan agregat partikel ukuran koloid, 
					diperoleh dengan pembakaran parsial atau dekomposisi termal hidrokarbon.
					</p>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- the modal -->
	<div class="modal" id="myModal4" data-easein="expandIn" tabindex="-1" role="dialog"
		aria-labelledby="costumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- modal header -->
				<div class="modal-header d-block">
					<button type="button" class="close" data-dismiss="modal">x</button>
					<h1 class="modal-title text-center">Bio Diesel</h1>
				</div>
				<!-- modal body -->
				<div class="modal-body">
					<img src="images/biodiesel.jpg" alt="image" class="img-fluid mx-auto d-block mb-4" style="width: 500px; height: 300px;">
					<!-- <h2>Some text to enable scrolling</h2> -->
					<p style="text-align: center;">
					Biodiesel adalah biofuel cair yang diperoleh dengan proses kimia dari minyak nabati atau lemak hewani dan alkohol yang dapat digunakan dalam mesin diesel, 
					tidak dicampur atau dicampur dengan minyak diesel.
					</p>
					</p>
				</div>
			</div>
		</div>
	</div>

	<section class="parallax-window partners-section" data-parallax="scroll" data-image-src="images/parralax1.jpg">

	</section>
	
	<!-- Network Map -->
	<section class="ftco-section ftco-project bg-light" id="projects-section">
		<div class="container px-md-5 peta">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 style="color: #40ce94;"><span> Network </span><span style="font-weight: bold;">Map</span></h2>
				</div>
			</div>
			<div class="map ftco-container">
				<div class="ftco-animate" id="peta" style="height: 500px"></div>
			</div>
		</div>
	</section>
	
	<!-- Project Section -->
	<section class="ftco-section ftco-project " style="background-color: #40ce94;">
		<div class="container px-md-5">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4 text-light"><span> Our </span><span style="font-weight: bold;"> Projects </span></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="project">
						<div class="img">
							<img src="images/surabaya.jpg" class="img-project" alt="Colorlib Template">
							<div class="text px-4">
								<h3><a href="#">Tire Processing Facility</a></h3>
								<span>Established in Surabaya May 2020</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="project">
						<div class="img">
							<img src="images/monas.jpg" class="img-project" alt="Colorlib Template">
							<div class="text px-4">
								<h3><a href="#">Tire and Plastic Processing Facility</a></h3>
								<span>Established in Jakarta september 2020</span>
							</div>
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
					<div class="img d-flex align-self-stretch align-items-center"
						style="background-image:url(images/used.jpg);">
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-lg-5 py-5">
					<div class="counter-wrap ftco-animate d-flex mt-md-3">
						<div class="containerabout" ><img src="images/logo3.png" height="90px" width="130px"></div>
					</div>
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<h3 style="color: #40ce94; font-weight: bold;">Visi</h3>
								<p>Untuk membangun lingkaran ekonomi yang menyeluruh di seluruh Asia Tenggara</p>
								<h3 style="color: #40ce94; font-weight: bold;">Misi</h3>
								<p>Siklus bertujuan untuk menjadi pemasok bahan baku berkelanjutan yang hemat biaya untuk industri konstruksi, manufaktur dan daya. 
								Memastikan keberlanjutan industri, lingkungan dan masa depan yang lebih baik untuk Asia Tenggara.</p>
								<h3 style="color: #40ce94; font-weight: bold;">Nilai-Nilai Perusahaan</h3>
								<p>	Kami percaya dalam menciptakan model bisnis inovatif yang memberikan kesinambungan, 
								kualitas, dan penghargaan terhadap lingkungan dan sumber dayanya. 
								Kami mengikuti prinsip-prinsip circular economy untuk melestarikan sumber daya alam dan dengan lebih baik memanfaatkan yang sudah tersedia. 
								Sangat penting jika pertumbuhan ekonomi bekerja bersama-sama dengan konservasi lingkungan dan keberlanjutan. 
								Yaitu dengan cara bisnis focus menerapkan praktik-praktik baru yang inovatif.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Staff -->
	<section class="ftco-section img ftco-section ftco-no-pt ftco-no-pb bg-light">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-6 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;"><br><span> Meet </span><span style="font-weight: bold;"> Our Team </span></h2>
				</div>
			</div>
			<!-- desktop -->
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
							<div class="img align-self-stretch" style="background-image: url(images/panji.jpg);"></div>
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
			<!-- mobile -->
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
							<div class="img align-self-stretch" style="background-image: url(images/panji.jpg);"></div>
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
				<h2 class="mb-4" style="color: #40ce94;"><a href="articles">Newsfeed</a</h2>
				<br>
				</div>
			</div>
			<div class="row d-flex">

				<!-- looping -->
				<?php foreach ($posts as $post): ?>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<div class="containerblog">
								<a href="<?= BASE_URL . 'article/' . htmlspecialchars($post['slug']) ?>" class="block-20" style="background-image: url('<?php echo BASE_URL . '/admin/img/post_image/' . $post['image']; ?>');">
								</a>
							</div>
							<div class="text mt-3 float-right d-block justify-content-center">
								<!-- <div class="d-flex align-items-center pt-2 mb-4 topp">
									<div class="one mr-2">
										<span class="day"><?php echo date("d", strtotime($post['created_at'])) ?></span>
									</div>
									<div class="two">
										<span class="yr"><?php echo date("Y", strtotime($post['created_at'])) ?></span>
										<span class="mos"><?php echo date("F", strtotime($post['created_at'])) ?></span>
									</div>
								</div> -->
								<div class="containerblogtext">
									<h3 class="heading"><a href="<?= BASE_URL . 'article/' . htmlspecialchars($post['slug']) ?>"><?= $post['title']; ?></a></h3>
								</div>
								<div class="containerblogtext">
									<p style="font-weight: normal;"><?= substr($post['text_highlight'], 0 ,80) ?></p>
								</div>
								<div class="d-flex align-items-center mt-4 meta text-center">
									<p class="mb-0"><a href="<?= BASE_URL . 'article/' . htmlspecialchars($post['slug']) ?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
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
		<!-- desktop -->
		<div class="container desktop">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;">Hubungi Kami</h2>
				</div>
			</div>
			<div class="row d-flex contact-info mb-5">
				<div class="col d-flex ftco-animate">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.1383249281694!2d106.80661680957922!3d-6.227209599616617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1b31c95e629%3A0xa92869cad3d62ace!2sRevenue%20Tower!5e0!3m2!1sen!2sid!4v1582178053978!5m2!1sen!2sid" 
					width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<div class="col d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center" style="background-color: #40ce94;">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Alamat</h3>
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
		<!-- mobile -->
		<div class="container mobile">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4" style="color: #40ce94;">Hubungi Kami</h2>
				</div>
			</div>
			<div class="row d-flex contact-info mb-5">
				<div class="col-md-7 ftco-animate">
					<div class="align-self-stretch box p-4 text-center" style="background-color: #40ce94;">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Alamat</h3>
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
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.1383249281694!2d106.80661680957922!3d-6.227209599616617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1b31c95e629%3A0xa92869cad3d62ace!2sRevenue%20Tower!5e0!3m2!1sen!2sid!4v1582178053978!5m2!1sen!2sid" 
					width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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
						<h2 class="ftco-heading-2">About Siklus</h2>
						<p> Siklus adalah pemasok bahan baku berkelanjutan yang hemat biaya untuk industri konstruksi, manufaktur dan daya. 
						Kami melestarikan sumber daya alam dan memanfaatkan bahan-bahan yang sudah tersedia menjadi produk yang bermanfaat.</p>
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
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPT-Siklus-Indonesia-Mandiri-104560911113305%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" 
							width="340" height="430" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						</div>	
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Siklus &copy;<script>
							document.write(new Date().getFullYear());
						</script>
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#40ce94" /></svg></div>


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