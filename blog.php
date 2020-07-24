<?php 
  include('config.php');
  include( ROOT_PATH . '/includes/public_functions.php');

	if (!isset($_GET['post-slug'])) {
		echo "<script>window.open('index.php','_self')</script>";
	} else {
		$post = getSinglePost($_GET['post-slug']);
		$posts = getPosts();
?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Siklus - Article | <?= $post['title'] ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="<?= BASE_URL . '/images/logo.ico' ?>" rel="icon">
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/open-iconic-bootstrap.min.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/animate.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/owl.carousel.min.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/owl.theme.default.min.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/magnific-popup.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/aos.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/ionicons.min.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/flaticon.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/icomoon.css' ?>" type="text/css">
		<link rel="stylesheet" href="<?= BASE_URL . '/css/style.css' ?>" type="text/css">
	</head>

	<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

		<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="<?= BASE_URL ?>"><img src="<?= BASE_URL . '/images/logo1.png' ?>"></a>
				<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span>
				</button>
				<div class="collapse navbar-collapse text-light" id="ftco-nav">
					<ul class="navbar-nav nav ml-auto"></ul>
				</div>
				<div class="collapse navbar-collapse text-light" id="ftco-nav">
					<ul class="navbar-nav nav ml-auto">
						<li class="nav-itemlanguage nav-item"><a href="<?= 'blog.php?post-slug=' . $_GET['post-slug'] . '&lang=en' ?>" class="nav-link <?php if($_GET['lang'] == "en"){echo "active";} ?>"><span>EN</span></a></li>
						<li class="nav-itemlanguage nav-item"><a href="<?= 'blog.php?post-slug=' . $_GET['post-slug'] . '&lang=id' ?>" class="nav-link <?php if($_GET['lang'] == 'id'){echo 'active';} ?>"><span>ID</span></a></li>
					</ul>
				</div>
			</div>
		</nav>  

		<!-- Upper Image -->
		<section class="hero-wrap hero-wrap-2 article-bg" style="background-image: url('<?= BASE_URL . "/images/siklus2-min.jpg" ?>');height:12%;" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-end justify-content-center ">
					<div class="col-md-9 ftco-animate pb-5 text-center">
						<!-- title -->
						<h1 class="mb-3 bread text-white"><?= htmlspecialchars($post['title']) ?></h1>
						<!-- title end -->
					</div>
				</div>
			</div>
		</section>

		<!-- Blog Content -->
		<section class="ftco-section">
			<div class="container">
				<div class="row">
					
					<!-- post text -->
					<div class="col-lg-8 ftco-animate body-post">
						<!-- isi post -->
						<?php
							if(isset($_GET['lang'])) {
								$lang = $_GET['lang'];						
								// register the session and set the cookie
								$_SESSION['lang'] = $lang;
								setcookie("lang", $lang, time() + (3600 * 24 * 30));
							} else if(isset($_SESSION['lang'])) {
								$lang = $_SESSION['lang'];
							} else if(isset($_COOKIE['lang'])) {
								$lang = $_COOKIE['lang'];
							} else {
								$lang = 'en';
							}                     
							
							switch ($lang) {
								case 'en':
									// english
									echo $post['body'];
									$lang_file = 'lang.en.php';
								break;
													
								case 'id':
									// indonesia
									if ($post['body_id'] == "") {
										echo $post['body'];
										$lang_file = 'lang.id.php';
									} else {
										echo $post['body_id'];
										$lang_file = 'lang.id.php';
									}
								break;
							} 

							include_once 'language/'.$lang_file;
						?>
						<!-- isi post end -->
						
					</div>
					<!-- post text end -->

					<!-- sidebar start -->
					<div class="col-lg-4 sidebar ftco-animate">

						<!-- recent blog -->
						<div class="sidebar-box ftco-animate">
							<h3 class="heading-sidebar"><?= $lang['BLOG_RECENT'] ?></h3>

								<?php foreach ($posts as $post): ?>
									<div class="block-21 mb-4 d-flex">
										<a class="blog-img mr-4" style="background-image: url(<?php echo BASE_URL . '/admin/img/post_image/' . $post['image']; ?>);"></a>
										<div class="text">
											<h1 class="heading text-primary">
												<u>
													<a href="<?= BASE_URL . 'blog.php?post-slug=' . htmlspecialchars($post['slug']) ?>">
														<?= htmlspecialchars($post['title']) ?>
													</a>
												</u>
											</h1>
											<div class="meta"><div>
											<span class="icon-calendar"></span> <?php echo date("F d, Y", strtotime($post['created_at'])) ?>
										</div>
									</div>
									</div>
									</div>
								<?php endforeach ?>

							<a href="<?= BASE_URL . 'blogs.php' ?>" style="font-weight: bold;"><?= $lang['BLOG_MORE'] ?></a>
						</div>
						<!-- recent blog end -->
						
					</div>
					<!-- sidebar end -->
					
				</div>
			</div>
		</section>
		<!-- Blog content end -->

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
								<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FPT-Siklus-Indonesia-Mandiri-104560911113305%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
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
		<script src="<?= BASE_URL . '/js/jquery.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery-migrate-3.0.1.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/popper.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/bootstrap.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery.easing.1.3.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery.waypoints.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery.stellar.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/owl.carousel.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery.magnific-popup.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/aos.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/jquery.animateNumber.min.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/scrollax.min.js' ?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="<?= BASE_URL . '/js/google-map.js' ?>"></script>
		<script src="<?= BASE_URL . '/js/main.js' ?>"></script>
	</body>
	</html>
<?php } ?>