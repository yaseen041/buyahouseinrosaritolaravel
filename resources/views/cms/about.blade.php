@extends('app')
<?php
$seo_data = get_single_row('seos', 'page_name', 'about');
?>
@push('styles')
<title>{{ $seo_data->meta_title }}</title>
<meta name="description" content="{{ $seo_data->meta_description }}" />
<meta name="keywords" content="{{ $seo_data->meta_keywords }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:title" content="{{ $seo_data->fb_title }}" />
<meta property="og:description" content="{{ $seo_data->fb_description }}" />
<meta property="og:url" content="{{ url('/'); }}" />
<meta property="og:image" content="{{ asset('/assets/images/' . $seo_data->fb_image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo_data->twitter_title }}" />
<meta name="twitter:description" content="{{ $seo_data->twitter_description }}" />
<meta name="twitter:image" content="{{ asset('/assets/images/' . $seo_data->twitter_image) }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $seo_data->json_ld_code; ?>
</script>
@endpush
@section('content')
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>About</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; About</h2>
        </div>
    </div>
</section>

<section class="about-us xl_custom_color fh">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <div class="content text-center">
                    <h2>Welcome to "Buy a House in Rosarito” Where Your Baja Dreams Meet Feet on the Ground to Help with Practical Living!</h2>
                    <div class="text mt-2 xlcolorbloack">👨‍👩‍👦 Our Family’s Story</div>
                </div>
                <div class="text-center">
                    <img class="mt-4" alt="about-image" src="{{ asset('user_assets/images/about/about1.png') }}">
                </div>
                <p class="wow fadeInUp mt-4">We’re the Hansome family - an Ohio State Buckeye, my incredible wife Adriana my “Aztec Warrior Princess”, and our son Adam. While Adriana isn’t deeply connected to her Native ancestry, it’s fascinating to know our family is part of Mexico’s rich cultural tapestry. Join us as we share our personal experiences of raising a family in Rosarito and embracing the unique opportunities this place has to offer.</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">Buy a House in Rosarito</h5>
                <p class="wow fadeInUp mt-4">Discover the magic of Rosarito, Mexico—a stunning coastal haven offering affordability, vibrant culture, and endless opportunities. Hosted by our Mexican American family, we explore why Rosarito is the perfect destination to live, retire, or invest, with all the comforts of the U.S. close at hand, but much cheaper services right in your back yard.</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">🌴 Affordable Real Estate &amp; Living</h5>
                <div class="text-center">
                    <img class="mt-4" alt="about-image" src="{{ asset('user_assets/images/about/about2.png') }}">
                </div>
                <ul class="wow fadeInUp mt-4">
                    <li>
                        <p>
                            <strong>
                                <a target="_blank" href="https://buyahouseinrosarito.com/">Super Low-Cost Real Estate</a>
                            </strong>: Find incredible deals on homes with ocean views, family-friendly communities, and investment properties that maximize your budget.
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Retirement-Friendly</strong>: Discover why retirees are flocking to Rosarito for the affordability, ease of living, and <strong>
                                <a target="_blank" href="https://bwt.cbp.gov/details/09250401/POV"> proximity to the U.S.</a>
                            </strong>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">🏡 Practical Living &amp; Logistics</h5>
                <ul class="wow fadeInUp mt-4">
                    <li>
                        <p>
                            <strong>Getting a U.S. Address</strong>: It’s easy. We use our PO Box, and it’s on our <strong>
                                <a target="_blank" href="https://www.dmv.ca.gov/portal/"> California Driver’s License</a>
                            </strong> (which you’re required to get within 10 days of establishing residency.
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Health Insurance</strong>: <a target="_blank" href="https://www.coveredca.com/">Information on health insurance through Covered California.</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Banking and Taxes</strong>: If you live in the Rosarito area full-time and still earn an active income, YOU LIKELY QUALIFY FOR <a target="_blank" href="https://www.irs.gov/individuals/international-taxpayers/foreign-earned-income-exclusion"> Foreign Earned Income Exclusion,</a> where you won’t pay federal taxes on the first 130,000 (2025). Details on the Foreign Earned Income Exclusion for expats still earning an active income.
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Commuting Across the Border</strong>: <a target="_blank" href="https://ttp.dhs.gov/">Apply for SENTRI passes for expedited border crossing. </a> Motorcycles are usually the fastest way to cross. <a target="_blank" href="https://www.tripadvisor.com/ShowTopic-g150776-i761-k14745321-Special_lane_for_motorcycles_going_into_the_usa-Tijuana_Baja_California.html">You can lane-split in Baja California on a motorcycle </a> which means you can go straight to the front of every line.
                        </p>
                    </li>
                    <li>
                        <p>High-Speed Internet Options: Stay connected in Rosarito with several reliable high-speed internet providers:</p>
                        <br>
                        <p class="text-center">
                            <a target="_blank" href="#"><strong>Telnor:</strong> Offers fiber-optic internet services with speeds up to 300 Mbps. </a>
                            <br>
                            <a target="_blank" href="#"><strong>Totalplay:</strong> Provides high-speed internet, television, and telephone services.</a>
                            <br>
                            <a target="_blank" href="https://www.starlink.com/"><strong>Starlink by SpaceX:</strong> Satellite-based internet service offering high-speed connectivity, ideal for areas with limited traditional internet access.</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Popular Cell Phone Services with Data Plans</strong>: Stay connected on the go with these major cell phone providers in Mexico:
                        </p>
                        <div class="text-center">
                            <p>
                                <a target="_blank" href="#"><strong>Telcel:</strong> The largest mobile operator in Mexico, offering extensive coverage of both Mexico &amp; the US, and various data plans. </a>
                                <br>
                                <a target="_blank" href="#"><strong>AT&amp;T Mexico:</strong> Offers a variety of data plans with extensive coverage across Mexico.</a>
                                <br>
                                <a target="_blank" href="https://www.starlink.com/"><strong>Movistar:</strong> Provides competitive data plans and nationwide coverage.</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">🚚 Trustworthy International Movers with Great Reviews</h5>
                <p class="text-center">
                    <strong>1. Shepherd International Movers</strong>
                </p>
                <ul class="wow fadeInUp mt-4 mb-0">
                    <li>
                        <p class="mb-0">
                            <strong> Overview:</strong> Shepherd International Movers is a <strong> highly rated international moving company</strong> specializing in relocations from <strong> California to Mexico.</strong> Their services include full packing, transport, and customs clearance.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Services Offered:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> ✅ Full-service international household moving <br> ✅ Vehicle shipping <br> ✅ Packing and storage solutions <br> ✅ Customs assistance for U.S.-Mexico border crossing </p>
                <ul class="wow fadeInUp mb-0">
                    <li>
                        <p class="mb-0">
                            <strong>Reviews:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> ⭐ <strong>Google Maps: 4.8 stars</strong>
                    <br> ⭐ <strong>Yelp: 4.5 stars</strong>
                </p>
                <ul class="wow fadeInUp mb-0">
                    <li>
                        <p class="mb-0">
                            <strong>Contact:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> 📞 <strong> Phone:</strong> (844) 747-6111 <br>
                    <span>
                        <img height="20" width="20" src="{{ asset('user_assets/images/about/abouticon.png') }}">
                    </span>
                    <strong>Website:</strong>
                    <a target="_blank" href="https://maps.app.goo.gl/R3tPyiMWiW5yKFhTA">Shepherd Movers</a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <p class="text-center mt-3 ">
                    <strong>2. Atlas Transfer &amp; Storage Co.</strong>
                </p>
                <ul class="wow fadeInUp mt-4 mb-0">
                    <li>
                        <p>
                            <strong> Overview:</strong> A <strong>BBB-accredited</strong> company with over <strong> 90 years of experience,</strong> Atlas Transfer &amp; Storage offers <strong> international moving services from the US to Mexico,</strong> ensuring safe and efficient transport.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Services Offered:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> ✅ Household moving services <br> ✅ Storage solutions <br> ✅ Packing and unpacking <br> ✅ Customs documentation support </p>
                <ul class="wow fadeInUp mb-0">
                    <li>
                        <p class="mb-0">
                            <strong>Reviews:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> ⭐ <strong>Google Maps: 4.7 stars</strong>
                    <br> ⭐ <strong>Better Business Bureau (BBB): A+ rating</strong>
                    <br> ⭐ <strong>Yelp: 4.5 stars</strong>
                </p>
                <ul class="wow fadeInUp mb-0">
                    <li>
                        <p class="mb-0">
                            <strong>Contact:</strong>
                        </p>
                    </li>
                </ul>
                <p class="ml-5 mb-0"> 📞 <strong> Phone:</strong> (858) 513-3800 <br>
                    <span>
                        <img height="20" width="20" src="{{ asset('user_assets/images/about/abouticon.png') }}">
                    </span>
                    <strong>Website:</strong>
                    <a target="_blank" href="https://maps.app.goo.gl/eYaTYR4nCwu4nEfX7">Atlas Transfer &amp; Storage</a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">🏥 Healthcare and Wellness</h5>
                <ul class="wow fadeInUp mt-4">
                    <li>
                        <p>
                            <strong>High-Quality, Affordable Care</strong>: Explore Mexico’s top-notch medical facilities for everyday needs, emergencies, and more.
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Experimental Treatments</strong>: Learn about cutting-edge options <a target="_blank" href="https://www.healthline.com/health/ibogaine-treatment">like ibogaine therapy</a>, <a target="_blank" href="about:blank">ayahuasca retreats</a>, and innovative cancer treatments unavailable in the U.S.
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>Dental and Cosmetic Tourism</strong>: Whether it’s a perfect smile or a full makeover, enjoy premium care for one-third the cost.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4">🏖️ Recreation &amp; Adventure</h5>
                <p class="mt-3 text-center">Rosarito is a paradise for adventure seekers and relaxation lovers alike:</p>
                <ul class="wow fadeInUp mt-4 mb-3">
                    <li>
                        <p>
                            <strong>Sport Fishing and Whale Watching, Ensenada</strong>: Enjoy sport fishing and tranquil boat rides from nearby Ensenada’s port and marina.
                        </p>
                    </li>
                    <div class="text-center">
                        <img class="mt-3" src="{{ asset('user_assets/images/about/about3.png') }}">
                    </div>
                    <li class="mt-3">
                        <p>
                            <strong class="pt-3">
                                <a target="_blank" href="https://www.surf-forecast.com/breaks/Baja-Malibu">Surfing, Playas de Rosarito</a>
                            </strong>: Catch some of the best waves on the Baja coast, perfect for surfers of all levels.
                        </p>
                    </li>
                    <li class="mt-3">
                        <p>
                            <strong class="pt-3">Golfing, Playas de Rosarito</strong>: Tee off at scenic golf courses with breathtaking ocean views.
                        </p>
                    </li>
                </ul>
                <div class="text-center">
                    <img class="mt-4 wow fadeInUp" src="{{ asset('user_assets/images/about/about4.png') }}">
                </div>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p>
                            <strong>
                                <a target="_blank" href="https://maps.app.goo.gl/APzxDcP1dBsnNH5s9">Jersey Kids Zoo, Ensenada</a>
                            </strong>: Located in Valle de Guadalupe, this family-friendly park offers a petting zoo, playgrounds, and water attractions. Perfect for kids and picnics.
                        </p>
                    </li>
                </ul>
                <div class="text-center">
                    <img class="mt-4 wow fadeInUp" src="{{ asset('user_assets/images/about/about5.png') }}">
                </div>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p>
                            <strong>Pai Pai Ecotourism Park, Ensenada</strong>: Experience exotic animals, zip-lining, EuroBungee, and interaction with animals at this conservation-focused adventure park.
                        </p>
                    </li>
                </ul>
                <div class="text-center">
                    <img class="mt-4 wow fadeInUp" src="{{ asset('user_assets/images/about/about6.png') }}">
                </div>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p>
                            <strong>Las Cañadas Adventure Park, Ensenada</strong>: Zip-lining, ATV trails, horseback riding, camping, wave pools, and more—all in a scenic natural setting.
                        </p>
                    </li>
                </ul>
                <div class="text-center">
                    <img class="mt-4 wow fadeInUp" src="{{ asset('user_assets/images/about/about7.png') }}">
                </div>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p>
                            <strong>
                                <a target="_blank" href="https://maps.app.goo.gl/XLzwJA74iBmEwEdV7">Morelos Park Zoo, Tijuana </a>
                            </strong>: A local favorite, this zoo features various animal exhibits, a petting zoo, and beautiful picnic areas.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4 ">🌿 Nature &amp; Wildlife</h5>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p class="mb-0">
                            <strong>Exotic Birds and Wildlife</strong>: Spot hummingbirds, red-tailed hawks, barn owls, and even dolphins in their natural habitat.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Wildlife Sanctuaries and Zoos</strong>: Visit local sanctuaries and petting farms for family-friendly fun.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Hiking Clubs</strong>: Join community hiking groups to explore Baja’s rugged beauty.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4 ">🍷 Food, Wine, and Local Culture</h5>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p class="mb-0">
                            <strong>
                                <a target="_blank" href="https://maps.app.goo.gl/AG4uaKysfkP8KwKx8">Valle de Guadalupe, Ensenada</a>
                            </strong>: Explore Mexico’s answer to Napa Valley, with world-class wineries, gourmet dining, and luxury resorts.
                        </p>
                    </li>
                </ul>
                <div class="text-center">
                    <img class="mt-4 wow fadeInUp" src="{{ asset('user_assets/images/about/about8.png') }}">
                </div>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p class="mb-0">
                            <strong>Fresh Seafood &amp; Cuisine</strong>: Indulge in Rosarito’s famous lobster tacos and other Baja culinary delights.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4 ">🤝 Churches, Community &amp; Sobriety Support</h5>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p class="mb-0">
                            <strong>English-Speaking Resources</strong>: Connect through English-speaking and <a target="_blank" href="https://maps.app.goo.gl/dT4rtnmyrTj2KGLB8"> bilingual churches</a>, sobriety meetings, <a target="_blank" href="https://g.co/kgs/1tzXWva">meditation groups</a>, and expat networks.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>
                                <a target="_blank" href="https://g.co/kgs/4T68ANW">Exercise and Fitness</a>
                            </strong>: Numerous gyms and health clubs.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Support for Families</strong>: Rosarito offers plenty of kid-friendly activities, schools, and clubs for a balanced lifestyle.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4 ">Why Rosarito?</h5>
                <ul class="mt-4 wow fadeInUp">
                    <li>
                        <p class="mb-0">
                            <strong>Affordable Paradise</strong>: Get more for your money while living near the ocean.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Close to the U.S</strong>: Enjoy the benefits of living abroad while keeping access to U.S. resources just minutes away.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Rich Culture</strong>: From modern amenities to ancient history, Rosarito has it all.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">
                            <strong>Year-Round Sunshine</strong>: Perfect weather for an outdoor lifestyle filled with adventure.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 who-1">
                <h5 class="wow fadeInUp text-center mt-4 ">
                    <a target="_blank" href="https://youtube.com/@buyahouseinrosarito?feature=shared">Like and Subscribe to "Buy a House in Rosarito" on YouTube to See A Lot More Today!</a>
                </h5>
                <p class="mt-4 wow fadeInUp">Whether you’re dreaming of a retirement home, exploring family life in Baja, or just curious about the unique lifestyle in Rosarito, this channel is for you. Follow us for in-depth tips, breathtaking visuals, and a personal look into life in this incredible coastal paradise.</p>
                <h5 class="wow fadeInUp text-center mt-4 ">Don’t wait—start your Baja adventure today! 🌴✨</h5>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
</script>
@endpush