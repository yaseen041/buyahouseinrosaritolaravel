@extends('app')
@push('styles')
<title>{{ $blog->meta_title }}</title>
<meta name="description" content="{{ $blog->meta_description }}" />
<meta name="keywords" content="{{ $blog->meta_keywords }}" />
<link rel="canonical" href="{{ request()->url() }}" />
<meta property="og:title" content="{{ $blog->fb_title }}" />
<meta property="og:description" content="{{ $blog->fb_description }}" />
<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:image" content="{{ asset('/assets/images/' . $blog->fb_image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $blog->twitter_title }}" />
<meta name="twitter:description" content="{{ $blog->twitter_description }}" />
<meta name="twitter:image" content="{{ asset('/assets/images/' . $blog->twitter_image) }}" />
<meta name="robots" content="index, follow" />
<script type="application/ld+json">
    <?php echo $blog->json_ld_code; ?>
</script>

@endpush
@section('content')

<section class="blog blog-section bg-white pt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="no-mb2">
                            <div class="news-item-text details pb-0">
                                {{-- <h3 class="ml-3">{{ $blog->title }}</h3>
                                <div class="dates">
                                    <span class="date ml-3"> {{ month_date($blog->publish_date) }} &nbsp;</span>
                                </div> --}}
                                <div class="description ml-3 mr-3">
                                    <p class="mb-3"><?php echo $blog->description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
</script>
@endpush