@extends('app')
@section('title', 'Articles')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2> Blogs </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Blogs </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/blogs/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Create New Article</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form id="search_form" action="{{ url('admin/blogs') }}" method="GET" enctype="multipart/form-data">
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search by title, keywords..." value="{{ request()->search }}" required>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a class="btn btn-danger ml-4" href="{{ url('admin/blogs/') }}">
                                            Clear Search
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>

</script>
@endpush