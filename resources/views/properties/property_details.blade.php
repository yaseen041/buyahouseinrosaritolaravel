@extends('app')
@section('content')
@push('styles')
<title>{{ $property['meta_title'] }}</title>
<meta name="description" content="{{ $property['meta_description'] }}" />
<meta name="keywords" content="{{ $property['meta_keywords'] }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:title" content="{{ $property['fb_title'] }}" />
<meta property="og:description" content="{{ $property['fb_description'] }}" />
<meta property="og:url" content="{{ url('/'); }}" />
<meta property="og:image" content="{{ $property['fb_image'] }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $property['twitter_title'] }}" />
<meta name="twitter:description" content="{{ $property['twitter_description'] }}" />
<meta name="twitter:image" content="{{ $property['twitter_image'] }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $property['json_ld_code'] ?>
</script>
<link rel="stylesheet" href="{{ asset('user_assets/css/leaflet.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/leaflet-gesture-handling.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/leaflet.markercluster.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/leaflet.markercluster.default.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/timedropper.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/datedropper.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/lightcase.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/owl.carousel.min.css') }}">
@endpush
{{-- {{ dd($property); }} --}}
<div class="clearfix" style="height: 115px;"></div>
<div class="clearfix"></div>
<div class="single-property-4">
    <div class="container-fluid p0">
        <div class="row">
            {{-- @foreach($property->gallery as $index => $image)
            @if ($index == 0)
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-lg-12 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="{{ $image }}">
                                <img class="img-fluid w100" src="{{ $image }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($index == 1)
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="{{ $image }}">
                                <img class="img-fluid w100" src="{{ $image }}" alt="">
                            </a>
                        </div>
                    </div>
                    @elseif ($index == 2)
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="{{ $image }}">
                                <img class="img-fluid w100" src="{{ $image }}" alt="">
                            </a>
                        </div>
                    </div>
                    @elseif ($index == 3)
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="{{ $image }}">
                                <img class="img-fluid w100" src="{{ $image }}" alt="">
                            </a>
                        </div>
                    </div>
                    @elseif ($index == 4)
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="{{ $image }}">
                                <img class="img-fluid w100" src="{{ $image }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach --}}
        </div>
    </div>
</div>

<section class="single-proper blog details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>{{ $property->title}}
                                            @if($property->listing_status == '1')
                                            <span class="mrg-l-5 category-tag">For Sale</span>
                                            @endif
                                        </h3>
                                        <div class="mt-0">
                                            <a href="#listing-location" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{ $property->address}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single detail-wrapper mr-2">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h4>${{ $property->price}}</h4>
                                            <div class="mt-0">
                                                <a href="#listing-location" class="listing-address">
                                                    <p>{{$property->size}} / sq ft</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="blog-info details mb-30">
                            <h5 class="mb-4">Description</h5>
                            <p class="mb-3">
                                {!! $property->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="single homes-content details mb-30">
                    <h5 class="mb-4">Property Details</h5>
                    <ul class="homes-list clearfix">
                        <li>
                            <span class="font-weight-bold mr-1">Property ID:</span>
                            <span class="det">{{ $property->code}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Property Type:</span>
                            <span class="det">{{ $property->type}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Property status:</span>
                            <span class="det">{{ $property->listing_status}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Property Price:</span>
                            <span class="det">${{$property->price}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Bedrooms:</span>
                            <span class="det">{{$property->bedrooms}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Bath:</span>
                            <span class="det">{{$property->bathrooms}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Garages:</span>
                            <span class="det">{{ $property->parking_spaces}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Year Built:</span>
                            <span class="det">{{ $property->year_built}}</span>
                        </li>
                    </ul>
                    <h5 class="mt-5">Amenities</h5>
                    <ul class="homes-list clearfix">
                        @foreach($features as $index => $feature)
                        <li>
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                            <span>{{ $feature->title }}<br></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="floor-plan property wprt-image-video w50 pro">
                    <h5>Floor Plans</h5>
                    <img alt="image" src="images/bg/floor-plan-1.png">
                </div>
                <div class="property-location map">
                    <h5>Location</h5>
                    <div class="divider-fade"></div>
                    <div id="map" class="contact-map"></div>
                    {{-- <div id="map-contact" class="contact-map"></div> --}}
                </div>
            </div>


            <aside class="col-lg-4 col-md-12 car">
                <div class="single widget">
                    <div class="schedule widget-boxed mt-30">
                        <div class="widget-boxed-header">
                            <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Schedule a Tour</h4>
                        </div>
                        <div class="widget-boxed-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 book">
                                    <input type="text" id="reservation-date" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
                                </div>
                                <div class="col-lg-6 col-md-12 book2">
                                    <input type="text" id="reservation-time" class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="row mrg-top-15 mb-3">
                                <div class="col-lg-6 col-md-12 mt-4">
                                    <label class="mb-4">Adult</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn counter-btn theme-cl btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[1]" class="border-0 text-center form-control input-number" data-min="0" data-max="10" value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn counter-btn theme-cl btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-4">
                                    <label class="mb-4">Children</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn counter-btn theme-cl btn-number" disabled="disabled" data-type="minus" data-field="quant[2]">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[2]" class="border-0 text-center form-control input-number" data-min="0" data-max="10" value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn counter-btn theme-cl btn-number" data-type="plus" data-field="quant[2]">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="payment-method.html" class="btn reservation btn-radius theme-btn full-width mrg-top-10">Submit Request</a>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="widget-boxed mt-33 mt-5">
                            <div class="widget-boxed-header">
                                <h4>Agent Information</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="sidebar-widget author-widget2">
                                    <div class="author-box clearfix">
                                        <img src="{{ asset('uploads/agents/').'/'.$agent->image }}"alt="author-image" class="author__img">
                                        <h4 class="author__title">{{ $agent->name }}</h4>
                                        <p class="author__meta">{{ $agent->designation}}</p>
                                    </div>
                                    <div class="agent-contact-form-sidebar">
                                        <h4>Request Inquiry</h4>
                                        <form name="contact_form" method="post" action="https://code-theme.com/html/findhouses/functions.php">
                                            <input type="text" id="fname" name="full_name" placeholder="Full Name" required />
                                            <input type="number" id="pnumber" name="phone_number" placeholder="Phone Number" required />
                                            <input type="email" id="emailid" name="email_address" placeholder="Email Address" required />
                                            <textarea placeholder="Message" name="message" required></textarea>
                                            <input type="submit" name="sendmessage" class="multiple-send-message" value="Submit Request" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-search-field-2">
                            <div class="widget-boxed mt-5">
                                <div class="widget-boxed-header">
                                    <h4>Recent Properties</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="recent-post">
                                        @foreach(get_recent_properties() as $pitem)
                                        <div class="recent-main mb-4">
                                            <div class="recent-img">
                                                <a href="{{url('/property')}}/{{$pitem->slug}}"><img src="{{ asset('uploads/properties').'/'.$pitem->banner }}" alt=""></a>
                                            </div>
                                            <div class="info-img">
                                                <a href="{{url('/property')}}/{{$pitem->slug}}"><h6>{{ limit_words($pitem->title, 3)}}</h6></a>
                                                <p>${{ number_format($pitem->price) }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <section class="similar-property featured portfolio p-0 bg-white-inner">
            <div class="container">
                <h5>Similar Properties</h5>
                <div class="row portfolio-items">
                    @foreach($related_listings as $rela_property)
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                        <div class="project-single">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <a href="{{ route('property', ['slug' => $rela_property->slug]) }}" class="homes-img">
                                        @if($property->is_featured == '2')
                                        <div class="homes-tag button alt sale">
                                            Featured
                                        </div>
                                        @endif
                                        @if($property->listing_status == '1')
                                        <div class="homes-tag button alt featured">
                                            For Sale
                                        </div>
                                        @endif
                                        <div class="homes-price">${{ number_format($rela_property->price, 2) }}</div>
                                        <img src="{{ asset('uploads/properties/' . $rela_property->banner) }}" alt="home-1" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="homes-content">
                                <h3><a href="{{ route('property', ['slug' => $rela_property->slug]) }}">{{ $rela_property->title }}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="{{ route('property', ['slug' => $rela_property->slug]) }}">
                                        <i class="fa fa-map-marker"></i><span>{{ $rela_property->address }}</span>
                                    </a>
                                </p>
                                <ul class="homes-list clearfix pb-3">
                                    <li class="the-icons">
                                        <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                        <span>{{ $rela_property->bedrooms }} Bedrooms</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                        <span>{{ $rela_property->bathrooms }} Bathrooms</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                        <span>{{ $rela_property->size }} sq ft</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                        <span>{{ $rela_property->parking_spaces }} Garages</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('user_assets/js/range-slider.js') }}"></script>
<script src="{{ asset('user_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('user_assets/js/slick4.js') }}"></script>
<script src="{{ asset('user_assets/js/popup.js') }}"></script>
<script src="{{ asset('user_assets/js/timedropper.js') }}"></script>
<script src="{{ asset('user_assets/js/datedropper.js') }}"></script>
<script src="{{ asset('user_assets/js/jqueryadd-count.js') }}"></script>
{{-- <script src="{{ asset('user_assets/js/leaflet.js') }}"></script>
<script src="{{ asset('user_assets/js/leaflet-gesture-handling.min.js') }}"></script>
<script src="{{ asset('user_assets/js/leaflet-providers.js') }}"></script>
<script src="{{ asset('user_assets/js/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('user_assets/js/map-single.js') }}"></script> --}}
<script src="{{ asset('user_assets/js/inner.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA&callback=initMap" async defer></script>
<script>
    function initMap() {
        var location = { lat: 32.4778975780612, lng: -116.88062589946308 };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: "Chichen Itza 8170, Rosarito, Mexico",
        });
    }
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }
    });
</script>
<script>
    $('#reservation-date').dateDropper();
</script>
<script>
    this.$('#reservation-time').timeDropper({
        setCurrentTime: false,
        meridians: true,
        primaryColor: "#e8212a",
        borderColor: "#e8212a",
        minutesInterval: '15'
    });
</script>
<script>
    $(document).ready(function() {
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
</script>
<script>
    $('.slick-carousel').each(function() {
        var slider = $(this);
        $(this).slick({
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '0'
        });
        $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
            slider.slick('slickPrev');
        });
        $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
            slider.slick('slickNext');
        });
    });
</script>
@endpush