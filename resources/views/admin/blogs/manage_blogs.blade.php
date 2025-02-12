@extends('admin.admin_app')
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

                    <div class="table-responsive">
                        <table id="quotes_table" class="table table-striped table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Title</th>
                                    <th>Parent Blog</th>
                                    <th>Category</th>
                                    <th>Publish Date</th>
                                    <th>Status</th>
                                    <th>Crawl Disabled</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($blogs as $blog)
                                <tr class="gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" target="_blank"> {{ $blog->title }} </a>
                                    </td>
                                    <td>
                                        @if($blog->parent)
                                        <a href="https://buyahouseinrosarito.com/blog/{{ $blog->parent->post_url }}" target="_blank">{{ $blog->parent->title }}</a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        {{ $blog->category_title }}
                                    </td>
                                    <td>
                                        {{ $blog->publish_date}}
                                    </td>
                                    <td>
                                        @if($blog->status == '1')
                                        <span class="label label-primary">Published</span>
                                        @else
                                        <span class="label label-danger">Archived</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($blog->disable_crawl == '1')
                                        <span class="label label-danger">Yes</span>
                                        @else
                                        <span class="label label-primary">No</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a class="btn btn-primary btn-sm btn_edit me-3" href="{{ url('admin/blogs/edit')}}/{{$blog->id}}">
                                            <i class="fa-solid fa-edit"></i>
                                            Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm btn_delete ms-3" data-id="{{ $blog->id }}" type="button" data-placement="top" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p>Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries</p>
                        </div>
                        <div class="col-md-3 pagebuttons">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $('#quotes_table').dataTable({
        "paging": false,
        "searching": false,
        "bInfo": false,
        "responsive": true,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "columnDefs": [{
                "responsivePriority": 1,
                "targets": 0,
                "orderable": false
            },
            {
                "responsivePriority": 2,
                "targets": -1,
                "orderable": false
            },
            {
                "responsivePriority": 3,
                "targets": -2
            },
        ],
    });
    $(document).on("click", ".btn_delete", function() {
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure",
                text: "you want to delete this article?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, please!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $(".confirm").prop("disabled", true);
                    $.ajax({
                        url: "{{ route('admin.blogs.delete') }}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id,
                        },
                        dataType: 'json',
                        success: function(status) {
                            $(".confirm").prop("disabled", false);
                            if (status.msg == 'success') {
                                swal({
                                        title: "Success!",
                                        text: status.response,
                                        type: "success"
                                    },
                                    function(data) {
                                        location.reload();
                                    });
                            } else if (status.msg == 'error') {
                                swal("Error", status.response, "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
    });
</script>
@endpush