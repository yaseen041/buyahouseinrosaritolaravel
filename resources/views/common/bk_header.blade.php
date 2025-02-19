<header id="header-container">
	<div id="header" class="int_content_wraapper hd">
		<div class="container container-header">
			<div class="left-side">
				<div id="logo">
					<a href="{{ url('/')}}"><img src="{{ asset('assets/img') }}/{{ get_section_content('project', 'site_logo') }}" data-sticky-logo="images/logo-red.svg" alt=""></a>
				</div>
				<div class="triger-div">
					<div class="mmenu-trigger">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<nav id="navigation" class="style-1 white">
					<ul id="responsive">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Menu
							</a>
							<div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
								<div class="container">
									<div class="row">
										<!-- Column 1 -->
										<div class="col-md-2">
											<img src="{{ asset('assets/icons/building.png') }}" width="40" alt="icon">
											<h5> Rosarito Area Real Estate</h5>
											<ul>
												<li><i class="fa fa-home"></i> Highly Rated Comunities With Noteable  Expat Populations</li>
											</ul>
										</div>
										<!-- Column 2 -->
										<div class="col-md-2">
											<img src="{{ asset('assets/icons/shield.png') }}" width="40" alt="icon">
											<h5>Safety & Security</h5>
											<ul>
												<li><i class="fa fa-user"></i> Sefest Areas & </li>
												<li><i class="fa fa-cog"></i> Settings</li>
												<li><i class="fa fa-question-circle"></i> Help</li>
												<li><i class="fa fa-book"></i> Tutorials</li>
												<li><i class="fa fa-paper-plane"></i> Projects</li>
											</ul>
										</div>
										<!-- Column 3 -->
										<div class="col-md-2">
											<img src="{{ asset('assets/icons/wallet.png') }}" width="40" alt="icon">
											<h5> Cos of Living & Daily Expenses</h5>
											<ul>
												<li><i class="fa fa-envelope"></i> Email</li>
												<li><i class="fa fa-phone"></i> Contact</li>
												<li><i class="fa fa-map-marker"></i> Location</li>
												<li><i class="fa fa-calendar"></i> Calendar</li>
												<li><i class="fa fa-tasks"></i> Tasks</li>
											</ul>
										</div>
										<!-- Column 4 -->
										<div class="col-md-2">
											<img src="{{ asset('assets/icons/tree.png') }}" width="40" alt="icon">
											<h5> Recreation, Lifestyle & Fun</h5>
											<ul>
												<li><i class="fa fa-gear"></i> Settings</li>
												<li><i class="fa fa-comments"></i> Feedback</li>
												<li><i class="fa fa-cloud"></i> Cloud</li>
												<li><i class="fa fa-rocket"></i> Launch</li>
												<li><i class="fa fa-clock"></i> Time</li>
											</ul>
										</div>
										<!-- Column 5 -->
										<div class="col-md-2">
											<img src="{{ asset('assets/icons/car.png') }}" width="40" alt="icon">
											<h5>Transportation, Travel & Banking</h5>
											<ul>
												<li><i class="fa fa-cart-plus"></i> Cart</li>
												<li><i class="fa fa-gift"></i> Offers</li>
												<li><i class="fa fa-map"></i> Locations</li>
												<li><i class="fa fa-bookmark"></i> Bookmarks</li>
												<li><i class="fa fa-globe"></i> World</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li><a href="{{ url('/')}}">Home</a></li>
						<li><a href="{{ url('properties')}}">Property</a></li>
						<li><a href="{{ url('about')}}">About</a></li>
						<li><a href="{{ url('blog')}}">Blog</a></li>
						<li><a href="{{ url('faq')}}">FAQ</a></li>
						<li><a href="{{ url('contact')}}">Contact</a></li>
					</ul>
				</nav>





				<div class="header-user-menu link d-block d-xl-none">
					<div class="header-user-name">
						<a href="tel:+161925897442" class=""><i class="fa fa-phone ml-2"></i> +1 (619) 2589-7442 </a>
					</div>
				</div>
			</div>

			<div class="header-user-menu link mt-2 d-none d-xl-block">
				<div class="header-user-name">
					<a href="tel:+161925897442" class=""><i class="fa fa-phone ml-2"></i> +1 (619) 2589-7442 </a>
				</div>
			</div>
		</div>
	</div>
</header>
