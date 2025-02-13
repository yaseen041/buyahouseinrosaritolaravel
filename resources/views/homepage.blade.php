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

    .gradient-header-blue { background: linear-gradient(135deg, #121d36 0%, #1a2a4d 100%); }
    .gradient-header-dark-blue {background: linear-gradient(135deg, #4c6fbd 0%, #344fa1 100%); }
    .gradient-header-navy { background: linear-gradient(135deg, #4c6fbd 0%, #344fa1 100%); }
    .gradient-header-navy-blue { background: linear-gradient(135deg, #4c6fbd 0%, #344fa1 100%); }

    .input-group-text {
        border-radius: 8px;
        border: 1px solid #dee2e6;
        background: #f8f9fa;
    }

    .calc-table-container {
        background: #f8f9fa;
        border-radius: 1rem;
        transition: transform 0.3s ease;
    }
    .price-tier-calculators table:not(:last-child) {
        margin-bottom: 0.5rem;
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
                            <div class="banner_swiper " data-aos="fade-right">
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
                    <div class="col-xl-8 col-lg-8 col-md-7 align-self-center pr-auto pr-md-0">
                        <div class="main_imgblock d-block">
                            <div class="banner_swiper " data-aos="fade-left">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 who-1 order-2 order-lg-1">
                    <div>
                        <h2 class="text-left mb-4">Why Are More and More Americans Moving to Rosarito? The Answer May Surprise You!</h2>
                    </div>
                    <div class="pftext">
                        <div class="heading-section">
                            <div class="text wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <p class=""><a target="_blank" href="https://www.sandiegored.com/en/news/229355/Playas-de-Rosarito-becomes-paradise-for-retired-Americans/?utm_source=chatgpt.com">Rosarito, officially known as Playas de Rosarito</a> is quickly becoming one of the most sought-after destinations for Americans looking to escape the high cost of living and <a target="_blank" href="https://www.latimes.com/environment/story/2025-01-16/climate-change-california-fires">extreme climate in many U.S. cities.</a></p><p class="pt-3"><a target="_blank" href="https://www.realtor.com/international/mx/rosarito-baja-california-sur/"> Known for its stunning beachfront properties</a>, year-round mild climate, and affordability, Rosarito offers an unmatched lifestyle at a fraction of the price compared to U.S. cities like Los Angeles or Honolulu.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 order-1 order-lg-2">
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
                <div class="col-12 order-3">
                    <h5 class="pt-3">
                        With Average Cost Per Square Foot of only $110, Can You Afford To Not Live Here?
                    </h5>
                    <p class="pt-3">
                        Imagine owning a luxury home with ocean views for as little as $300 per square foot, or a spacious inland property for just $110 per square foot. With <strong>average high temperatures ranging from 65°F (18°C) in January to 75°F (24°C) in August</strong>, <a target="_blank" href="https://en.wikipedia.org/wiki/Rosarito?utm_source=chatgpt.com">Playas de Rosarito</a> boasts one of the most comfortable climates in the region, perfect for those seeking to avoid extreme weather.
                    </p>
                    <p class="pt-3">In addition to its affordability and climate, Rosarito is just a short drive from the <a target="_blank" href="https://bwt.cbp.gov/details/09250401/POV">U.S. San Ysidro border</a>, 40 minutes from the <a target="_blank" href="https://bwt.cbp.gov/details/09250601/POV">Otay border</a> and <a target="_blank" href="https://maps.app.goo.gl/e9BMg6V7WAtSj3LN6">only 1 hour from the Tecate border</a>, making it an ideal location for expats and retirees who want easy access to California while enjoying the relaxed pace and <a target="_blank" href="https://finance.yahoo.com/news/much-average-retiree-mexico-savings-130010760.html">cost savings of life in Mexico.</a>
                    </p>
                    <p class="pt-3">Whether you’re searching for a quiet retirement home or an affordable second home on the beachfront to escape, Playas de Rosarito offers endless possibilities. With our tools to estimate home size based on budget, you can easily find the property that fits your lifestyle and financial goals. Take the first step toward your dream home and <a target="_blank" href="https://buyahouseinrosarito.com/contact">Contact Aaron (English) &amp; Adriana (Spanish) By Clicking Here Now</a>, for more information.</p><p class="pt-3">Please Use this Rosarito App To Estimate <strong>Beachfront, Oceanview</strong>, or <strong>Non-Ocean View</strong> Cost of Ownership
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="calc-table-container ui-element shadow-lg">
                        <div class="table-container">
                            <table class="table m-0 custom-table">
                                <thead class="gradient-header-blue">
                                    <tr>
                                        <th colspan="2" class="text-center align-middle py-3">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <h3 class="m-0 fs-6 fw-normal text-light">Estimate Your New Home Size<br><small>(Convert Mexico's M² to Square Feet)</small></h3>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle py-2">
                                            <span class="text-light opacity-75">Input (M²)</span>
                                        </th>
                                        <th class="text-center align-middle py-2">
                                            <span class="text-light opacity-75">Square Feet (Ft²)</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bg-light py-3" style="border-bottom:0">
                                            <div class="input-group mx-auto">
                                                <input type="number" class="form-control input-custom input_custom input-full" placeholder="Enter M²">
                                            </div>
                                        </td>
                                        <td class="bg-light py-3 text-center align-middle" style="border-bottom:0">
                                            <div class="result-box mx-auto result_in_squere_feet">-</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="price-tier-calculators">
                                <table class="table m-0 custom-table">
                                    <thead class="gradient-header-dark-blue">
                                        <tr>
                                            <th colspan="3" class="text-center align-middle py-3">
                                                <span class="text-light">Budget ($)</span>
                                            </th>
                                            <th>
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control input-custom input_amount input-full"  placeholder="Enter Budget">
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table m-0 custom-table">
                                    <thead class="gradient-header-dark-blue">
                                        <tr>
                                            <th class="text-center align-middle py-2">
                                                <span class="text-light opacity-75">Size (Ft²)</span>
                                            </th>
                                            <th class="text-center align-middle py-2">
                                                <span class="text-light opacity-75">Size (M²)</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-center align-middle py-3">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal text-light">Standard Home Calculator <small>$110 Per Square Foot</small></h4>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="bg-light py-3 text-center align-middle">
                                                <div class="result-box mx-auto standerd_home_result_InFeet">-</div>
                                            </td>
                                            <td class="bg-light py-3 text-center align-middle">
                                                <div class="result-box mx-auto standerd_home_result_InMeter">-</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table m-0 custom-table">
                                    <thead class="gradient-header-navy">
                                        <tr>
                                            <th colspan="3" class="text-center align-middle py-3">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal text-light">Ocean View Home Calculator <small>$300 Per Square Foot</small></h4>
                                                </div>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tr>
                                        <td class="bg-light py-3 text-center align-middle">
                                            <div class="result-box mx-auto oceanView_home_result_InFeet">-</div>
                                        </td>
                                        <td class="bg-light py-3 text-center align-middle">
                                            <div class="result-box mx-auto noOceanView_home_result_InMeter">-</div>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table m-0 custom-table">
                                    <thead class="gradient-header-navy-blue">
                                        <tr>
                                            <th colspan="3" class="text-center align-middle py-3">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal text-light">Beach Front Home Calculator <small>$500 Per Square Foot</small></h4>
                                                </div>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tr>
                                        <td class="bg-light py-3 text-center align-middle">
                                            <div class="result-box mx-auto beach_home_result_InFeet">-</div>
                                        </td>
                                        <td class="bg-light py-3 text-center align-middle">
                                            <div class="result-box mx-auto beach_home_result_InMete">-</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <div class="">
                        <table class="table text-center ">
                            <thead class="table-header" style="background-color:rgb(18, 29, 54)">
                                <tr>
                                    <th class="text-center">
                                        <p style="color:#FFF" class="m-0 fw-bold">Month</p>
                                    </th>
                                    <th class="text-center">
                                        <p style="color:#FFF" class="m-0 fw-bold">High Temperature</p>
                                    </th>
                                    <th class="text-center">
                                        <p style="color:#FFF" class="m-0 fw-bold">Low Temperature</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">January</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">65°F / 18°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">48°F / 9°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">February</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">65°F / 18°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">49°F / 9°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">March</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">66°F / 19°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">50°F / 10°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">April</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">68°F / 20°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">53°F / 12°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">May</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">70°F / 21°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">57°F / 14°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">June</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">73°F / 23°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">60°F / 16°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">July</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">75°F / 24°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">63°F / 17°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">August</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">75°F / 24°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">64°F / 18°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">September</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">74°F / 23°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">62°F / 17°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">October</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">72°F / 22°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">58°F / 14°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:#f9f9f9">
                                    <td class="text-center">
                                        <p class="m-0">November</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">68°F / 20°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">52°F / 11°C</p>
                                    </td>
                                </tr>
                                <tr style="background-color:transparent">
                                    <td class="text-center">
                                        <p class="m-0">December</p>
                                    </td>
                                    <td class="text-center high-temp" style="background-color:#ffcdd2;color:#b71c1c">
                                        <p class="m-0 fw-bold">65°F / 18°C</p>
                                    </td>
                                    <td class="text-center low-temp" style="background-color:#bbdefb;color:#0d47a1">
                                        <p class="m-0 fw-bold">48°F / 9°C</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-5" style="padding-top:10px">
                    <div class=" mt-4">
                        <h3 class="text-center fw-bold" style="color:#D51E4C">Rosarito Price Per Square Foot &amp; Temperature
                        Comparison Chart</h3>
                        <div style="overflow:auto">
                            <table class="table  text-center " style="border-color:#FFF;padding-top:40px">
                                <thead class="" style="background-color:#121D36">
                                    <tr>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">State</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">City</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">Avg. Price/Sq. Ft.</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">Peak Summer High Temp (°F/°C)</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">Peak Winter Low Temp (°F/°C)</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">Avg. Winter High Temp (°F/°C)</p>
                                        </th>
                                        <th style="border-color:#FFF">
                                            <p style="font-weight:bold;color:#FFF"
                                            class="m-0 text-center align-middle">Rosarito Comparison</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Hawaii</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Honolulu</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$765</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">88°F / 31°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">65°F / 18°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">80°F / 27°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Summers</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$500</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">High-end
                                            beachfront for 35% less than avg. Honolulu price, with milder temperatures.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">California</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Los Angeles
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$715</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">85°F / 29°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">58°F / 9°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">70°F / 21°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Summers</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$500</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">High-end
                                            beachfront for 30% less than avg. Los Angeles price, with milder summers.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Washington</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Seattle</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$520</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">79°F / 26°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">37°F / 3°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">47°F / 8°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$300</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Ocean view for
                                            40% less than avg. Seattle price, with better winters.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Colorado</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Denver</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$409</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">90°F / 32°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">19°F / -7°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">45°F / 7°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$300</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Ocean view for
                                            25% less than avg. Denver price, with much better temperatures.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Oregon</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Portland</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$381</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">80°F / 27°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">37°F / 3°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">47°F / 8°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$300</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Ocean view for
                                            17% less than avg. Portland price, with better temperatures.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Utah</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Salt Lake City
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$289</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">95°F / 35°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">25°F / -4°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">40°F / 4°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Approximate
                                            Same Cost, Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$300</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Same cost per
                                            square foot, but with ociean view, and much better temperatures.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Arizona</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Phoenix</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$281</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">106°F / 41°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">46°F / 8°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">67°F / 19°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$110</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">No ocean view
                                            at this price, but far cooler temperatures compared to Phoenix.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Nevada</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Las Vegas</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$219</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">105°F / 40°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">39°F / 4°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">58°F / 14°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Cooler
                                            Summers, Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$110</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">No ocean view
                                            at this price, but far cooler temperatures compared to Phoenix.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Idaho</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Boise</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$223</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">100°F / 38°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">25°F / -4°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">40°F / 4°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$110</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">No ocean view
                                            at this price, but far milder temperatures compared to Phoenix.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">New Mexico</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Albuquerque
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$161</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">95°F / 35°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">25°F / -4°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Milder Winters</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#bdd7f0">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$110</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">No ocean view
                                            for this price, but far milder temperatures compared to Albuquerque.</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Texas</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Houston</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$158</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">95°F / 35°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">45°F / 7°C</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">65°F / 18°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Much Cheaper,
                                            Cooler Summers</p>
                                        </td>
                                    </tr>
                                    <tr style="background-color:#f1b92c">
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Baja
                                            California Norte</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">Rosarito</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">$110</p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">77°F / 25°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">50°F / 10°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">72°F / 22°C
                                            </p>
                                        </td>
                                        <td style="border-color:#FFF" class="align-middle">
                                            <p style="color:#000" class="m-0 text-center align-middle">No ocean view,
                                            but far cooler temperatures compared to Houston.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="video-section text-center ">
                        <img class="pt-3" src="{{asset('assets/images/video-section-image.jpg')}}" alt="A sunset over Rosarito  beach">
                        <p class="pt-3">
                            <a target="_blank" href="https://www.tripadvisor.com/LocationPhotoDirectLink-g150774-i462503810-Rosarito_Baja_California.html">Sunset Over Rosarito Beach</a>
                        </p>
                        <p class="pt-3">
                            <a target="_blank" href="https://buyahouseinrosarito.com/contact">Contact Aaron (English) &amp; Adriana (Spanish) By Clicking Here Now</a>, for more information.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
                <h2>Types</h2>
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
        var swiper = new Swiper('.banner_swiper', {
            allowTouchMove: false,
            navigation: false,
            pagination: false,
            autoplay: false
        });

        const video = document.getElementById('videoFrame');
        $("#playBtn").click(function () {
            $("#videoModal").modal("show");
        });
        $('#videoModal').on('shown.bs.modal', function () {
            video.play();
        });
        $('#videoModal').on('hidden.bs.modal', function () {
            video.pause();
            video.currentTime = 0;
        });
    });

    $(document).ready(function() {
        $(".input_custom").on("input", function() {
            let sqm = parseFloat($(this).val());
            if (!isNaN(sqm) && sqm >= 0) {
                let sqft = (sqm * 10.7639).toFixed(2);
                $(".result_in_squere_feet").text(sqft);
            } else {
                $(".result_in_squere_feet").text("-");
            }
        });
    });

    $(document).ready(function () {
        $(".input_amount").on("input", function () {
            let inputVal = $(this).val();

        // Allow only numbers and limit input length (Max 10 digits)
            inputVal = inputVal.replace(/[^0-9]/g, "").slice(0, 10);
            $(this).val(inputVal);

            let budget = parseFloat(inputVal);
        let minBudget = 1000;  // Minimum allowed budget
        let maxBudget = 10000000; // Maximum allowed budget

        if (!isNaN(budget) && budget >= minBudget && budget <= maxBudget) {
            let standardRate = 110;
            let oceanViewRate = 300;
            let beachFrontRate = 500;

            // Convert budget to square feet
            let standardFeet = (budget / standardRate).toFixed(2);
            let oceanViewFeet = (budget / oceanViewRate).toFixed(2);
            let beachFrontFeet = (budget / beachFrontRate).toFixed(2);

            // Convert square feet to square meters (1 ft² = 0.092903 m²)
            let standardMeter = (standardFeet * 0.092903).toFixed(2);
            let oceanViewMeter = (oceanViewFeet * 0.092903).toFixed(2);
            let beachFrontMeter = (beachFrontFeet * 0.092903).toFixed(2);

            // Update results
            $(".standerd_home_result_InFeet").text(standardFeet);
            $(".standerd_home_result_InMeter").text(standardMeter);
            $(".oceanView_home_result_InFeet").text(oceanViewFeet);
            $(".noOceanView_home_result_InMeter").text(oceanViewMeter);
            $(".beach_home_result_InFeet").text(beachFrontFeet);
            $(".beach_home_result_InMete").text(beachFrontMeter);
        } else {
            // Reset results if input is invalid
            $(".standerd_home_result_InFeet, .standerd_home_result_InMeter, .oceanView_home_result_InFeet, .noOceanView_home_result_InMeter, .beach_home_result_InFeet, .beach_home_result_InMete").text("-");
        }
    });
    });



</script>

@endpush