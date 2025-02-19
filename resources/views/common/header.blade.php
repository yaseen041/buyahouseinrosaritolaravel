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
								@foreach (getCategoryTreeWithPosts(14) as $category)
								@if ($category->posts->count() || hasChildWithPosts($category))
								<li>
									<a href="{{ route('slugHandler', ['slug' => $category->slug]) }}"><strong>{{ $category->title }}</strong></a>
									@if ($category->posts->count())
									<div class="menu-list">
										@foreach ($category->posts as $post)
										<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
										@endforeach
									</div>
									@endif
									@if ($category->children->count() && hasChildWithPosts($category))
									<ul class="sub-menu col-purple">
										@foreach ($category->children as $childCategory)
										@if ($childCategory->posts->count() || hasChildWithPosts($childCategory))
										<li>
											<a href="{{ route('slugHandler', ['slug' => $childCategory->slug]) }}"><strong>{{ $childCategory->title }}</strong></a>
											@if ($childCategory->posts->count())
											<div class="menu-list">
												@foreach ($childCategory->posts as $post)
												<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }} </a>
												@endforeach
											</div>
											@endif
											{{-- @if ($childCategory->children->count() && hasChildWithPosts($childCategory))
											<ul class="sub-menu col-purple">
												@foreach ($childCategory->children as $subChildCategory)
												@if ($subChildCategory->posts->count() || hasChildWithPosts($subChildCategory))
												<li>
													<a href="#"><strong>{{ $subChildCategory->title }}</strong></a>
													@if ($subChildCategory->posts->count())
													<div class="menu-list">
														@foreach ($subChildCategory->posts as $post)
														<a class="post_title" href="{{ $post->post_url }}">{{ $post->title }}</a>
														@endforeach
													</div>
													@endif
												</li>
												@endif
												@endforeach
											</ul>
											@endif --}}
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						<li class="m-sky">
							<img src="{{ asset('assets/icons/shield.png') }}" width="40" alt="icon">
							<a href="#">Safety & <br>Security</a>
							<ul class="sub-menu col-purple">
								@foreach (getCategoryTreeWithPosts(15) as $category)
								@if ($category->posts->count() || hasChildWithPosts($category))
								<li>
									<a href="{{ route('slugHandler', ['slug' => $category->slug]) }}"><strong>{{ $category->title }}</strong></a>
									@if ($category->posts->count())
									<div class="menu-list">
										@foreach ($category->posts as $post)
										<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
										@endforeach
									</div>
									@endif
									@if ($category->children->count() && hasChildWithPosts($category))
									<ul class="sub-menu col-purple">
										@foreach ($category->children as $childCategory)
										@if ($childCategory->posts->count() || hasChildWithPosts($childCategory))
										<li>
											<a href="{{ route('slugHandler', ['slug' => $childCategory->slug]) }}"><strong>{{ $childCategory->title }}</strong></a>
											@if ($childCategory->posts->count())
											<div class="menu-list">
												@foreach ($childCategory->posts as $post)
												<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
												@endforeach
											</div>
											@endif
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						<li class="m-red">
							<img src="{{ asset('assets/icons/wallet.png') }}" width="40" alt="icon">
							<a href="#">Cost of Living & <br>Daily Expenses</a>
							<ul class="sub-menu col-purple">
								@foreach (getCategoryTreeWithPosts(16) as $category)
								@if ($category->posts->count() || hasChildWithPosts($category))
								<li>
									<a href="{{ route('slugHandler', ['slug' => $category->slug]) }}"><strong>{{ $category->title }}</strong></a>
									@if ($category->posts->count())
									<div class="menu-list">
										@foreach ($category->posts as $post)
										<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
										@endforeach
									</div>
									@endif
									@if ($category->children->count() && hasChildWithPosts($category))
									<ul class="sub-menu col-purple">
										@foreach ($category->children as $childCategory)
										@if ($childCategory->posts->count() || hasChildWithPosts($childCategory))
										<li>
											<a href="{{ route('slugHandler', ['slug' => $childCategory->slug]) }}"><strong>{{ $childCategory->title }}</strong></a>
											@if ($childCategory->posts->count())
											<div class="menu-list">
												@foreach ($childCategory->posts as $post)
												<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
												@endforeach
											</div>
											@endif
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						<li class="m-pblue">
							<img src="{{ asset('assets/icons/tree.png') }}" width="40" alt="icon">
							<a href="#">Recreation Lifestyle <br>& Fun</a>
							<ul class="sub-menu col-purple">
								@foreach (getCategoryTreeWithPosts(17) as $category)
								@if ($category->posts->count() || hasChildWithPosts($category))
								<li>
									<a href="{{ route('slugHandler', ['slug' => $category->slug]) }}"><strong>{{ $category->title }}</strong></a>
									@if ($category->posts->count())
									<div class="menu-list">
										@foreach ($category->posts as $post)
										<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
										@endforeach
									</div>
									@endif
									@if ($category->children->count() && hasChildWithPosts($category))
									<ul class="sub-menu col-purple">
										@foreach ($category->children as $childCategory)
										@if ($childCategory->posts->count() || hasChildWithPosts($childCategory))
										<li>
											<a href="{{ route('slugHandler', ['slug' => $childCategory->slug]) }}"><strong>{{ $childCategory->title }}</strong></a>
											@if ($childCategory->posts->count())
											<div class="menu-list">
												@foreach ($childCategory->posts as $post)
												<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
												@endforeach
											</div>
											@endif
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						<li class="m-gblue">
							<img src="{{ asset('assets/icons/car.png') }}" width="40" alt="icon">
							<a href="#">Transportation <br>Travel & Banking</a>
							<ul class="sub-menu col-purple">
								@foreach (getCategoryTreeWithPosts(18) as $category)
								@if ($category->posts->count() || hasChildWithPosts($category))
								<li>
									<a href="{{ route('slugHandler', ['slug' => $category->slug]) }}"><strong>{{ $category->title }}</strong></a>
									@if ($category->posts->count())
									<div class="menu-list">
										@foreach ($category->posts as $post)
										<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
										@endforeach
									</div>
									@endif
									@if ($category->children->count() && hasChildWithPosts($category))
									<ul class="sub-menu col-purple">
										@foreach ($category->children as $childCategory)
										@if ($childCategory->posts->count() || hasChildWithPosts($childCategory))
										<li>
											<a href="{{ route('slugHandler', ['slug' => $childCategory->slug]) }}"><strong>{{ $childCategory->title }}</strong></a>
											@if ($childCategory->posts->count())
											<div class="menu-list">
												@foreach ($childCategory->posts as $post)
												<a class="post_title" href="{{ route('slugHandler', ['slug' => $post->post_url]) }}">{{ $post->title }}</a>
												@endforeach
											</div>
											@endif
										</li>
										@endif
										@endforeach
									</ul>
									@endif
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						<li class="m-golden">
							<img src="https://buyahouseinrosarito.com/public/assets/icons/about.png" width="40" alt="icon">
							<a href="{{ url('/about') }}">About</a>
						</li>
						<li class="m-orange more-p">
							<img src="https://buyahouseinrosarito.com/public/assets/icons/menu.png" width="40" alt="icon">
							<a href="#">More Pages</a>
							<ul class="sub-menu col-purple">
								<li>
									<a href="{{ url('/properties') }}">Property</a>
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