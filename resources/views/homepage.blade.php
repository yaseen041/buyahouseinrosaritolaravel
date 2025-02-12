@extends('app')
@section('content')
@push('styles')
<style>
    .wprt-image-video{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #playBtn {
        background: #0f1341 none repeat scroll 0 0;
        border-radius: 100%;
        color: #03a9f5;
        font-size: 30px;
        height: 70px;
        left: 50%;
        line-height: 70px;
        position: absolute;
        text-align: center;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 70px;
        z-index: 9;
    }
    .modal-dialog.modal-dialog-centered {
        max-width: 56%;
    }
    .modal-content {
        position: relative;
    }
    .close-btn {
        position: absolute;
        top: -33px;
        right: 0px;
        font-size: 29px;
        color: #fff;
        cursor: pointer;
        z-index: 10;
    }
    @media screen and (max-width: 712px){
        .modal-dialog.modal-dialog-centered {
            max-width: 95%;
        }

    }
    @media screen and (max-width: 992px){
        #playBtn,
        .iq-waves {
            top: 55% !important;
        }
    }

    @media screen and (max-width: 668px){
        #playBtn,
        .iq-waves {
            top: 63% !important;
        }
    }

    @media screen and (max-width: 480px){
        #playBtn,
        .iq-waves {
            top: 70% !important;
        }
    }
</style>
@endpush
<div class="clearfix"></div>

{{-- Banner --}}
<div class="int_content_wraapper int_content_left">
    <div class="int_banner_slider">
        <div class="banner_box_wrapper">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 align-self-center">
                        <div class="main_contentblock">
                            <div class="swiper-container" data-aos="fade-right">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="swiper_imgbox imgbox1">
                                            <div class="swipper_img">
                                                <h2>Rosarito isn't just a beach, it's a community. . .</h2>
                                                {{-- <h1></h1> --}}
                                                <h3>and you're invited! -The Hansome Family</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-7 align-self-center pr-0">
                        <div class="main_imgblock">
                            <div class="swiper-container" data-aos="fade-left">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="swiper_contbox">
                                            <div class="swipper_conntent">
                                                <img src="{{ asset('assets/images/banner.jpg') }}" class="img-fluid " alt="images" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               {{--  <div class="banner_navi">
                    <div class="swiper-button-next">Next</div>
                    <div class="swiper-button-prev">Prev</div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- About --}}
<div class="about">
    <section class="about-us fh">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1">
                    <div>
                        <h2 class="text-left mb-4">About <span>Find Houses</span></h2>
                    </div>
                    <div class="pftext">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>
                    </div>
                    <div class="box bg-2">
                        <a href="about.html" class="text-center button button--moema button--text-thick button--text-upper button--size-s">read More</a>
                        <img src="images/signature.png" class="ml-5" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="wprt-image-video w50 w-100 h-100 ">
                        <img src="{{asset('assets/images/video-2.jpg')}}" style="width: 100%;" alt="image">
                        <a class="icon-wrap popup-video " id="playBtn" href="javascript:void(0)">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Corrected HTML (notice id moved to video element) -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <span class="close-btn" data-dismiss="modal">&times;</span>
            <div class="modal-body p-0">
                <video controls style="width: 100%;" id="videoFrame">
                    <source src="{{ asset('assets/images/video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>

{{-- Properties For Sale --}}
<section class="recently portfolio featured bg-white-1 rec-pro">
    <div class="container-fluid">
        <div class="row">
            <div class="section-title col-md-5 pl-44">
                <h3>Properties</h3>
                <h2>For Sale</h2>
            </div>
        </div>
        <div class="portfolio col-xl-12 p-0">
            <div class="slick-lancers">
                <div class="agents-grid">
                    <div class="landscapes listing-item compact thehp-1" data-aos="fade-up" data-aos-delay="150">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-fluid img-center" style="background-image: url('{{ asset('user_assets/images/feature-properties/fp-8.jpg') }}');"></div>                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="250">
                    <div class="people listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/feature-properties/fp-9.jpg') }}');"></div>                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Family Apartment</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="350">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/feature-properties/fp-10.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Villa House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="450">
                    <div class="landscapes listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/interior/p-1.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury Condo</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="550">
                    <div class="people listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/interior/p-2.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-1.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-1">
                        <a href="sisingle-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{asset('user_assets/images/single-property/s-1.jpg')}}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-2.jpg')}}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-1">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-3.jpg')}}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="services-home rec-pro">
    <div class="container-fluid">
        <div class="section-title">
            <h3>Property</h3>
            <h2>Services</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 m-top-0 m-bottom-40" data-aos="fade-up" data-aos-delay="150">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fa fa-home bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Houses</h4>
                        <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 m-top-40 m-bottom-40" data-aos="fade-up" data-aos-delay="250">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fas fa-building bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Apartments</h4>
                        <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 m-top-40 m-bottom-40 commercial" data-aos="fade-up" data-aos-delay="350">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fas fa-warehouse bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Commercial</h4>
                        <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 m-top-40 m-bottom-40 commercial" data-aos="fade-up" data-aos-delay="450">
                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i class="fas fa-hotel bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Hotels</h4>
                        <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                        <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Properties For Rent --}}
<section class="recently portfolio bg-white-1 rec-pro">
    <div class="container-fluid">
        <div class="row">
            <div class="section-title col-md-5 pl-44">
                <h3>Properties</h3>
                <h2>For Rent</h2>
            </div>
        </div>
        <div class="portfolio col-xl-12 p-0">
            <div class="slick-lancers">
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="landscapes listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/interior/p-3.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="250">
                    <div class="people listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/interior/p-4.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Family Apartment</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="350">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/interior/p-5.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Villa House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="450">
                    <div class="landscapes listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/feature-properties/fp-11.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury Condo</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="550">
                    <div class="people listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/feature-properties/fp-12.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{asset('user_assets/images/single-property/s-6.jpg')}}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                        <a href="sisingle-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-2.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-3.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
                <div class="agents-grid" data-aos="fade-up">
                    <div class="people landscapes no-pb pbp-3 listing-item compact thehp-2">
                        <a href="single-property-1.html" class="recent-16">
                            <div class="recent-img16 img-center" style="background-image: url('{{ asset('user_assets/images/single-property/s-6.jpg') }}');"></div>
                            <div class="recent-content"></div>
                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>
                            <div class="recent-details">
                                <div class="recent-title">Luxury House</div>
                                <div class="recent-price mb-3">$230,000</div>
                                <div class="house-details thehp-1"><i class="fa fa-bed mr-1" aria-hidden="true"></i> 6 Bed <span>|</span><i class="fa fa-bath mr-1" aria-hidden="true"></i> 3 Bath <span>|</span><i class="fa fa-object-group mr-1" aria-hidden="true"></i> 720 sq ft</div>
                            </div>
                            <div class="view-proper">View Details</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Agents --}}
<section class="team bg-white rec-pro bg-white">
    <div class="container-fluid">
        <div class="section-title col-md-5">
            <h3>Meet Our</h3>
            <h2>Agents</h2>
        </div>
        <div class="row team-all">
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro" data-aos="fade-up" data-aos-delay="150">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/t-5.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Carls Jhons</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro" data-aos="fade-up" data-aos-delay="250">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/t-6.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Arling Tracy</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro pb-none" data-aos="fade-up" data-aos-delay="350">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/t-7.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Mark Web</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro no-mb sin" data-aos="fade-up" data-aos-delay="450">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/t-8.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Katy Grace</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro no-mb sin" data-aos="fade-up" data-aos-delay="550">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/team-image-2.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Katy Grace</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2 team-pro no-mb" data-aos="fade-up" data-aos-delay="650">
                <div class="team-wrap">
                    <div class="team-img">
                        <img src="{{ asset('user_assets/images/team/team-image-7.jpg') }}" alt="" />
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Katy Grace</h3>
                            <p>Real Estate Agent</p>
                            <div class="team-socials">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <span><a href="agent-details.html">View Profile</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Pricing --}}
<section class="pricing-table rec-pro bg-white-1">
    <div class="container-fluid">
        <div class="section-title">
            <h3>Pricing</h3>
            <h2>Packages</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12" data-aos="zoom-in" data-aos-delay="150">
                <div class="plan text-center">
                    <span class="plan-name">Basic <small>Monthly plan</small></span>
                    <p class="plan-price"><sup class="currency">$</sup><strong>49</strong><sub>.99</sub></p>
                    <ul class="list-unstyled">
                        <li>100GB Monthly Bandwidth</li>
                        <li>$100 Google AdWords</li>
                        <li>100 Domain Hosting</li>
                        <li>SSL Shopping Cart</li>
                        <li>24/7 Live Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" data-aos="zoom-in" data-aos-delay="250">
                <div class="plan text-center">
                    <span class="plan-name">Standard <small>Monthly plan</small></span>
                    <p class="plan-price"><sup class="currency">$</sup><strong>99</strong><sub>.99</sub></p>
                    <ul class="list-unstyled">
                        <li>100GB Monthly Bandwidth</li>
                        <li>$100 Google AdWords</li>
                        <li>100 Domain Hosting</li>
                        <li>SSL Shopping Cart</li>
                        <li>24/7 Live Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" data-aos="zoom-in" data-aos-delay="350">
                <div class="plan text-center featured no-mgb yes-mgb">
                    <span class="plan-name">Professional <small>Monthly plan</small></span>
                    <p class="plan-price"><sup class="currency">$</sup><strong>149</strong><sub>.99</sub></p>
                    <ul class="list-unstyled">
                        <li>100GB Monthly Bandwidth</li>
                        <li>$100 Google AdWords</li>
                        <li>100 Domain Hosting</li>
                        <li>SSL Shopping Cart</li>
                        <li>24/7 Live Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Sign Up</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" data-aos="zoom-in" data-aos-delay="450">
                <div class="plan text-center no-mgb">
                    <span class="plan-name">Premium <small>Monthly plan</small></span>
                    <p class="plan-price"><sup class="currency">$</sup><strong>399</strong><sub>.99</sub></p>
                    <ul class="list-unstyled">
                        <li>100GB Monthly Bandwidth</li>
                        <li>$100 Google AdWords</li>
                        <li>100 Domain Hosting</li>
                        <li>SSL Shopping Cart</li>
                        <li>24/7 Live Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#.">Sign Up</a>
                </div>
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
                <div class="col-xl-6 col-md-12 col-xs-12" data-aos="fade-right">
                    <div class="news-item news-item-sm">
                        <a href="blog-details.html" class="news-img-link">
                            <div class="news-item-img">
                                <img class="resp-img" src="{{ asset('user_assets/images/blog/b-1.jpg') }}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                            <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                            <div class="news-item-descr">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="blog-details.html" class="news-link">Read more...</a>
                                <ul class="action-list">
                                    <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                    <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                    <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="news-item news-item-sm min-last">
                        <a href="blog-details.html" class="news-img-link">
                            <div class="news-item-img">
                                <img class="resp-img" src="{{ asset('user_assets/images/blog/b-2.jpg') }}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                            <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                            <div class="news-item-descr">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="blog-details.html" class="news-link">Read more...</a>
                                <ul class="action-list">
                                    <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                    <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                    <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 col-xs-12" data-aos="fade-left">
                    <div class="news-item news-item-sm">
                        <a href="blog-details.html" class="news-img-link">
                            <div class="news-item-img">
                                <img class="resp-img" src="{{ asset('user_assets/images/blog/b-3.jpg') }}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                            <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                            <div class="news-item-descr">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="blog-details.html" class="news-link">Read more...</a>
                                <ul class="action-list">
                                    <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                    <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                    <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="news-item news-item-sm last">
                        <a href="blog-details.html" class="news-img-link">
                            <div class="news-item-img">
                                <img class="resp-img" src="{{ asset('user_assets/images/blog/b-4.jpg') }}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="blog-details.html"><h3>The Real Estate News</h3></a>
                            <span class="date">Jun 23, 2020 &nbsp;/&nbsp; By Admin</span>
                            <div class="news-item-descr">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="blog-details.html" class="news-link">Read more...</a>
                                <ul class="action-list">
                                    <li class="action-item"><i class="fa fa-heart"></i> <span>306</span></li>
                                    <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                    <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="login-and-register-form modal">
    <div class="main-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg"><i class="fa fa-times"></i></div>
            <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
            <div class="soc-log fl-wrap">
                <p>Login</p>
                <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
            </div>
            <div class="log-separator fl-wrap"><span>Or</span></div>
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Login</a></li>
                    <li><a href="#tab-2">Register</a></li>
                </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-contents">
                        <div class="custom-form">
                            <form method="post" name="registerform">
                                <label>Username or Email Address * </label>
                                <input name="email" type="text" onClick="this.select()" value="">
                                <label>Password * </label>
                                <input name="password" type="password" onClick="this.select()" value="">
                                <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">Remember me</label>
                                </div>
                            </form>
                            <div class="lost_password">
                                <a href="#">Lost Your Password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div id="tab-2" class="tab-contents">
                            <div class="custom-form">
                                <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                    <label>First Name * </label>
                                    <input name="name" type="text" onClick="this.select()" value="">
                                    <label>Second Name *</label>
                                    <input name="name2" type="text" onClick="this.select()" value="">
                                    <label>Email Address *</label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <label>Password *</label>
                                    <input name="password" type="password" onClick="this.select()" value="">
                                    <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
    // Get the video element
    const video = document.getElementById('videoFrame');

    // When play button is clicked
    $("#playBtn").click(function () {
        $("#videoModal").modal("show");
    });

    // When modal is fully shown, play video
    $('#videoModal').on('shown.bs.modal', function () {
        video.play();
    });

    // When modal is closed, pause and reset video
    $('#videoModal').on('hidden.bs.modal', function () {
        video.pause();
        video.currentTime = 0;
    });
});
</script>

@endpush