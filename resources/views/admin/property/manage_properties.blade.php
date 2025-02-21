@extends('admin.admin_app')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2> Property Listings </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Property Listings </strong>
            </li>
        </ol>
    </div>

    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/property-listings/add') }}">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Property Listing
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form id="search_form" action="{{url('admin/property-listings')}}" method="GET" enctype="multipart/form-data">
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_query" placeholder="Search by Title, Property Code, Country, State, City or Leave Blank" value="{{ old('search_query', $searchParams['search_query'] ?? '') }}">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a class="btn btn-danger ml-4" href="{{ url('admin/property-listings/') }}">
                                            Clear Search
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table" style="overflow-x: auto;">
                        <table id="manage_tbl" class="table table-striped table-bordered dt-responsive">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Community</th>
                                    <th>Status</th>
                                    <th>Price (USD)</th>
                                    <th>Size (Sq.ft)</th>
                                    <th style="width: 300px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($properties as $item)
                                <tr class="gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->code  }}</td>
                                    <td>
                                        <a href="{{url('property/')}}/{{$item->slug}}" target="_blank"> {{ $item->title }}</a>
                                    </td>
                                    <td>{{$item->neighborhood->title}}</td>
                                    <td>
                                        @if ($item->listing_status ==1)
                                        <label class="label label-primary"> For Sale </label>
                                        @elseif($item->listing_status ==2)
                                        <label class="label label-info"> For Rent </label>
                                        @elseif($item->listing_status ==3)
                                        <label class="label label-dark"> Rented </label>
                                        @elseif($item->listing_status ==4)
                                        <label class="label label-danger"> Sale Pending </label>
                                        @else
                                        <label class="label label-success"> Sold </label>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{ number_format($item->size, 2) }}</td>
                                    <td>
                                        <a href="{{ url('admin/property-listings/details') }}/{{ $item->id }}" class="btn btn-primary btn-sm" data-placement="top" title="Details"> <i class="fa fa-edit"></i> Edit Details </a>
                                        <button class="btn btn-danger btn-sm btn_delete" data-id="{{$item->id}}" data-text="You want to delete this listing!" type="button" data-placement="top" title="Delete">Delete</button>
                                        @if($item->is_featured == 1)
                                        <button class="btn btn-success btn-sm btn_feature" data-id="{{$item->id}}" data-text="You want to feature this listing!" type="button" data-placement="top" title="Feature">Feature</button>
                                        @elseif($item->is_featured == 2)
                                        <button class="btn btn-dark btn-sm btn_feature" data-id="{{$item->id}}" data-text="You want to unfeature this listing!" type="button" data-placement="top" title="Unfeature">Unfeature</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p>Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of {{ $properties->total() }} entries</p>
                        </div>
                        <div class="col-md-3 text-right">
                            {{ $properties->links('pagination::bootstrap-4') }}
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
    // $('#manage_tbl').dataTable({
    //     "paging": false,
    //     "searching": false,
    //     "bInfo": false,
    //     "responsive": true,
    //     "columnDefs": [{
    //             "responsivePriority": 1,
    //             "targets": 0
    //         },
    //         {
    //             "responsivePriority": 2,
    //             "targets": -1
    //         },
    //     ]
    // });
    var session = "{{Session::has('success') ? 'true' : 'false'}}";
    if (session == 'true') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        }
        toastr.success("{{Session::get('success')}}");

    }
    var erroring = "{{Session::has('error') ? 'true' : 'false'}}";
    if (erroring == 'true') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        }
        toastr.error("{{Session::get('error')}}");

    }
    $(document).on("click", ".btn_delete", function() {
        var id = $(this).attr('data-id');
        var show_text = $(this).attr('data-text');
        swal({
            title: "Are you sure",
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
                    url: "{{ url('admin/property-listings/delete') }}",
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
    $(document).on("click", ".btn_feature", function() {
        var id = $(this).attr('data-id');
        var show_text = $(this).attr('data-text');
        swal({
            title: "Are you sure",
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
                    url: "{{ url('admin/property-listings/updateFeatureStatus') }}",
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