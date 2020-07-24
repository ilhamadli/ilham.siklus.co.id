 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

 (function ($) {

 	"use strict";

 	$(window).stellar({
 		responsive: true,
 		parallaxBackgrounds: true,
 		parallaxElements: true,
 		horizontalScrolling: false,
 		hideDistantElements: false,
 		scrollProperty: 'scroll'
 	});


 	var fullHeight = function () {

 		$('.js-fullheight').css('height', $(window).height());
 		$(window).resize(function () {
 			$('.js-fullheight').css('height', $(window).height());
 		});

 	};
 	fullHeight();

 	// loader
 	var loader = function () {
 		setTimeout(function () {
 			if ($('#ftco-loader').length > 0) {
 				$('#ftco-loader').removeClass('show');
 			}
 		}, 1);
 	};
 	loader();

 	// Scrollax
 	$.Scrollax();



 	// Burger Menu
 	var burgerMenu = function () {

 		$('body').on('click', '.js-fh5co-nav-toggle', function (event) {

 			event.preventDefault();

 			if ($('#ftco-nav').is(':visible')) {
 				$(this).removeClass('active');
 			} else {
 				$(this).addClass('active');
 			}



 		});

 	};
 	burgerMenu();


 	var onePageClick = function () {


 		$(document).on('click', '#ftco-nav a[href^="#"]', function (event) {
 			event.preventDefault();

 			var href = $.attr(this, 'href');

 			$('html, body').animate({
 				scrollTop: $($.attr(this, 'href')).offset().top - 70
 			}, 500, function () {
 				// window.location.hash = href;
 			});
 		});

 	};

 	onePageClick();


 	var carousel = function () {
 		$('.home-slider').owlCarousel({
 			loop: true,
 			autoplay: true,
 			autoplayTimeout: 7000,
 			margin: 0,
 			animateOut: 'slideOutLeft',
 			animateIn: 'slideInRight',
			nav: false,
			mouseDrag: true,
			touchDrag: false,
 			autoplayHoverPause: false,
 			items: 1,
 			navText: ["<span class='ion-md-arrow-back'></span>", "<span class='ion-chevron-right'></span>"],
 			responsive: {
 				0: {
 					items: 1
 				},
 				600: {
 					items: 1
 				},
 				1000: {
 					items: 1
 				}
 			}
 		});
 	};
 	carousel();

 	$('nav .dropdown').hover(function () {
 		var $this = $(this);
 		// 	 timer;
 		// clearTimeout(timer);
 		$this.addClass('show');
 		$this.find('> a').attr('aria-expanded', true);
 		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
 		$this.find('.dropdown-menu').addClass('show');
 	}, function () {
 		var $this = $(this);
 		// timer;
 		// timer = setTimeout(function(){
 		$this.removeClass('show');
 		$this.find('> a').attr('aria-expanded', false);
 		// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
 		$this.find('.dropdown-menu').removeClass('show');
 		// }, 100);
 	});


 	$('#dropdown04').on('show.bs.dropdown', function () {
 		console.log('show');
 	});

 	// scroll
 	var scrollWindow = function () {
 		$(window).scroll(function () {
 			var $w = $(this),
 				st = $w.scrollTop(),
 				navbar = $('.ftco_navbar'),
 				sd = $('.js-scroll-wrap');

 			if (st > 150) {
 				if (!navbar.hasClass('scrolled')) {
 					navbar.addClass('scrolled');
 				}
 			}
 			if (st < 150) {
 				if (navbar.hasClass('scrolled')) {
 					navbar.removeClass('scrolled sleep');
 				}
 			}
 			if (st > 350) {
 				if (!navbar.hasClass('awake')) {
 					navbar.addClass('awake');
 				}

 				if (sd.length > 0) {
 					sd.addClass('sleep');
 				}
 			}
 			if (st < 350) {
 				if (navbar.hasClass('awake')) {
 					navbar.removeClass('awake');
 					navbar.addClass('sleep');
 				}
 				if (sd.length > 0) {
 					sd.removeClass('sleep');
 				}
 			}
 		});
 	};
 	scrollWindow();



 	var counter = function () {

 		$('#section-counter, .hero-wrap, .ftco-counter').waypoint(function (direction) {

 			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

 				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
 				$('.number').each(function () {
 					var $this = $(this),
 						num = $this.data('number');
 					console.log(num);
 					$this.animateNumber({
 						number: num,
 						numberStep: comma_separator_number_step
 					}, 7000);
 				});

 			}

 		}, {
 			offset: '95%'
 		});

 	}
 	counter();


 	var contentWayPoint = function () {
 		var i = 0;
 		$('.ftco-animate').waypoint(function (direction) {

 			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

 				i++;

 				$(this.element).addClass('item-animate');
 				setTimeout(function () {

 					$('body .ftco-animate.item-animate').each(function (k) {
 						var el = $(this);
 						setTimeout(function () {
 							var effect = el.data('animate-effect');
 							if (effect === 'fadeIn') {
 								el.addClass('fadeIn ftco-animated');
 							} else if (effect === 'fadeInLeft') {
 								el.addClass('fadeInLeft ftco-animated');
 							} else if (effect === 'fadeInRight') {
 								el.addClass('fadeInRight ftco-animated');
 							} else {
 								el.addClass('fadeInUp ftco-animated');
 							}
 							el.removeClass('item-animate');
 						}, k * 50, 'easeInOutExpo');
 					});

 				}, 100);

 			}

 		}, {
 			offset: '95%'
 		});
 	};
 	contentWayPoint();

 	// magnific popup
 	$('.image-popup').magnificPopup({
 		type: 'image',
 		closeOnContentClick: true,
 		closeBtnInside: false,
 		fixedContentPos: true,
 		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
 		gallery: {
 			enabled: true,
 			navigateByImgClick: true,
 			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
 		},
 		image: {
 			verticalFit: true
 		},
 		zoom: {
 			enabled: true,
 			duration: 300 // don't foget to change the duration also in CSS
 		}
 	});

 	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
 		disableOn: 700,
 		type: 'iframe',
 		mainClass: 'mfp-fade',
 		removalDelay: 160,
 		preloader: false,

 		fixedContentPos: false
 	});





 })(jQuery);

 // $(function () {
 // 	$('a[href*=#]').on('click', function (e) {
 // 		e.preventDefault();
 // 		$('html, body').animate({
 // 			scrollTop: $($(this).attr('href')).offset().top
 // 		}, 500, 'linear');
 // 	});
 // });

 $(".modal").each(function (l) {
 	$(this).on("show.bs.modal", function (l) {
 		var o = $(this).attr("data-easein");
 		$(".modal-dialog").velocity("transition." + o)
 	})
 });

 function init() {
 	var peta = new L.Map('peta', {scrollWheelZoom: false});

 	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
 		attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
 		maxZoom: 18
 	}).addTo(peta);
 	peta.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text.

 	var indonesia = new L.LatLng(-5.53, 110. - 2);
 	peta.setView(indonesia, 7);

 	// Define an array. This could be done in a seperate js file.
 	// This tidy formatted section could even be generated by a server-side script
 	// or fetched seperately as a jsonp request.
 	var markers = [
 		[110.8190, -7.5592, "Surakarta"],
 		[110.3881, -7.0232, "Semarang"],
 		[106.7972, -6.5963, "Bogor"],
 		[106.8256, -6.1924, "Jakarta"],
 		[104.084, -3.371, "South Sumatra"]
 	];

 	//Loop through the markers array
 	for (var i = 0; i < markers.length; i++) {

 		var lon = markers[i][0];
 		var lat = markers[i][1];
 		var popupText = markers[i][2];

 		var markerLocation = new L.LatLng(lat, lon);
 		var marker = new L.Marker(markerLocation);
 		peta.addLayer(marker);

 		marker.bindPopup(popupText);

	 }
	 
	

 }

 