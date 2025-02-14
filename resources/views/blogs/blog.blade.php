@extends('app')
<?php
$seo_data = get_single_row('seos', 'page_name', 'blog');
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
            <h1>Blog</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Blog</h2>
        </div>
    </div>
</section>
<section class="blog blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="row">
                    @if($blogs->isNotEmpty())
                    @foreach($blogs as $blog)
                    <div class="col-md-4 col-xs-12 mb-md-4">
                        <div class="news-item nomb">
                            <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="{{ asset('assets/images').'/'.$blog->featured_image }}" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text">
                                {{-- <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" target="_blank"> <h3>{{ $blog->title }}</h3> </a> --}}
                                <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" target="_blank"> <h3>{{ limit_words($blog->title, 6)}}</h3> </a>
                                <div class="news-item-descr big-news">
                                    <p>{{ limit_words($blog->meta_description, 10)}}</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="{{ route('slugHandler', ['slug' => $blog->post_url]) }}" class="news-link" target="_blank">Read more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center">
                        <p style="color: #ff385c;"><strong>No records found.</strong></p>
                    </div>
                    @endif
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
                                <a href="{{ route('slugHandler', ['slug' => $bitem->post_url]) }}"><img src="{{ asset('assets/images').'/'.$bitem->featured_image }}" alt="blog image"></a>
                            </div>
                            <div class="info-img">
                                <a href="{{ route('slugHandler', ['slug' => $bitem->post_url]) }}"><h6>{{ limit_words($bitem->title, 3)}}</h6></a>
                                <p>{{ month_date($bitem->publish_date) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
        <nav aria-label="..." class="pt-5">
            <div class="row">
                <div class="col-md-6 pagebuttons">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </nav>
    </div>
</section>
@endsection
@push('scripts')
<script>
</script>
@endpush