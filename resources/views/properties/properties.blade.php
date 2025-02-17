@extends('app')
@section('content')
@push('styles')
<title>{{ $page['meta_title'] }}</title>
<meta name="description" content="{{ $page['meta_description'] }}" />
<meta name="keywords" content="{{ $page['meta_keywords'] }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:title" content="{{ $page['fb_title'] }}" />
<meta property="og:description" content="{{ $page['fb_description'] }}" />
<meta property="og:url" content="{{ url('/'); }}" />
<meta property="og:image" content="{{ $page['fb_image'] }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page['twitter_title'] }}" />
<meta name="twitter:description" content="{{ $page['twitter_description'] }}" />
<meta name="twitter:image" content="{{ $page['twitter_image'] }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $page['json_ld_code'] ?>
</script>
@endpush
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Property Listings</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Property Listings</h2>
        </div>
    </div>
</section>

<div class="homepage-4 agents hp-6 full">
    <section class="properties-right featured portfolio blog pt-5 ">
        <div class="container">
            <section class="headings-2 py-0">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <h1 class="h1">Explore Our Exclusive Properties for Sale.</h1>
                            <p class="property-listing-description">Explore a variety of residential and commercial properties for sale and rent, including luxury homes, affordable options, and investment opportunities.</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row py-3">
                <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <form action="{{ url('properties') }}" method="GET" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="rld-single-input">
                                                <input name="search" type="text" placeholder="Enter Keyword..." value="{{ @$filters['search'] }}">
                                            </div>
                                            <div class="rld-single-select ml-22">
                                                <select name="type" class="select single-select">
                                                    <option value="">Select Property Type</option>
                                                    @foreach(getTypes() as $type)
                                                    <option value="{{ $type->slug }}" @if($type->slug == @$filters['type']) selected @endif>{{ $type->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="rld-single-select">
                                                <select name="city" class="select single-select mr-0">
                                                    <option value="">Select City</option>
                                                    @foreach(getCities() as $city)
                                                    <option value="{{ $city->name }}" @if($city->name == @$filters['city']) selected @endif>
                                                        {{ $city->name }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="dropdown-filter"><span>Advanced Search</span></div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                <button type="submit" class="btn btn-yellow" >Search Now</button>
                                            </div>
                                            <div class="explore__form-checkbox-list full-filter">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                        <div class="form-group categories">
                                                            <select name="comunity" class="select single-select wide">
                                                                <option value="">Select Comunity</option>
                                                                @foreach(getComunities() as $comunity)
                                                                <option value="{{ $comunity->slug }}" @if($comunity->slug == @$filters['comunity']) selected @endif>
                                                                    {{ $comunity->title }}
                                                                </option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                        <div class="form-group beds">
                                                           <select name="bedrooms" class="select single-select wide">
                                                            <option value="" class="option selected"> Bedrooms <i class="fa fa-bed" aria-hidden="true"></i></option>
                                                            <?php
                                                            $bedroomValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; ?>
                                                            @foreach($bedroomValues as $bedroom)
                                                            <option value="{{ $bedroom }}" @if($bedroom == @$filters['bedrooms']) selected @endif class="option">
                                                                {{ $bedroom }}
                                                            </option>

                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                    <div class="form-group bath">
                                                        <select name="bathrooms" class="select single-select wide">
                                                            <option value="" class="option selected">
                                                                <i class="fa fa-bath" aria-hidden="true"></i> Bathrooms
                                                            </option>
                                                            <?php
                                                            $bathroomValues = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; ?>
                                                            @foreach($bathroomValues as $bathroom)
                                                            <option value="{{ $bathroom }}" @if($bathroom == @$filters['bathrooms']) selected @endif class="option">
                                                                {{ $bathroom }}
                                                            </option>

                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 py-2 sld d-none d-lg-none d-xl-flex">
                                                    <div class="main-search-field-2 w-100">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div  class="range-slider">
                                                                    <label>Area Size</label>
                                                                    <div name="area" id="area-range" data-min="0" data-max="1300" data-unit="sq ft"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="range-slider">
                                                                    <label>Price Range</label>
                                                                    <div name="price" id="price-range" data-min="0" data-max="600000" data-unit="$"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach(getFeatures() as $index => $feature)
                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30 d-none d-lg-none d-xl-flex">
                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-{{ $index + 1 }}">
                                                        <input
                                                        id="check-{{ $index + 1 }}"
                                                        type="checkbox"
                                                        class="feature-checkbox"
                                                        value="{{ $feature->slug }}"
                                                        @if(in_array($feature->slug, explode(',', @$filters['features']))) checked @endif
                                                        >
                                                        <label for="check-{{ $index + 1 }}">{{ ucfirst($feature->title) }}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8 col-md-12 blog-pots">
                <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3">{{$properties->total()}} Properties</p>
                                </div>
                            </div>
                        </div>
                        <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                            <div class="input-group border rounded input-group-lg w-auto">
                                <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0" id="inputGroupSelect01" name="sortby">
                                    <option selected>Top Selling</option>
                                    <option value="1">Most Viewed</option>
                                    <option value="2">Price(low to high)</option>
                                    <option value="3">Price(high to low)</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </section>

                <div class="row">
                    @foreach ($properties as $property)
                    <div class="item col-lg-6 col-md-6 col-xs-12 landscapes sale">
                        <div class="project-single" data-aos="fade-up">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <a href="{{url('/property')}}/{{$property->slug}}" class="homes-img">
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
                                    <div class="homes-price">${{ number_format($property->price) }}</div>
                                    <img src="{{ asset('uploads/properties').'/'.$property->banner }}" alt="Property image" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="homes-content">
                            <h3><a href="{{url('/property')}}/{{$property->slug}}">{{ $property->title }}</a></h3>
                            <p class="homes-address mb-3">
                                <a href="{{url('/property')}}/{{$property->slug}}">
                                    <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                                </a>
                            </p>
                            <ul class="homes-list clearfix pb-3">
                                <li class="the-icons">
                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                    <span>{{ $property->bedrooms }} Bedrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                    <span>{{ $property->bathrooms }} Bathrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                    <span>{{ $property->size }} sq ft</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                    <span>{{ $property->parking_spaces }} Garages</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-6 pagebuttons">
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <aside class="col-lg-4 col-md-12 car">
            <div class="widget">

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
                <div class="widget-boxed mt-5">
                    <div class="widget-boxed-header mb-5">
                        <h4>Feature Properties</h4>
                    </div>
                    <div class="widget-boxed-body">
                        <div class="slick_featured">
                            @foreach(get_recent_featured_properties() as $fpitem)
                            <div class="agents-grid mr-0">
                                <div class="listing-item compact">
                                    <a href="#" class="listing-img-container">
                                        <div class="listing-badges">
                                            <span class="featured">${{ number_format($fpitem->price) }}</span>
                                            @if($fpitem->listing_status == '1')
                                            <span>For Sale</span>
                                            @endif
                                        </div>
                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">{{ limit_words($fpitem->title, 3)}}</span>
                                            <ul class="listing-hidden-content">
                                                <li>Area <span>{{ $fpitem->size }} sq ft</span></li>
                                                <li>Rooms <span> {{ $fpitem->bedrooms }}</span></li>
                                                <li>Garages <span>{{ $fpitem->parking_spaces }}</span></li>
                                                <li>Baths <span>{{ $fpitem->bathrooms }}</span></li>
                                            </ul>
                                        </div>
                                        <img src="{{ asset('user_assets/images/feature-properties/fp-1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</section>
</div>
@endsection
@push('scripts')
<script src="{{ asset('user_assetsjs/rangeSlider.js') }}"></script>
<script src="{{ asset('user_assetsjs/popper.min.js') }}"></script>
<script src="{{ asset('user_assetsjs/light.js') }}"></script>
<script src="{{ asset('user_assetsjs/popup.js') }}"></script>
<script src="{{ asset('user_assetsjs/searched.js') }}"></script>
<script src="{{ asset('user_assetsjs/inner.js') }}"></script>
<script>
    $(".dropdown-filter").on('click', function() {
        $(".explore__form-checkbox-list").toggleClass("filter-block");
    });
    $('.slick_featured').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        adaptiveHeight: true,
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            let selectedFeatures = [];
            document.querySelectorAll(".feature-checkbox:checked").forEach((checkbox) => {
                selectedFeatures.push(checkbox.value);
            });

        // Ensure only 'features_string' is submitted, removing duplicate 'features[]'
            let existingInput = document.querySelector("input[name='features']");
            if (existingInput) {
                existingInput.value = selectedFeatures.join(",");
            } else {
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "features";
                input.value = selectedFeatures.join(",");
                this.appendChild(input);
            }
        });
    });
</script>
@endpush