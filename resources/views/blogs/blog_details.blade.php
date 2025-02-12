@extends('app')
@section('title', 'Blog Details')
@push('styles')
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
                        <div class="news-item details no-mb2">
                            <a href="{{ asset('assets/images').'/'.$blog->featured_image }}" target="_blank" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="img-responsive" src="{{ asset('assets/images').'/'.$blog->featured_image }}" alt="blog image">
                                </div>
                            </a>
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
                                @foreach(get_categories() as $citem)
                                <li><a href="{{$citem->slug}}"><i class="fa fa-caret-right" aria-hidden="true"></i>{{$citem->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-post pt-5">
                            <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                            @foreach(get_recent_blogs() as $bitem)
                            <div class="recent-main">
                                <div class="recent-img">
                                    <a href="{{$bitem->post_url}}"><img src="{{ asset('assets/images').'/'.$bitem->featured_image }}" alt="blog image"></a>
                                </div>
                                <div class="info-img">
                                    <a href="{{$bitem->post_url}}"><h6>{{ limit_words($bitem->title, 3)}}</h6></a>
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