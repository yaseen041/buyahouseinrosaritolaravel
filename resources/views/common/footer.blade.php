 <footer class="first-footer rec-pro">
 	<div class="top-footer bg-white">
 		<div class="container-fluid">
 			<div class="row">
 				<div class="col-lg-4 col-md-6 px-2 px-lg-5">
 					<div class="netabout">
 						<a href="index.html" class="logo">
 							<img style="width:120px" src="{{ asset('assets/img') }}/{{ get_section_content('project', 'site_logo') }}" alt="netcom">
 						</a>
 						<p class="text-left">{{ get_section_content('project', 'site_title') }}</p>
 					</div>
 					<div class="contactus">
 						<ul>
 							<li>
 								<div class="info">
 									<i class="fa fa-map-marker" aria-hidden="true"></i>
 									<p class="in-p">Chichen Itza 8170, Rosarito, Mexico, 22567</p>
 								</div>
 							</li>
 							<li>
 								<div class="info">
 									<i class="fa fa-phone" aria-hidden="true"></i>
 									<p class="in-p">+1 (619) 2589-7442</p>
 								</div>
 							</li>
 							<li>
 								<div class="info">
 									<i class="fa fa-envelope" aria-hidden="true"></i>
 									<p class="in-p ti">aaron@buyahouseinrosarito.com</p>
 								</div>
 							</li>
 						</ul>
 					</div>
 				</div>

 				<div class="col-lg-4 col-md-6">
 					<div class="navigation">
 						<h3>Discover</h3>
 						<div class="nav-footer">
 							<ul class="w-50">
 								<li><a href="">Rosarito</a></li>
 								<li><a href="">Los Angeles</a></li>
 								<li><a href="">Mexico City </a></li>
 								<li><a href="">Cancun</a></li>
 								<li><a href="">Cabo San Lucas</a></li>
 								<li class="no-mgb"><a href="">Playa del Carmen</a></li>
 							</ul>
 							<ul class="nav-right w-50">
 								<li><a href="">About</a></li>
 								<li><a href="">Contact</a></li>
 								<li><a href="">FAQ</a></li>
 								<li><a href="">Blog</a></li>
 								<li><a href="">Privacy Policy</a></li>
 								<li class="no-mgb"><a href="">Terms & Conditions</a></li>
 							</ul>
 						</div>
 					</div>
 				</div>


 				<div class="col-lg-4 col-md-6">
 					<div class="newsletters">
 						<h3>Newsletters</h3>
 						<p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
 					</div>
 					<form class="bloq-email mailchimp d-block w-75" method="post">
 						<label for="subscribeEmail" class="error"></label>
 						<div class="email d-flex">
 							<input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
 							<input type="submit" value="Subscribe">
 							<p class="subscription-success"></p>
 						</div>

 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="second-footer bg-white-1 rec-pro">
 		<div class="container-fluid sd-f text-center">
 			<p class="w-100">
 				<strong>{{ get_section_content('project', 'site_title') }}</strong> - Copyright &copy;
 				{{ date("Y") }}
 				Developed by - <a href="https://explorelogics.com" target="_blank">Explore Logics </a>
 			</p>
 		</div>
 	</div>
 </footer>
 <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

 <div id="preloader">
 	<div id="status">
 		<div class="status-mes"></div>
 	</div>
 </div>