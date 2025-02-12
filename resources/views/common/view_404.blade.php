@extends('app')
@section('title', 'Blog Details')
@push('styles')
@endpush
@section('content')


<section class="notfound pt-0">
    <div class="container">
        <div class="top-headings text-center">
            <img src="{{ asset('user_assets/images/bg/error-404.jpg') }}" alt="Page 404">
            <h3 class="text-center">Page Not Found!</h3>
            <p class="text-center">Oops! Looks Like Something Going Rong We can’t seem to find the page you’re looking for make sure that you have typed the currect URL</p>
        </div>
        <div class="port-info">
            <a href="{{url('/')}}" class="btn btn-primary btn-lg">Go To Home</a>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>

</script>
@endpush