@extends('admin.admin_app')
@push('styles')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .ck.ck-reset.ck-editor.ck-rounded-corners {
        box-sizing: border-box;
        height: auto;
        position: static;
        width: 100%;
    }

    .switch-container {
        display: flex;
        flex-direction: column;
        align-items: start;
        margin-top: 29px;
        margin-left: -118px;
    }

    .ck-editor__editable_inline {
        min-height: 100px;
    }
</style>
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2> Default Image </h2>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{url('admin')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Quotes
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    @if(isset($default_image))
                    <form  class="m-4" id="update_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $default_image->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="form-label"><strong>Default Quote</strong></label>
                                    <input type="file" name="default_image" id="default_image" required class="form-control" accept="image/*">
                                </div>
                                <div class="form-group row ">
                                    <button type="button" class="btn btn-primary" id="btn_update">Save Changes</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <img id="previewImage" class="img-rounded img-thumbnail"
                                    src="{{ isset($default_image) && $default_image->quote_image != null ? $default_image->quote_image : '' }}"
                                    alt="Image Preview"
                                    style="{{ isset($default_image) && $default_image->quote_image != null ? '' : 'display: none;' }} max-width: 300px;">

                                </div>
                            </div>
                        </div>
                    </form>
                    @else

                    <form  class="m-4" id="store_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="form-label"><strong>Default Quote</strong></label>
                                    <input type="file" name="default_image" id="default_image" required class="form-control" accept="image/*">
                                </div>
                                <div class="form-group row ">
                                    <button type="button" class="btn btn-primary" id="btn_store">Save</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <img id="previewImage" class="img-rounded img-thumbnail"
                                    src="{{ isset($default_image) && $default_image->quote_image != null ? $default_image->quote_image : '' }}"
                                    alt="Image Preview"
                                    style="{{ isset($default_image) && $default_image->quote_image != null ? '' : 'display: none;' }} max-width: 300px;">

                                </div>
                            </div>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });


    $(document).ready(function(){
        $(document).on("click" , "#btn_store" , function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            var formData = new FormData($("#store_form")[0]);

            $('.i-checks').each(function() {
                if ($(this).is(':checked')) {
                    formData.append($(this).attr('name'), $(this).val());
                }
            });

            $.ajax({
                url:'{{ url('admin/default_image/store') }}',
                type: 'POST',
                data: formData,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                success:function(status){
                    if(status.msg=='success') {
                        btn.ladda('stop');
                        toastr.success(status.response,"Success");
                        $('#store_form')[0].reset();
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    } else if(status.msg == 'error') {
                        btn.ladda('stop');
                        toastr.error(status.response,"Error");
                    } else if(status.msg == 'lvl_error') {
                        btn.ladda('stop');
                        var message = "";
                        $.each(status.response, function (key, value) {
                            message += value+"<br>";
                        });
                        toastr.error(message, "Error");
                    }
                }
            });
        });
    });

    $(document).ready(function(){
        $(document).on("click" , "#btn_update" , function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            var formData = new FormData($("#update_form")[0]);

            $('.i-checks').each(function() {
                if ($(this).is(':checked')) {
                    formData.append($(this).attr('name'), $(this).val());
                }
            });

            $.ajax({
                url:'{{ url('admin/default_image/update') }}',
                type: 'POST',
                data: formData,
                dataType:'json',
                cache: false,
                contentType: false,
                processData: false,
                success:function(status){
                    if(status.msg=='success') {
                        btn.ladda('stop');
                        toastr.success(status.response,"Success");
                        $('#update_form')[0].reset();
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    } else if(status.msg == 'error') {
                        btn.ladda('stop');
                        toastr.error(status.response,"Error");
                    } else if(status.msg == 'lvl_error') {
                        btn.ladda('stop');
                        var message = "";
                        $.each(status.response, function (key, value) {
                            message += value+"<br>";
                        });
                        toastr.error(message, "Error");
                    }
                }
            });
        });
    });


    $(document).ready(function(){
        const formFile = document.getElementById('default_image');
        const previewImage = document.getElementById('previewImage');

        formFile.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        });
    });


</script>
@endpush