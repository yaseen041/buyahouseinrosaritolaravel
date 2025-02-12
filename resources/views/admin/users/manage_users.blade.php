@extends('admin.admin_app')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2> Users </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Users </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/users/add') }}">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Users
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form id="search_form" action="{{url('admin/users')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_query" placeholder="Search by Name, Email, or Phone No" value="{{ old('search_query', $searchParams['search_query'] ?? '') }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a class="btn btn-danger ml-4" href="{{ url('admin/users/') }}">
                                             Clear Search
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="manage_tbl" class="table table-striped table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($users as $item)
                                <tr class="gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->fname . ' ' . $item->lname  }}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if($item->is_blocked == 1)
                                        <label class="label label-dark text-dark"> Blocked </label>
                                        @else
                                        <label class="label label-primary"> Active </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/users/detail') }}/{{ $item->id }}" class="btn btn-primary btn-sm" data-placement="top" title="Details"><i class="fa-solid fa-edit"></i> Edit </a>
                                        <button class="btn btn-danger btn-sm btn_delete" data-id="{{$item->id}}" data-text="You want to delete this user!" type="button" data-placement="top" title="Delete">Delete</button>
                                        @if ($item->is_blocked==1)
                                        <button class="btn btn-success btn-sm btn_update_status" data-id="{{$item->id}}" data-status="0" data-text="You want to unblock this user!" type="button" data-placement="top" title="Inactivate">Unblock</button>
                                        @else
                                        <button class="btn btn-dark btn-sm btn_update_status" data-id="{{$item->id}}" data-status="1" data-text="You want to block this user!" type="button" data-placement="top" title="Activate">Block</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</p>
                        </div>
                        <div class="col-md-3 text-right">
                            {{ $users->links('pagination::bootstrap-4') }}
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
    $('#manage_tbl').dataTable({
        "paging": false,
        "searching": false,
        "bInfo": false,
        "responsive": true,
        "columnDefs": [{
                "responsivePriority": 1,
                "targets": 0
            },
            {
                "responsivePriority": 2,
                "targets": -1
            },
        ]
    });
    $(document).on("click", ".btn_update_status", function() {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var show_text = $(this).attr('data-text');
        swal({
                title: "Are you sure?",
                text: show_text,
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
                        url: "{{ url('admin/users/update_statuses') }}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id,
                            'status': status
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
    $(document).on("click", ".btn_delete", function() {
        var id = $(this).attr('data-id');
        var show_text = $(this).attr('data-text');
        swal({
                title: "Are you sure?",
                text: show_text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete!",
                cancelButtonText: "No, Cancel!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $(".confirm").prop("disabled", true);
                    $.ajax({
                        url: "{{ url('admin/users/delete') }}",
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
    var session = "{{Session::has('success') ? 'true' : 'false'}}";
    if (session == 'true') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        }
        toastr.success("{{Session::get('success')}}");
    }
</script>
@endpush