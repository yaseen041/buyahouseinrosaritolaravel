@extends('app')
@section('title', 'Blog')
@push('styles')
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

<?php
// echo "<pre>";
// print_r($blogs);
// exit;
?>

<section class="blog blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="row">
                    @if($blogs->isNotEmpty())
                    @foreach($blogs as $blog)
                    <div class="col-md-6 col-xs-12 mb-md-4">
                        <div class="news-item nomb">
                            {{-- <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" class="news-img-link"> --}}
                                <a href="{{url('blog-details')}}/{{$blog->post_url}}" class="news-img-link">
                                    <div class="news-item-img">
                                        <img class="img-responsive" src="{{ asset('assets/images').'/'.$blog->featured_image }}" alt="blog image">
                                    </div>
                                </a>
                                <div class="news-item-text">
                                    <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" target="_blank"> <h3>{{ $blog->title }}</h3> </a>
                                    <div class="dates">
                                        <span class="date"> {{ month_date($blog->publish_date) }} &nbsp;</span>
                                    </div>
                                    <div class="news-item-descr big-news">
                                        <p>{{$blog->meta_description}}</p>
                                    </div>
                                    <div class="news-item-bottom">
                                        <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" class="news-link" target="_blank">Read more...</a>
                                        <div class="admin">
                                            <p>{{ $blog->category->title }}</p>
                                        </div>
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

            <nav aria-label="..." class="pt-5">
                <div class="row">
                    <div class="col-md-6 pagebuttons">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                {{-- <div class="col-md-3">
                    <p>Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries</p>
                </div> --}}
            </div>
        </nav>

    </div>
</section>



@endsection
@push('scripts')
<script>

</script>
@endpush