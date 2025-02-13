<script src="{{ asset('user_assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('user_assets/js/tether.min.js') }}"></script>
<script src="{{ asset('user_assets/js/moment.js') }}"></script>
<script src="{{ asset('user_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user_assets/js/mmenu.min.js') }}"></script>
<script src="{{ asset('user_assets/js/mmenu.js') }}"></script>
<script src="{{ asset('user_assets/js/aos.js') }}"></script>
<script src="{{ asset('user_assets/js/aos2.js') }}"></script>
<script src="{{ asset('user_assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('user_assets/js/swiper.js') }}"></script>
<script src="{{ asset('user_assets/js/slick.min.js') }}"></script>
<script src="{{ asset('user_assets/js/fitvids.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('user_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('user_assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user_assets/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('user_assets/js/lightcase.js') }}"></script>
<script src="{{ asset('user_assets/js/search.js') }}"></script>
<script src="{{ asset('user_assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('user_assets/js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('user_assets/js/newsletter.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('user_assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user_assets/js/searched.js') }}"></script>
<script src="{{ asset('user_assets/js/forms-2.js') }}"></script>
<script src="{{ asset('user_assets/js/color-switcher.js') }}"></script>
<script src="{{ asset('user_assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('user_assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/plugins/ladda/ladda.jquery.min.js') }}"></script>

<script>
	$('.style1').owlCarousel({
		loop: true,
		margin: 10,
		autoplay: true,
		autoplayTimeout: 5000,
		responsive: {
			0: {
				items: 1
			},
			400: {
				items: 1,
				margin: 20
			},
			500: {
				items: 1,
				margin: 20
			},
			768: {
				items: 2,
				margin: 20
			},
			991: {
				items: 2,
				margin: 20
			},
			1025: {
				items: 4,
				margin: 20
			}
		}
	});
</script>
<script src="{{ asset('user_assets/js/script.js') }}"></script>
<script>
	$('.slick-lancers').slick({
		infinite: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		adaptiveHeight: true,
		responsive: [{
			breakpoint: 1292,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				dots: true,
				arrows: false
			}
		}, {
			breakpoint: 993,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				dots: true,
				arrows: false
			}
		}, {
			breakpoint: 769,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				arrows: false
			}
		}]
	});
</script>

@stack('scripts')