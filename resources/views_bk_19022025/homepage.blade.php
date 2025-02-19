@extends('app')
@section('content')
@push('styles')

<title>{{ $page['meta_title'] }}</title>
<meta name="description" content="{{ $page['meta_description'] }}" />
<meta name="keywords" content="{{ $page['meta_keywords'] }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:title" content="{{ $page['fb_title'] }}" />
<meta property="og:description" content="{{ $page['fb_description'] }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:image" content="{{ $page['fb_image'] }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page['twitter_title'] }}" />
<meta name="twitter:description" content="{{ $page['twitter_description'] }}" />
<meta name="twitter:image" content="{{ $page['twitter_image'] }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $page['json_ld_code']; ?>
</script>

@endpush
<div class="clearfix"></div>

{{-- Banner --}}
<div class="homepage-9 hp-6 hd-white hmp7 mh">
    <div id="map-container" class="fullwidth-home-map dark-overlay">
        <div class="video-container">
            <video loop autoplay muted>
                <source src="{{ asset('user_assets/video/video-3.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </div>
</div>



<section class="family-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
               <div class="welcome-text text-center d-flex flex-column align-items-center">
                <h1 class="h1 text-danger">
                    Rosarito isn't just a beach, it's a community...
                </h1>
                <h2 class="text-dark">
                    and you're invited! -The Hansome Family
                </h2>
            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-md-12 text-center">
                <img src="{{ asset('assets/images/banner.jpg') }}" alt="Our Handsome Family" class="family-image">
            </div>
        </div>
    </div>
</section>

{{-- About --}}
<div class="about">
    <section class="about-us fh">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 who-1 text-center">
                    <div>
                        <h2 class="heading_american mb-4">Why Are More and More Americans Moving to Rosarito? The Answer May Surprise You!</h2>
                    </div>
                    <div class="wprt-image-video w50 w-100 h-100 position-relative ">
                        <img src="{{asset('assets/images/video-2.jpg')}}" class="" alt="image">
                        <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=Yf61HtiwTlo&t=47s">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="iq-waves">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                    <div class="pftext pt-5">
                        <div class="heading-section">
                            <div class="text wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <p class=""><a target="_blank" href="https://www.sandiegored.com/en/news/229355/Playas-de-Rosarito-becomes-paradise-for-retired-Americans/?utm_source=chatgpt.com">Rosarito, officially known as Playas de Rosarito</a> is quickly becoming one of the most sought-after destinations for Americans looking to escape the high cost of living and <a target="_blank" href="https://www.latimes.com/environment/story/2025-01-16/climate-change-california-fires">extreme climate in many U.S. cities.</a></p><p class="pt-3"><a target="_blank" href="https://www.realtor.com/international/mx/rosarito-baja-california-sur/"> Known for its stunning beachfront properties</a>, year-round mild climate, and affordability, Rosarito offers an unmatched lifestyle at a fraction of the price compared to U.S. cities like Los Angeles or Honolulu.</p>
                            </div>
                        </div>
                    </div>

                    <h5 class="pt-3">
                        With Average Cost Per Square Foot of only $110, Can You Afford To Not Live Here?
                    </h5>
                    <p class="pt-3">
                        Imagine owning a luxury home with ocean views for as little as $300 per square foot, or a spacious inland property for just $110 per square foot. With <strong>average high temperatures ranging from 65°F (18°C) in January to 75°F (24°C) in August</strong>, <a target="_blank" href="https://en.wikipedia.org/wiki/Rosarito?utm_source=chatgpt.com">Playas de Rosarito</a> boasts one of the most comfortable climates in the region, perfect for those seeking to avoid extreme weather.
                    </p>
                    <p class="pt-3">In addition to its affordability and climate, Rosarito is just a short drive from the <a target="_blank" href="https://bwt.cbp.gov/details/09250401/POV">U.S. San Ysidro border</a>, 40 minutes from the <a target="_blank" href="https://bwt.cbp.gov/details/09250601/POV">Otay border</a> and <a target="_blank" href="https://maps.app.goo.gl/e9BMg6V7WAtSj3LN6">only 1 hour from the Tecate border</a>, making it an ideal location for expats and retirees who want easy access to California while enjoying the relaxed pace and <a target="_blank" href="https://finance.yahoo.com/news/much-average-retiree-mexico-savings-130010760.html">cost savings of life in Mexico.</a>
                    </p>
                    <p class="pt-3">Whether you’re searching for a quiet retirement home or an affordable second home on the beachfront to escape, Playas de Rosarito offers endless possibilities. With our tools to estimate home size based on budget, you can easily find the property that fits your lifestyle and financial goals. Take the first step toward your dream home and <a target="_blank" href="https://buyahouseinrosarito.com/contact">Contact Aaron (English) &amp; Adriana (Spanish) By Clicking Here Now</a>, for more information.</p><p class="py-3">Please Use this Rosarito App To Estimate <strong>Beachfront, Oceanview</strong>, or <strong>Non-Ocean View</strong> Cost of Ownership
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="calc-table-container ui-element" >
                        <div class="table-container">
                            <div class="sq-tier-calculators mb-2">
                                <table class="table m-0 custom-table ">
                                    <thead >
                                        <tr>
                                            <th colspan="2" class="text-center align-middle py-2 " style="border-bottom:0">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h3 class="m-0 fs-6 fw-normal ">Estimate Your New Home Size<br><small>(Convert Mexico's M² to Square Feet)</small></h3>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center align-middle w-50 p-1" style="border-bottom:0">
                                                <span class=" opacity-75">Input (M²)</span>
                                            </th>
                                            <th class="text-center align-middle py-1" style="border-left: 0px; border-bottom:0">
                                                <span class=" opacity-75">Square Feet (Ft²)</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="bg-light py-2" >
                                                <div class="input-group mx-auto">
                                                    <input type="text" class="form-control input-custom input_custom input-full" placeholder="Enter M²">
                                                </div>
                                            </td>
                                            <td class="bg-light py-2 text-center align-middle" style="border-left:0;" >
                                                <div class="result-box mx-auto result_in_squere_feet">-</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="price-tier-calculators">
                                <table class="table m-0 custom-table ">
                                    <thead >
                                        <tr>
                                            <th colspan="2" class="text-center align-middle py-2 " style="border-bottom:0">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h3 class="m-0 fs-6 fw-normal ">Estimate Your New Home Size According To Your Budget<br><small>(Sizes according view M² & Square Feet)</small></h3>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle w-50" style="border-bottom:0">
                                                <span class="">Budget ($)</span>
                                            </td>
                                            <td style="border-left:0; border-bottom:0">
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control input-custom input_amount input-full"  placeholder="Enter Budget">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="text-center align-middle py-2" style="border-bottom:0">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal ">Standard Home Calculator <small>$110 Per Square Foot</small></h4>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="gradient-header-blue" >
                                            <td class="text-center align-middle py-2 border_right w-50" style="border-bottom:0">
                                                <span class="font-weight-bold">Output (Size Ft²)</span>
                                            </td>
                                            <td class="text-center align-middle py-2" style="border-left:0; border-bottom:0">
                                                <span class="font-weight-bold">Output (Size M²)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-center align-middle border_right_dark" style="border-bottom:0px">
                                                <div class="result-box mx-auto standerd_home_result_InFeet" style="border-left:0px">-</div>
                                            </td>
                                            <td class="py-2 text-center align-middle" style="border-left: 0px; border-bottom:0" >
                                                <div class="result-box mx-auto standerd_home_result_InMeter">-</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center align-middle py-2" style="border-bottom:0">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal ">Ocean View Home Calculator <small>$300 Per Square Foot</small></h4>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="gradient-header-blue" >
                                            <td class="text-center align-middle py-2 border_right w-50" style="border-bottom:0">
                                                <span class="font-weight-bold">Output (Size Ft²)</span>
                                            </td>
                                            <td class="text-center align-middle py-2" style="border-left:0; border-bottom:0">
                                                <span class="font-weight-bold">Output (Size M²)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-center align-middle border_right_dark" style="border-bottom:0" >
                                                <div class="result-box mx-auto oceanView_home_result_InFeet">-</div>
                                            </td>
                                            <td class="py-2 text-center align-middle" style="border-bottom: 0px; border-left:0">
                                                <div class="result-box mx-auto noOceanView_home_result_InMeter" >-</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center align-middle py-2" style="border-bottom:0">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <h4 class="m-0 fs-6 fw-normal ">Beach Front Home Calculator <small>$500 Per Square Foot</small></h4>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="gradient-header-blue" >
                                            <td class="text-center align-middle py-2 border_right w-50" style="border-bottom:0">
                                                <span class="font-weight-bold">Output (Size Ft²)</span>
                                            </td>
                                            <td class="text-center align-middle py-2" style="border-left:0; border-bottom:0">
                                                <span class="font-weight-bold">Output (Size M²)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 text-center align-middle border_right_dark">
                                                <div class="result-box mx-auto beach_home_result_InFeet">-</div>
                                            </td>
                                            <td class="py-2 text-center align-middle w-50" style="border-left:0px">
                                                <div class="result-box mx-auto beach_home_result_InMete">-</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <div class="temp_table">
                        <table class="table text-center neon-border">
                            <thead class="table-header" >
                                <tr>
                                    <th class="text-center">
                                        <strong class="m-0 fw-bold">Month</strong>
                                    </th>
                                    <th class="text-center">
                                        <strong class="m-0 fw-bold">High Temperature</strong>
                                    </th>
                                    <th class="text-center">
                                        <strong class="m-0 fw-bold">Low Temperature</strong>
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
                    <div class="">
                        <h3 class="text-center fw-bold" style="color:#D51E4C">Rosarito Price Per Square Foot &amp; Temperature
                        Comparison Chart</h3>
                        <div style="overflow:auto">
                            <table class="table  text-center neon-border" style="border-color:#FFF;margin-top:40px">
                                <thead class="neon-border" >
                                    <tr>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">State</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">City</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">Avg. Price/Sq. Ft.</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">Peak Summer High Temp (°F/°C)</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">Peak Winter Low Temp (°F/°C)</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
                                            class="m-0 text-center align-middle">Avg. Winter High Temp (°F/°C)</p>
                                        </th>
                                        <th>
                                            <p style="font-weight:bold;"
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
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="video-section text-center ">
                        <img class="pt-3 w-100" src="{{asset('assets/images/video-section-image.jpg')}}" alt="A sunset over Rosarito  beach">
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



{{-- Properties Types --}}
@if($types->isNotEmpty())
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
                        <a href="{{ url('property/type/') }}/{{  $type->slug }}" class="recent-16">
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
@endif

{{-- Properties Best Deals --}}
@if($properties->isNotEmpty())
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
@endif

{{-- Agents --}}
@if($cities->isNotEmpty())
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
                        <a href="{{ route('HandlerProperties', ['slug' => $city->slug]) }}" class="recent-16">
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
@endif

{{-- Blogs --}}
@if($latestBlogs->isNotEmpty())
<section class="blog-section bg-white-1 rec-pro">
    <div class="container-fluid">
        <div class="section-title">
            <h3>Latest</h3>
            <h2>Posts</h2>
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach ($latestBlogs as $blog)
                <div class="col-xl-6 col-md-12 col-xs-12 mb-4" data-aos="fade-right">
                    <div class="news-item news-item-sm">
                        <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" class="news-img-link">
                            <div class="news-item-img">
                                <img class="resp-img" src="{{$blog->featured_image}}" alt="{{ $blog->title }}">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}"><h3>{{ $blog->title }}</h3></a>
                            <div class="news-item-descr">
                                <p>{{ limit_words($blog->short_description, 30) }}</p>
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
@endif

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <span class="close-btn" data-dismiss="modal">&times;</span>
            <div class="modal-body p-0">
                <video controls style="width: 100%;" id="videoFrame">
                    <source src="{{ asset('user_assets/video/video-3.mp4') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
{{-- <script src="{{asset('user_assets/js/range.js')}}"></script> --}}
<script>
    $(".dropdown-filter").on('click', function() {
        $(".explore__form-checkbox-list").toggleClass("filter-block");
    });


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
            let inputVal1 = $(this).val();
            inputVal1 = inputVal1.replace(/[^0-9]/g, "").slice(0, 20);
            $(this).val(inputVal1);
            let sqm = parseFloat(inputVal1);
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
            inputVal = inputVal.replace(/[^0-9]/g, "").slice(0, 20);
            $(this).val(inputVal);
            let budget = parseFloat(inputVal);
            if (!isNaN(budget)) {
                let standardRate = 110;
                let oceanViewRate = 300;
                let beachFrontRate = 500;
                let standardFeet = (budget / standardRate).toFixed(2);
                let oceanViewFeet = (budget / oceanViewRate).toFixed(2);
                let beachFrontFeet = (budget / beachFrontRate).toFixed(2);
                let standardMeter = (standardFeet * 0.092903).toFixed(2);
                let oceanViewMeter = (oceanViewFeet * 0.092903).toFixed(2);
                let beachFrontMeter = (beachFrontFeet * 0.092903).toFixed(2);
                $(".standerd_home_result_InFeet").text(standardFeet);
                $(".standerd_home_result_InMeter").text(standardMeter);
                $(".oceanView_home_result_InFeet").text(oceanViewFeet);
                $(".noOceanView_home_result_InMeter").text(oceanViewMeter);
                $(".beach_home_result_InFeet").text(beachFrontFeet);
                $(".beach_home_result_InMete").text(beachFrontMeter);
            } else {
                $(".standerd_home_result_InFeet, .standerd_home_result_InMeter, .oceanView_home_result_InFeet, .noOceanView_home_result_InMeter, .beach_home_result_InFeet, .beach_home_result_InMete").text("-");
            }
        });
    });
</script>
@endpush