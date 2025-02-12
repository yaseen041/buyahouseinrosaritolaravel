@extends('admin.admin_app')
@section('title', 'Add Page SEO')
@push('styles')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2>Page SEO</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/seo') }}">Page SEO</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Add Page SEO </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/seo')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to SEO</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <form id="add_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>SEO Details</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <strong class="form-label" for="page_name">Page Name:</strong>
                            <input class="form-control" id="page_name" type="text" name="page_name" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="meta_title">Meta Title:</strong>
                            <input class="form-control" id="meta_title" type="text" name="meta_title" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="meta_keywords">Meta keywords:</strong>
                            <input class="form-control" id="meta_keywords" type="text" name="meta_keywords" />
                            <sub>Add Keywords Separated By Comma, Example: keyword1, keyword2, keyword3</sub>
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="meta_description">Meta Description:</strong>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Open Graph / Facebook Tags</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <strong class="form-label" for="facebook_meta_image">Image:</strong>
                            <input class="form-control" id="facebook_meta_image" type="file" name="facebook_meta_image" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="facebook_meta_title">Facebook Page Title:</strong>
                            <input class="form-control" id="facebook_meta_title" type="text" name="facebook_meta_title" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="facebook_meta_description">Description:</strong>
                            <textarea class="form-control" id="facebook_meta_description" name="facebook_meta_description" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Twitter Card Tags</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <strong class="form-label" for="twitter_meta_image">Image:</strong>
                            <input class="form-control" id="twitter_meta_image" type="file" name="twitter_meta_image" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="twitter_meta_title">Twitter Page Title:</strong>
                            <input class="form-control" id="twitter_meta_title" type="text" name="twitter_meta_title" />
                        </div>
                        <div class="form-group">
                            <strong class="form-label" for="twitter_meta_description">Description:</strong>
                            <textarea class="form-control" id="twitter_meta_description" name="twitter_meta_description" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Structured Data (JSON-LD)</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <strong class="form-label" for="json_ld_code">JSON-LD Code:</strong>
                            <button id="btn_load_script" class="btn btn-secondary" type="button">Load Json</button>
                            <textarea class="form-control mt-2" id="json_ld_code" name="json_ld_code" rows="30"></textarea>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/seo') }}" class="btn btn-secondary" role="button"><i class="fa fa-times"></i> Cancel</a>
                            <button id="btn_create" class="btn btn-primary btn_create" type="button"><i class="fa fa-plus"></i> Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_create", function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            var formData = new FormData($("#add_form")[0]);
            $.ajax({
                url: '{{ url("admin/seo/store") }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status.msg == 'success') {
                        toastr.success(status.response, "Success");
                        $("#add_form")[0].reset();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (status.msg == 'error') {
                        btn.ladda('stop');
                        toastr.error(status.response, "Error");
                    } else if (status.msg == 'lvl_error') {
                        btn.ladda('stop');
                        var message = "";
                        $.each(status.response, function(key, value) {
                            message += value + "<br>";
                        });
                        toastr.error(message, "Error");
                    } else {
                        console.log(status.response);
                        btn.ladda('stop');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on("click", "#btn_load_script", function() {
            const meta_title = document.getElementById("meta_title").value;
            const slug = document.getElementById("page_name").value;
            const meta_description = document.getElementById("meta_description").value;
            const updatedJsonLd = {
                "@context": "https://schema.org",
                "@type": "Article",
                "headline": meta_title,
                "description": meta_description,
                "author": {
                    "@type": "Organization",
                    "name": "Buy A House In Rosarito"
                },
                "publisher": {
                    "@type": "Organization",
                    "name": "Buy A House In Rosarito",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "https://buyahouseinrosarito.com/assets/images/Header3.png"
                    }
                },
                "datePublished": new Date().toISOString().split("T")[0],
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": `https://buyahouseinrosarito.com/${slug}`
                }
            };
            const jsonLdString = JSON.stringify(updatedJsonLd, null, 2);
            const scriptBlock = `${jsonLdString}`;
            const textareaElement = document.getElementById("json_ld_code");
            textareaElement.value = scriptBlock;
        });
    });
</script>
@endpush