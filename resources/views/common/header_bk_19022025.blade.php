<header id="header-container">
	<div id="header" class="int_content_wraapper hd">
		<div class="container container-header">
			<div class="left-side">
				<div id="logo">
					<a href="{{ url('/') }}"><img src="{{ asset('assets/img') }}/{{ get_section_content('project', 'site_logo') }}" data-sticky-logo="images/logo-red.svg" alt=""></a>
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
						<li class="m-purple">
							<img src="{{ asset('assets/icons/building.png') }}" width="40" alt="icon">
							<a href="#">Rosarito Area <br>Real Estate</a>
							<ul class="sub-menu col-purple">
								<li>
									<a href="#"> <h3>Highly Rated Communities with Notable Expat Populations</h3></a>
									<div class="menu-list">
										<a href="">list one</a>
										<a href="">list one</a>
										<a href="">list one</a>
									</div>
									<ul class="sub-menu col-purple">
										<li>
											<a href="#"> <h3>Highly Rated Communities with Notable Expat Populations</h3></a>
											<div class="menu-list">
												<a href="">list one</a>
												<a href="">list one</a>
												<a href="">list one</a>
											</div>
										</li>
									</ul>
								</li>
								<li><a href="#"><h3>Top-Rated & Highly Desirable Communities</h3></a></li>
							</ul>
						</li>
						<li class="m-sky">
							<img src="{{ asset('assets/icons/shield.png') }}" width="40" alt="icon">
							<a href="#">Safety & <br>Security</a>
						</li>
						<li class="m-red">
							<img src="{{ asset('assets/icons/wallet.png') }}" width="40" alt="icon">
							<a href="#">Cost of Living & <br>Daily Expenses</a>
						</li>
						<li class="m-pblue">
							<img src="{{ asset('assets/icons/tree.png') }}" width="40" alt="icon">
							<a href="#">Recreation Lifestyle <br>& Fun</a>
						</li>
						<li class="m-gblue">
							<img src="{{ asset('assets/icons/car.png') }}" width="40" alt="icon">
							<a href="#">Transportation <br>Travel & Banking</a>
						</li>
						<li class="m-golden">
							<img src="https://buyahouseinrosarito.com/public/assets/icons/about.png" width="40" alt="icon">
							<a href="{{ url('/about') }}">About</a>
						</li>
						<li class="m-orange">
							<img src="https://buyahouseinrosarito.com/public/assets/icons/menu.png" width="40" alt="icon">
							<a href="#">More Pages</a>
							<ul class="sub-menu col-purple">
								<li>
									<a href="#">Property</a>
								</li>
								<li>
									<a href="{{ url('/contact') }}">Contact</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="header-user-menu link d-block d-xl-none">
					<div class="header-user-name">
						<a href="tel:{{ get_section_content('project', 'admin_phone') }}" class=""><i class="fa fa-phone ml-2"></i> {{ get_section_content('project', 'admin_phone') }} </a>
					</div>
				</div>
			</div>
			<div class="header-user-menu link mt-4 d-none d-xl-block">
				<div class="header-user-name">
					<a href="tel:{{ get_section_content('project', 'admin_phone') }}" class=""><i class="fa fa-phone ml-2"></i> {{ get_section_content('project', 'admin_phone') }} </a>
				</div>
			</div>
		</div>
	</div>
</header>