<header id="header-container">
	<div id="header" class="int_content_wraapper hd">
		<div class="container container-header">
			<div class="left-side">
				<div id="logo">
					<a href="{{ url('/')}}"><img src="{{ asset('assets/img') }}/{{ get_section_content('project', 'site_logo') }}" data-sticky-logo="images/logo-red.svg" alt=""></a>
				</div>
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
				<nav id="navigation" class="style-1 white">
					<ul id="responsive">
						<li><a href="{{ url('/')}}">Home</a></li>
						<li><a href="{{ url('properties')}}">Property</a></li>
						<li><a href="{{ url('about')}}">About</a></li>
						<li><a href="{{ url('blog')}}">Blog</a></li>
						<li><a href="{{ url('faq')}}">FAQ</a></li>
						<li><a href="{{ url('contact')}}">Contact</a></li>
					</ul>
				</nav>
			</div>

			<div class="header-user-menu link mt-3">
				<div class="header-user-name">
					<a href="tel:+161925897442" class=""><i class="fa fa-phone ml-2"></i> +1 (619) 2589-7442 </a>
				</div>
			</div>
		</div>
	</div>
</header>
