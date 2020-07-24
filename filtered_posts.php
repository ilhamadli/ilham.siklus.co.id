<?php 
  include('config.php');
  include( ROOT_PATH . '/includes/public_functions.php');

  if (!isset($_GET['category'])) {
    echo "<script>window.open('index.php','_self')</script>";
  } else {
    $posts = getPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Siklus - Welcome to the Siklus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="images/SmallLogo.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/animate.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="css/aos.css" type="text/css">
  <link rel="stylesheet" href="css/ionicons.min.css" type="text/css">
  <link rel="stylesheet" href="css/flaticon.css" type="text/css">
  <link rel="stylesheet" href="css/icomoon.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <section class="mt-5">
    <div class="overlay"></div>
      <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center ">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <!-- title -->
          <h1 class="mb-3 bread">Our Articles</h1>
          <!-- title end -->

          <p class="breadcrumbs item">
            <span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span class="mr-2"><a href="articles.php">Blog <i class="ion-ios-arrow-forward"></i></a></span> 
            <span class="mr-2">Category </span>
          </p>
        </div>
      </div>
    </div>
  </section>
		
  <section class="ftco-section">
    <div class="container">
      <div class="row">

        <!-- post text -->
        <?php
          
        ?>
        <div class="col-lg-8 ftco-animate hide-heading">

          <!-- isi post -->
          <?php
            $urlCat = $_GET['category'];
            $sqlCat = "SELECT * FROM posts WHERE category = '$urlCat'";
            $runCat = mysqli_query($conn, $sqlCat);
            while ($rowCat = mysqli_fetch_array($runCat)):
              $text = $rowCat['body'];
              // $stringCut = substr($string, 0, 400);
              $string = strip_tags($text);
              if (strlen($string) > 400) {
                // truncate string
                $stringCut = substr($string, 0, 380);
                $endPoint = strrpos($stringCut, ' ');
                //if the string doesn't contain any space then it will cut without word basis.
                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                $string .= '... <a href="article.php?post-slug=' . htmlspecialchars($rowCat['slug'])  . '">Read More</a>';
              }
          ?>
          <h2 class=""><a href="article.php?post-slug=<?= htmlspecialchars($rowCat['slug']) ?>"><?= htmlspecialchars($rowCat['title']) ?></a></h2>
          <p class="hide-heading"><?= html_entity_decode($string) ?></p>
          <div class="tag-widget post-tag-container mb-5">
            <div class="tagcloud">
              <a href="filtered_posts.php?category=<?= htmlspecialchars($rowCat['category']) ?>" class="tag-cloud-link"><?= $rowCat['category'] ?></a>
            </div>
          </div>
        <?php endwhile ?>
        <!-- isi post end -->

        </div>
        <!-- post text end -->

                <!-- sidebar end -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Categories</h3>
                        <ul class="categories">
                            <?php 
                                $getCategoryPost = "SELECT category, COUNT(*) FROM posts GROUP BY category;";
                                $runCategoryPost = mysqli_query($conn, $getCategoryPost);
                                $i = 0 ;
                                while($rowCategory = mysqli_fetch_array($runCategoryPost)) {  
                                    $categories = $rowCategory['category'];
                                    $sql = "SELECT category FROM posts WHERE category = '$categories'";
                                    $result = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($result);
                                    echo "<li><a href='filtered_posts.php?category=" . $categories . "'>" .$categories . "<span>(" . $count . ")</span></a></li>";
                                }
                            ?>
                        </ul>
                    </div>

                    <!-- recent blog -->
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Recent Blog</h3>
                        <?php foreach ($posts as $post): ?>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(<?php echo BASE_URL . '/admin/img/post_image/' . $post['image']; ?>);"></a>
                                <div class="text">
                                    <h1 class="heading text-primary"><u><a href="article.php?post-slug=<?= htmlspecialchars($post['slug']) ?>"><?= htmlspecialchars($post['title']) ?></a></u></h1>
                                    <h3 class="heading"><a href="article.php?post-slug=<?= htmlspecialchars($post['slug']) ?>"><?= substr($post['text_highlight'], 0 ,75) ?></a></h3>
                                    <div class="meta">
                                        <div><span class="icon-calendar"></span> <?php echo date("F d, Y", strtotime($post['created_at'])) ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- recent blog end -->
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </section> <!-- .section -->
		
		

    <!-- Footer -->
	<footer class="ftco-footer ftco-section" style="background-color: #414141;">
		<div class="container">
			<div class="row mb-2">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">About Siklus</h2>
						<p>We are your partner in driving change within your organization for a brighter future for business and Indonesia.
						</p>
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
							width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
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
						</script> All rights reserved | Template by <a href="https://colorlib.com"
							target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php } ?>