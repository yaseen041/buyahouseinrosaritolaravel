@extends('app')
@section('content')
@push('styles')
<title>{{ $property['meta_title'] }}</title>
<meta name="description" content="{{ $property['meta_description'] }}" />
<meta name="keywords" content="{{ $property['meta_keywords'] }}" />
<link rel="canonical" href="{{ request()->url() }}" />
<meta property="og:title" content="{{ $property['fb_title'] }}" />
<meta property="og:description" content="{{ $property['fb_description'] }}" />
<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:image" content="{{ $property['fb_image'] }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $property['twitter_title'] }}" />
<meta name="twitter:description" content="{{ $property['twitter_description'] }}" />
<meta name="twitter:image" content="{{ $property['twitter_image'] }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $property['json_ld_code'] ?>
</script>
<link rel="stylesheet" href="{{ asset('user_assets/css/timedropper.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/datedropper.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/lightcase.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_assets/css/owl.carousel.min.css') }}">

<style>
    .inner-pages .detail_banner.headings {
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(18, 27, 34, 0.6)), to(rgba(18, 27, 34, 0.6))), url("{{ asset('uploads/properties').'/'.$property->banner }}") repeat center center;
      background: linear-gradient(rgba(18, 27, 34, 0.6), rgba(18, 27, 34, 0.6)), url("{{ asset('uploads/properties').'/'.$property->banner }}") repeat center center;
      width: 100%;
      height: 30vh;
      background-size: cover;
  }
</style>
@endpush
<section class="headings detail_banner">
    <div class="text-heading text-center">
        <div class="container">
            <h1>{{ $property->title}}</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; {{ $property->title}}</h2>
        </div>
    </div>
</section>
<div class="inner-pages sin-1 homepage-4 hd-white">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($property->gallery as $index => $image)
            <div class="swiper-slide">
                <a href="{{ $image }}" target="_blank" class="grid image-link">
                    <img src="{{ $image }}" class="img-fluid" alt="#">
                </a>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination swiper-pagination-white"></div>
        <div class="swiper-button-next swiper-button-white mr-3"></div>
        <div class="swiper-button-prev swiper-button-white ml-3"></div>
    </div>
</div>
<section class="single-proper blog details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12">
                        <section class="headings-2 pb-0 pt-0">
                            <div class="row pro-wrapper">
                                <div class="col-12 col-md-8 col-lg-9 col-xl-9  detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>{{ $property->title}}</h3>
                                        <div class="mt-0">
                                            <a href="#listing-location" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i>{{ $property->address}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3 col-xl-3 single detail-wrapper text-lg-right py-1">
                                    <div class="detail-wrapper-body pt-1">
                                        <div class="listing-title-bar">
                                            <h4>${{ number_format($property->price, 2)}}</h4>
                                            <div class="mt-0">
                                                <a href="#listing-location" class="listing-address">
                                                    <p>{{ number_format($property->size, 2)}} sq ft</p>
                                                </a>
                                            </div>
                                            @if($property->listing_status == '1')
                                            <span class="mrg-l-5 category-tag">For Sale</span>
                                            @endif
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
                            <span class="det">{{ getPropertyTypeTitle($property->id) }}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Property status:</span>
                            <span class="det">{{ $property->listing_status == 1 ? 'For Sale' : 'For Rent' }}</span>
                        </li>

                        @if(!empty($property->building_type))
                        <li>
                            <span class="font-weight-bold mr-1">Building Type:</span>
                            <span class="det">{{ $property->building_type}}</span>
                        </li>
                        @endif

                        <li>
                            <span class="font-weight-bold mr-1">Year Built:</span>
                            <span class="det">{{ $property->year_built}}</span>
                        </li>


                        <li>
                            <span class="font-weight-bold mr-1">Property Price:</span>
                            <span class="det">${{number_format($property->price, 2)}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Area sq ft:</span>
                            <span class="det">{{number_format($property->size, 2)}}</span>
                        </li>
                        @if(!empty($property->property_tax) && $property->property_tax > 0)
                        <li>
                            <span class="font-weight-bold mr-1">Property Tax (Yearly):</span>
                            <span class="det">${{number_format($property->property_tax, 2)}}</span>
                        </li>
                        @endif
                        @if(!empty($property->hoa_fees) && $property->hoa_fees > 0)
                        <li>
                            <span class="font-weight-bold mr-1">HOA Fee (Monthly):</span>
                            <span class="det">${{number_format($property->hoa_fees, 2)}}</span>
                        </li>
                        @endif
                        <li>
                            <span class="font-weight-bold mr-1">Bedrooms:</span>
                            <span class="det">{{$property->bedrooms}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Bath:</span>
                            <span class="det">{{$property->bathrooms}}</span>
                        </li>
                        <li>
                            <span class="font-weight-bold mr-1">Parking Lots:</span>
                            <span class="det">{{ $property->parking_spaces}}</span>
                        </li>
                        @if(!empty($property->listing_date))
                        <li>
                            <span class="font-weight-bold mr-1">Listing Date:</span>
                            <span class="det">{{ $property->listing_date}}</span>
                        </li>
                        @endif
                    </ul>
                    <h5 class="mt-5">Amenities</h5>
                    <ul class="homes-list clearfix">
                        @foreach($features as $index => $feature)
                        <li>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span>{{ $feature->title }}<br></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="property-location map">
                    <h5>Location</h5>
                    <div class="divider-fade"></div>
                    <div id="map" class="contact-map"></div>
                </div>
            </div>
            <aside class="col-lg-4 col-md-12 car">
                <div class="single widget">
                    <div class="sidebar">
                        <div class="widget-boxed">
                            <div class="widget-boxed-header">
                                <h4>Request Inquiry</h4>
                            </div>
                            <div class="sidebar-widget author-widget2">
                                <div class="agent-contact-form-sidebar">
                                    <form id="contact_form" class="contact-form" name="contact_form" method="post" novalidate>
                                        @csrf
                                        <input type="text" id="fname" name="name" placeholder="Name" required />
                                        <input type="text" id="pnumber" name="phone" placeholder="Phone Number" required />
                                        <input type="email" id="emailid" name="email" placeholder="Email Address" required />
                                        <input type="hidden" name="property[]" value="{{ $property->id}}" placeholder="Property">
                                        <textarea placeholder="Message" name="message" required></textarea>
                                        <input type="button" id="btn_submit_contact" name="sendmessage" class="multiple-send-message" value="Submit Request" />
                                    </form>
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
                                                <p>${{ number_format($pitem->price, 2) }}</p>
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
        @if($related_listings->isNotEmpty())
        <section class="similar-property featured portfolio p-0 bg-white-inner">
            <div class="container">
                <h5>Similar Properties</h5>
                <div class="row portfolio-items">
                    @foreach($related_listings as $rela_property)
                    <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                        <div class="project-single">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <a href="{{url('/property')}}/{{$rela_property->slug}}" class="homes-img">
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
                                <h3><a href="{{url('/property')}}/{{$rela_property->slug}}">{{ $rela_property->title }}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="{{url('/property')}}/{{$rela_property->slug}}">
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
                                        <span>{{ number_format($rela_property->size, 2) }} sq ft</span>
                                    </li>
                                    <li class="the-icons">
                                        <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                        <span>{{ $rela_property->parking_spaces }} Parkings</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
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
<script src="{{ asset('user_assets/js/inner.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA&callback=initMap" async defer></script>
<script>
    $(document).on("click" , "#btn_submit_contact" , function() {
        event.preventDefault();
        var btn = $(this);
        btn.prop("disabled", true).text("Please Wait...");
        var formData =  new FormData($("#contact_form")[0]);
        $.ajax({
            url:"{{ url('submit_contact') }}",
            type: 'POST',
            data: formData,
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false,
            success:function(status){
                btn.prop("disabled", false).text("Submit");
                if(status.msg=='success') {
                    toastr.success(status.response,"Success");
                    $('#contact_form')[0].reset();
                    setTimeout(function(){
                        location.reload(true);
                    }, 2000);
                } else if(status.msg == 'error') {
                    toastr.error(status.response,"Error");
                } else if(status.msg == 'lvl_error') {
                    var message = "";
                    $.each(status.response, function (key, value) {
                        message += value+"<br>";
                    });
                    toastr.error(message, "Error");
                }
            }
        });
    });
    function initMap() {
        var location = {
            lat: {{ $property->lattitude }},
            lng: {{ $property->longitude }}
        };
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