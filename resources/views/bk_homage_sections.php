 {{-- Properties Types --}}
        <section class="recently portfolio featured bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-title col-md-5 pl-44">
                        <h3>Properties</h3>
                        <h2>Types</h2>
                    </div>
                </div>
                <div class="portfolio col-xl-12 p-0">
                    <div class="slick-lancers">
                        {{-- {{dd($types)}} --}}
                        @foreach($types as $type)
                        <div class="agents-grid">
                            <div class="landscapes listing-item compact thehp-1" data-aos="fade-up" data-aos-delay="150">
                                <a href="{{ url('/properties?type=' . $type->slug) }}" class="recent-16">
                                    <div class="recent-img16 img-fluid img-center" style="background-image: url('{{$type->banner}}');"></div>
                                    <div class="recent-content"></div>
                                    <div class="recent-details">
                                        <div class="recent-title">{{ $type->title }} <small>({{ $type->property_count }})</small></div>
                                    </div>
                                    <div class="view-proper">View Details</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Properties Best Deals --}}
        <section class="recently portfolio bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-title col-md-5 pl-44">
                        <h3>Properties</h3>
                        <h2>Our Best Deals</h2>
                    </div>
                </div>
                <div class="portfolio col-xl-12 p-0">
                    <div class="slick-lancers">
                        @foreach($properties as $property)
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes listing-item compact thehp-2">
                                <a href="{{ url('/property').'/'.$property->slug }}" class="recent-16">
                                    <div class="recent-img16 img-center" style="background-image: url('{{ $property->banner }}');"></div>
                                    <div class="recent-content"></div>
                                    <div class="listing-badges">
                                        <span>For Sale </span>

                                        @if($property->is_featured)
                                        <span style="left: 110px;" >Featured</span>
                                        @endif
                                    </div>
                                    <div class="recent-details">
                                        <div class="recent-title">{{ $property->title }}</div>
                                        <div class="recent-price mb-3">${{$property->price}}</div>
                                        <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> {{$property->bedrooms}} Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> {{$property->bathrooms}} Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> {{$property->size}} sq ft</div>
                                    </div>
                                    <div class="view-proper">View Details</div>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        {{-- Agents --}}
        <section class="recently portfolio featured bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-title col-md-5 pl-44">
                        <h3>Cities</h3>
                        <h2>We Serve</h2>
                    </div>
                </div>
                <div class="portfolio col-xl-12 p-0">
                    <div class="slick-lancers">
                        @foreach($cities as $city)
                        <div class="agents-grid">
                            <div class="landscapes listing-item compact thehp-1" data-aos="fade-up" data-aos-delay="150">
                                <a href="{{ url('/properties?city=' . $city->slug) }}" class="recent-16">
                                    <div class="recent-img16 img-fluid img-center" style="background-image: url('{{$city->image}}');"></div>
                                    <div class="recent-content"></div>
                                    <div class="recent-details">
                                        <div class="recent-title">{{ $city->name }} <small>({{ $city->properties_count }})</small></div>
                                    </div>
                                    <div class="view-proper">View Details</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Testimonials --}}
        <section class="testimonials bg-white rec-pro">
            <div class="container-fluid">
                <div class="section-title">
                    <h3>Happy</h3>
                    <h2>Customers</h2>
                </div>
                <div class="owl-carousel style1">
                    <div class="test-1" data-aos="fade-up" data-aos-delay="150">
                        <h3>Lisa Smith</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-1.jpg') }}" alt="">
                        <h6 class="mt-2">New York</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="fade-up" data-aos-delay="250">
                        <h3>Jhon Morris</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-2.jpg') }}" alt="">
                        <h6 class="mt-2">Los Angeles</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="fade-up" data-aos-delay="350">
                        <h3>Mary Deshaw</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-3.jpg') }}" alt="">
                        <h6 class="mt-2">Chicago</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="fade-up" data-aos-delay="450">
                        <h3>Gary Steven</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-4.jpg') }}" alt="">
                        <h6 class="mt-2">Philadelphia</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="fade-up" data-aos-delay="550">
                        <h3>Cristy Mayer</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-5.jpg') }}" alt="">
                        <h6 class="mt-2">San Francisco</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="fade-up">
                        <h3>Ichiro Tasaka</h3>
                        <img src="{{ asset('user_assets/images/testimonials/ts-6.jpg') }}" alt="">
                        <h6 class="mt-2">Houston</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Blogs --}}
        <section class="blog-section bg-white-1 rec-pro">
            <div class="container-fluid">
                <div class="section-title">
                    <h3>Latest</h3>
                    <h2>News</h2>
                </div>
                <div class="news-wrap">
                    <div class="row">
                        @foreach ($latestBlogs as $blog)
                        <div class="col-xl-6 col-md-12 col-xs-12" data-aos="fade-right">
                            <div class="news-item news-item-sm">
                                <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="resp-img" src="{{$blog->featured_image}}" alt="{{ $blog->title }}">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}"><h3>{{ $blog->title }}</h3></a>
                                    <span class="date">{{ $blog->created_at->format('M d, Y') }} &nbsp;/&nbsp; By {{ $blog->author->name ?? 'Admin' }}</span>
                                    <div class="news-item-descr">
                                        <p>{{ \Str::limit($blog->meta_description, 100) }}</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" class="news-link">Read more...</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>