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
    {!! $page['json_ld_code'] !!}
</script>
@endpush
<div class="clearfix"></div>
<div class="homepage-4 agents hp-6 full">
    <section class="properties-right featured portfolio blog pt-5 ">
        <div class="container">
            <section class="headings-2 pt-0 pb-55">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p class="pb-2"><a href="index.html">Home </a> &nbsp;/&nbsp; <span>PropertiesListings</span></p>
                            </div>
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
                                    <div class="row">
                                        <div class="rld-single-input">
                                            <input type="text" placeholder="Enter Keyword...">
                                        </div>
                                        <div class="rld-single-select ml-22">
                                            <select class="select single-select" style="display: none;">
                                                <option value="1">Property Type</option>
                                                <option value="2">Family House</option>
                                                <option value="3">Apartment</option>
                                                <option value="3">Condo</option>
                                            </select><div class="nice-select select single-select" tabindex="0"><span class="current">Property Type</span><ul class="list"><li data-value="1" class="option selected">Property Type</li><li data-value="2" class="option">Family House</li><li data-value="3" class="option">Apartment</li><li data-value="3" class="option">Condo</li></ul></div>
                                        </div>
                                        <div class="rld-single-select">
                                            <select class="select single-select mr-0" style="display: none;">
                                                <option value="1">Location</option>
                                                <option value="2">Los Angeles</option>
                                                <option value="3">Chicago</option>
                                                <option value="3">Philadelphia</option>
                                                <option value="3">San Francisco</option>
                                                <option value="3">Miami</option>
                                                <option value="3">Houston</option>
                                            </select><div class="nice-select select single-select mr-0" tabindex="0"><span class="current">Location</span><ul class="list"><li data-value="1" class="option selected">Location</li><li data-value="2" class="option">Los Angeles</li><li data-value="3" class="option">Chicago</li><li data-value="3" class="option">Philadelphia</li><li data-value="3" class="option">San Francisco</li><li data-value="3" class="option">Miami</li><li data-value="3" class="option">Houston</li></ul></div>
                                        </div>
                                        <div class="dropdown-filter"><span>Advanced Search</span></div>
                                        <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                            <a class="btn btn-yellow" href="#">Search Now</a>
                                        </div>
                                        <div class="explore__form-checkbox-list full-filter">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0">
                                                    <div class="form-group categories">
                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected ">For Sale</li>
                                                                <li data-value="2" class="option">For Rent</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                    <div class="form-group beds">
                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="3" class="option">4</li>
                                                                <li data-value="3" class="option">5</li>
                                                                <li data-value="3" class="option">6</li>
                                                                <li data-value="3" class="option">7</li>
                                                                <li data-value="3" class="option">8</li>
                                                                <li data-value="3" class="option">9</li>
                                                                <li data-value="3" class="option">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                    <div class="form-group bath">
                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="3" class="option">4</li>
                                                                <li data-value="3" class="option">5</li>
                                                                <li data-value="3" class="option">6</li>
                                                                <li data-value="3" class="option">7</li>
                                                                <li data-value="3" class="option">8</li>
                                                                <li data-value="3" class="option">9</li>
                                                                <li data-value="3" class="option">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                    <div class="main-search-field-2">
                                                        <div class="range-slider">
                                                            <label>Area Size</label>
                                                            <div id="area-range" data-min="0" data-max="1300" data-unit="sq ft" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><input type="text" class="first-slider-value" disabled=""><input type="text" class="second-slider-value" disabled=""><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <br>
                                                        <div class="range-slider">
                                                            <label>Price Range</label>
                                                            <div id="price-range" data-min="0" data-max="600000" data-unit="$" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><input type="text" class="first-slider-value" disabled=""><input type="text" class="second-slider-value" disabled=""><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                                        <input id="check-2" type="checkbox" name="check">
                                                        <label for="check-2">Air Conditioning</label>
                                                        <input id="check-3" type="checkbox" name="check">
                                                        <label for="check-3">Swimming Pool</label>
                                                        <input id="check-4" type="checkbox" name="check">
                                                        <label for="check-4">Central Heating</label>
                                                        <input id="check-5" type="checkbox" name="check">
                                                        <label for="check-5">Laundry Room</label>
                                                        <input id="check-6" type="checkbox" name="check">
                                                        <label for="check-6">Gym</label>
                                                        <input id="check-7" type="checkbox" name="check">
                                                        <label for="check-7">Alarm</label>
                                                        <input id="check-8" type="checkbox" name="check">
                                                        <label for="check-8">Window Covering</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                                        <input id="check-9" type="checkbox" name="check">
                                                        <label for="check-9">WiFi</label>
                                                        <input id="check-10" type="checkbox" name="check">
                                                        <label for="check-10">TV Cable</label>
                                                        <input id="check-11" type="checkbox" name="check">
                                                        <label for="check-11">Dryer</label>
                                                        <input id="check-12" type="checkbox" name="check">
                                                        <label for="check-12">Microwave</label>
                                                        <input id="check-13" type="checkbox" name="check">
                                                        <label for="check-13">Washer</label>
                                                        <input id="check-14" type="checkbox" name="check">
                                                        <label for="check-14">Refrigerator</label>
                                                        <input id="check-15" type="checkbox" name="check">
                                                        <label for="check-15">Outdoor Shower</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <p class="font-weight-bold mb-0 mt-3">8 Search results</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                <div class="input-group border rounded input-group-lg w-auto mr-4">
                                    <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                                    <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                        <option selected>Top Selling</option>
                                        <option value="1">Most Viewed</option>
                                        <option value="2">Price(low to high)</option>
                                        <option value="3">Price(high to low)</option>
                                    </select>
                                </div>
                                <div class="sorting-options">
                                    <a href="properties-list-1.html" class="change-view-btn lde"><i class="fa fa-th-list"></i></a>
                                    <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
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
                                        <a href="" class="homes-img">
                                            <div class="homes-tag button alt featured">
                                                @if($property->is_featured)
                                                Featured
                                                @endif
                                            </div>
                                            <div class="homes-tag button alt sale">
                                                @if($property->listing_status == 'sale') For Sale @endif
                                            </div>
                                            <div class="homes-price">${{ number_format($property->price) }}/mo</div>
                                            <img src="{{$property->banner}}" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="" class="btn"><i class="fa fa-link"></i></a>
                                        <a href="{{ $property->video_url }}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                        <a href="" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                                <div class="homes-content">
                                    <h3><a href="">{{ $property->name }}</a></h3>
                                    <p class="homes-address mb-3">
                                        <a href="">
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
                                            <span>{{ $property->area }} sq ft</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                            <span>{{ $property->garages }} Garages</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3">
                                            <a href="">${{ number_format($property->price) }}</a>
                                        </h3>
                                        <div class="compare">
                                            <a href="#" title="Compare">
                                                <i class="flaticon-compare"></i>
                                            </a>
                                            <a href="#" title="Share">
                                                <i class="flaticon-share"></i>
                                            </a>
                                            <a href="#" title="Favorites">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <nav aria-label="..." class="pt-55">
                            <ul class="pagination">
                                @if ($properties->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $properties->previousPageUrl() }}">Previous</a>
                                </li>
                                @endif
                                @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $properties->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }} <span class="sr-only">(current)</span></a>
                                </li>
                                @endforeach
                                @if ($properties->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $properties->nextPageUrl() }}">Next</a>
                                </li>
                                @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="widget">
                        <div class="widget-boxed main-search-field">
                            <div class="widget-boxed-header">
                                <h4>Find Your House</h4>
                            </div>
                            <div class="trip-search">
                                <form class="form">
                                    <div class="form-group looking">
                                        <div class="first-select wide">
                                            <div class="main-search-input-item">
                                                <input type="text" placeholder="Enter Keyword..." value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group location">
                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-map-marker"></i>Location</span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected ">New York</li>
                                                <li data-value="2" class="option">Los Angeles</li>
                                                <li data-value="3" class="option">Chicago</li>
                                                <li data-value="3" class="option">Philadelphia</li>
                                                <li data-value="3" class="option">San Francisco</li>
                                                <li data-value="3" class="option">Miami</li>
                                                <li data-value="3" class="option">Houston</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group categories">
                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home" aria-hidden="true"></i>Property Type</span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected ">House</li>
                                                <li data-value="2" class="option">Apartment</li>
                                                <li data-value="3" class="option">Condo</li>
                                                <li data-value="3" class="option">Land</li>
                                                <li data-value="3" class="option">Bungalow</li>
                                                <li data-value="3" class="option">Single Family</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group categories">
                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected ">For Sale</li>
                                                <li data-value="2" class="option">For Rent</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group beds">
                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">1</li>
                                                <li data-value="2" class="option">2</li>
                                                <li data-value="3" class="option">3</li>
                                                <li data-value="3" class="option">4</li>
                                                <li data-value="3" class="option">5</li>
                                                <li data-value="3" class="option">6</li>
                                                <li data-value="3" class="option">7</li>
                                                <li data-value="3" class="option">8</li>
                                                <li data-value="3" class="option">9</li>
                                                <li data-value="3" class="option">10</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group bath">
                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</span>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">1</li>
                                                <li data-value="2" class="option">2</li>
                                                <li data-value="3" class="option">3</li>
                                                <li data-value="3" class="option">4</li>
                                                <li data-value="3" class="option">5</li>
                                                <li data-value="3" class="option">6</li>
                                                <li data-value="3" class="option">7</li>
                                                <li data-value="3" class="option">8</li>
                                                <li data-value="3" class="option">9</li>
                                                <li data-value="3" class="option">10</li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="main-search-field-2">
                                <div class="range-slider">
                                    <label>Area Size</label>
                                    <div id="area-range" data-min="0" data-max="1300" data-unit="sq ft"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <div class="range-slider">
                                    <label>Price Range</label>
                                    <div id="price-range" data-min="0" data-max="600000" data-unit="$"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30" data-open-title="Advanced Features" data-close-title="Advanced Features"></a>
                            <div class="more-search-options relative">
                                <div class="checkboxes one-in-row margin-bottom-10">
                                    <input id="check-2" type="checkbox" name="check">
                                    <label for="check-2">Air Conditioning</label>
                                    <input id="check-3" type="checkbox" name="check">
                                    <label for="check-3">Swimming Pool</label>
                                    <input id="check-4" type="checkbox" name="check">
                                    <label for="check-4">Central Heating</label>
                                    <input id="check-5" type="checkbox" name="check">
                                    <label for="check-5">Laundry Room</label>
                                    <input id="check-6" type="checkbox" name="check">
                                    <label for="check-6">Gym</label>
                                    <input id="check-7" type="checkbox" name="check">
                                    <label for="check-7">Alarm</label>
                                    <input id="check-8" type="checkbox" name="check">
                                    <label for="check-8">Window Covering</label>
                                    <input id="check-9" type="checkbox" name="check">
                                    <label for="check-9">WiFi</label>
                                    <input id="check-10" type="checkbox" name="check">
                                    <label for="check-10">TV Cable</label>
                                    <input id="check-11" type="checkbox" name="check">
                                    <label for="check-11">Dryer</label>
                                    <input id="check-12" type="checkbox" name="check">
                                    <label for="check-12">Microwave</label>
                                    <input id="check-13" type="checkbox" name="check">
                                    <label for="check-13">Washer</label>
                                    <input id="check-14" type="checkbox" name="check">
                                    <label for="check-14">Refrigerator</label>
                                    <input id="check-15" type="checkbox" name="check">
                                    <label for="check-15">Outdoor Shower</label>
                                </div>
                            </div>
                            <div class="col-lg-12 no-pds">
                                <div class="at-col-default-mar">
                                    <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-boxed mt-5">
                            <div class="widget-boxed-header mb-5">
                                <h4>Feature Properties</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="slick-lancers">
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 230,000</span>
                                                    <span>For Sale</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>New York</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 6,500</span>
                                                    <span class="rent">For Rent</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>Los Angles</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 230,000</span>
                                                    <span>For Sale</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>San Francisco</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 6,500</span>
                                                    <span class="rent">For Rent</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>Miami FL</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-4.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 230,000</span>
                                                    <span>For Sale</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>Chicago IL</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-5.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="agents-grid mr-0">
                                        <div class="listing-item compact">
                                            <a href="properties-details.html" class="listing-img-container">
                                                <div class="listing-badges">
                                                    <span class="featured">$ 6,500</span>
                                                    <span class="rent">For Rent</span>
                                                </div>
                                                <div class="listing-img-content">
                                                    <span class="listing-compact-title">House Luxury <i>Toronto CA</i></span>
                                                    <ul class="listing-hidden-content">
                                                        <li>Area <span>720 sq ft</span></li>
                                                        <li>Rooms <span>6</span></li>
                                                        <li>Beds <span>2</span></li>
                                                        <li>Baths <span>3</span></li>
                                                    </ul>
                                                </div>
                                                <img src="images/feature-properties/fp-6.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-boxed mt-5">
                            <div class="widget-boxed-header">
                                <h4>Recent Properties</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="recent-post">
                                    <div class="recent-main">
                                        <div class="recent-img">
                                            <a href="blog-details.html"><img src="images/feature-properties/fp-1.jpg" alt=""></a>
                                        </div>
                                        <div class="info-img">
                                            <a href="blog-details.html"><h6>Family Modern Home</h6></a>
                                            <p>$230,000</p>
                                        </div>
                                    </div>
                                    <div class="recent-main my-4">
                                        <div class="recent-img">
                                            <a href="blog-details.html"><img src="images/feature-properties/fp-2.jpg" alt=""></a>
                                        </div>
                                        <div class="info-img">
                                            <a href="blog-details.html"><h6>Luxury Villa House</h6></a>
                                            <p>$120,000</p>
                                        </div>
                                    </div>
                                    <div class="recent-main">
                                        <div class="recent-img">
                                            <a href="blog-details.html"><img src="images/feature-properties/fp-3.jpg" alt=""></a>
                                        </div>
                                        <div class="info-img">
                                            <a href="blog-details.html"><h6>Luxury Family Home</h6></a>
                                            <p>$150,000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-boxed popular mt-5 mb-0">
                            <div class="widget-boxed-header">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="recent-post">
                                    <div class="tags">
                                        <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                        <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                                    </div>
                                    <div class="tags">
                                        <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                        <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                                    </div>
                                    <div class="tags">
                                        <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                        <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                                    </div>
                                    <div class="tags">
                                        <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                        <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                                    </div>
                                    <div class="tags no-mb">
                                        <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                        <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                                    </div>
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
</script>
@endpush