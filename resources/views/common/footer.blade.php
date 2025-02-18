 <footer class="first-footer rec-pro">
 	<div class="top-footer bg-white">
 		<div class="container-fluid">
 			<div class="row">
 				<div class="col-lg-4 col-md-6 px-2 px-lg-5">
 					<div class="netabout">
 						<a href="{{ url('/')}}" class="logo">
 							<img style="width:120px" src="{{ asset('assets/img') }}/{{ get_section_content('project', 'site_logo') }}" alt="netcom">
 						</a>
 						<p class="text-left">{{ get_section_content('project', 'site_title') }}</p>
 					</div>
 					<div class="contactus">
 						<ul>
 							<li>
 								<div class="info">
 									<i class="fa fa-map-marker" aria-hidden="true"></i>
 									<p class="in-p">{{ get_section_content('project', 'admin_address') }}</p>
 								</div>
 							</li>
 							<li>
 								<div class="info">
 									<i class="fa fa-phone" aria-hidden="true"></i>
 									<p class="in-p"><a href="tel:{{ get_section_content('project', 'admin_phone') }}">{{ get_section_content('project', 'admin_phone') }}</a></p>
 								</div>
 							</li>
 							<li>
 								<div class="info">
 									<i class="fa fa-envelope" aria-hidden="true"></i>
 									<p class="in-p ti"><a href="mailto:{{ get_section_content('project', 'admin_email') }}">{{ get_section_content('project', 'admin_email') }}</a></p>
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
 								@if(count(get_properties_cities()) > 0)
 								@foreach (get_properties_cities() as $city_item)
 								<li><a href="{{ route('HandlerProperties', ['slug' => $city_item->slug]) }}">{{ $city_item->name }}</a></li>
 								@endforeach
 								@else
 								@foreach (get_cities() as $city)
 								<li><a href="{{ route('HandlerProperties', ['slug' => $city->slug]) }}">{{ $city->name }}</a></li>
 								@endforeach
 								@endif

 							</ul>
 							<ul class="nav-right w-50">
 								<li><a href="{{ url('/about')}}">About</a></li>
 								<li><a href="{{ url('/contact')}}">Contact</a></li>
 								<li><a href="{{ url('/faq')}}">FAQ</a></li>
 								<li><a href="{{ url('/blog')}}">Blog</a></li>
 								<li><a href="#">Privacy Policy</a></li>
 								<li class="no-mgb"><a href="#">Terms & Conditions</a></li>
 							</ul>
 						</div>
 					</div>
 				</div>


 				<div class="col-lg-4 col-md-6">
 					<div class="newsletters">
 						<h3>Newsletters</h3>
 						<p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
 					</div>
 					<form action="{{ url('submit_newsletter') }}" id="subscribe_form" class="bloq-email mailchimp d-block w-75" method="post">
 						@csrf
 						<label for="subscribeEmail" class="error"></label>
 						<div class="email d-flex">
 							<input type="email" id="subscribeEmail" name="email" placeholder="Enter Your Email">
 							<button type="button" id="btn_subscribeEmail">Subscribe</button>
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
 				Developed by - <a href="https://explorelogics.com" target="_blank" rel="nofollow">Explore Logics</a>
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