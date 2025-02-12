@extends('admin.admin_app')
@push('styles')
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2> Newsletter Subscriptions </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Newsletter Subscriptions </strong>
            </li>
        </ol>
    </div>
    <!-- <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" data-toggle="modal" data-target="#add_modalbox">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Testimonial
        </a>
    </div> -->
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row justify-content-end mx-1">
                        <div class="col-12 col-sm-12">
                            <div class="row justify-content-end">
                                <a class="btn btn-primary text-white t_m_25" id="export_csv">
                                    <i class="fa fa-table" aria-hidden="true"></i> Export CSV
                                </a>
                                <a class="btn btn-primary text-white t_m_25 ml-2" id="export_json">
                                    <i class="fa fa-code" aria-hidden="true"></i> Export JSON
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="manage_tbl" class="table table-striped table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($subs as $item)
                                <tr class="gradeX">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn_delete" data-id="{{$item->id}}" data-text="you want to delete this subscriber?" type="button" data-placement="top" title="Delete">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p>Showing {{ $subs->firstItem() }} to {{ $subs->lastItem() }} of {{ $subs->total() }} entries</p>
                        </div>
                        <div class="col-md-3 text-right">
                            {{ $subs->links('pagination::bootstrap-4') }}
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
                        url: "{{ url('admin/newsletter/delete') }}",
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

    $('#export_csv').on('click', function() {
        window.location.href = "{{ url('admin/newsletter/export_csv') }}";
    });
    $('#export_json').on('click', function() {
        window.open("{{ url('admin/newsletter/export_json') }}", "_blank");
    });
</script>
@endpush