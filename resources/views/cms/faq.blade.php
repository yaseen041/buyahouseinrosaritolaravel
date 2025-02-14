@extends('app')
<?php
$seo_data = get_single_row('seos', 'page_name', 'faq');
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
            <h1>Frequently asked questions</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Frequently asked questions</h2>
        </div>
    </div>
</section>
<section class="faq service-details ui-elements bg-white">
    <div class="container">
        <h3 class="mb-5">FREQUENTLY ASKED QUESTIONS</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h5 class="uppercase mb40">Questions About Selling</h5>
                <ul class="accordion accordion-1 one-open">
                    <li class="active">
                        <div class="title">
                            <span>What payment methods are available?</span>
                            <strong class="toggle-icon"><i class="fas fa-minus"></i></strong>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>How can i get findhouses aid to live off campus?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>Does findhouses share my information with others?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>What kind of real estate advice do you give?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>How do i link multiple accounts with my profile?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>What kind of real estate advice do you give?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>Is your advice really be helf full?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>How can i get real estate aid to live off campus?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <span>Does realhome share my information with others?</span>
                            <span class="toggle-icon"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $(".accordion .title").click(function () {
            var $li = $(this).parent();
            var $accordion = $li.closest(".accordion");
            if ($accordion.hasClass("one-open")) {
                $accordion.find("li").not($li).removeClass("active").find(".content").slideUp();
                $accordion.find(".toggle-icon i").removeClass("fa-minus").addClass("fa-plus");
            }
            $li.toggleClass("active");
            $li.find(".content").slideToggle();
            var $icon = $li.find(".toggle-icon i");
            if ($li.hasClass("active")) {
                $icon.removeClass("fa-plus").addClass("fa-minus");
            } else {
                $icon.removeClass("fa-minus").addClass("fa-plus");
            }
            if ($accordion.find("li.active").length === 0) {
                $accordion.find(".toggle-icon i").removeClass("fa-minus").addClass("fa-plus");
            }
        });
    });
</script>
@endpush