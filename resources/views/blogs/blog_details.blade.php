@extends('app')
@push('styles')
<title>{{ $blog->meta_title }}</title>
<meta name="description" content="{{ $blog->meta_description }}" />
<meta name="keywords" content="{{ $blog->meta_keywords }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:title" content="{{ $blog->fb_title }}" />
<meta property="og:description" content="{{ $blog->fb_description }}" />
<meta property="og:url" content="{{ url('/'); }}" />
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
<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Blog Details</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Blog Details</h2>
        </div>
    </div>
</section>
<section class="blog blog-section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="no-mb2">
                            <div class="news-item-text details pb-0">
                                <h3 class="ml-3">{{ $blog->title }}</h3>
                                <div class="dates">
                                    <span class="date ml-3"> {{ month_date($blog->publish_date) }} &nbsp;</span>
                                </div>
                                <div class="description ml-3 mr-3">
                                    <p class="mb-3"><?php echo $blog->description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-lg-3 col-md-12">
                <div class="widget">
                    <h5 class="font-weight-bold mb-4">Search</h5>
                    <form action="{{ url('blog') }}" method="GET" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ request()->search }}" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </form>
                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold">Category</h5>
                        <ul>
                            @foreach(get_categories_having_blogs() as $citem)
                            <li><a href="{{ route('slugHandler', ['slug' => $citem->slug]) }}"><i class="fa fa-caret-right" aria-hidden="true"></i>{{$citem->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="recent-post pt-5">
                        <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                        @foreach(get_recent_blogs() as $bitem)
                        <div class="recent-main mb-4">
                            <div class="recent-img">
                                <a href="{{ url('/') }}/{{$bitem->post_url}}"><img src="{{ asset('assets/images').'/'.$bitem->featured_image }}" alt="blog image"></a>
                            </div>
                            <div class="info-img">
                                <a href="{{ url('/') }}/{{$bitem->post_url}}"><h6>{{ limit_words($bitem->title, 3)}}</h6></a>
                                <p>{{ month_date($bitem->publish_date) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
</script>
@endpush