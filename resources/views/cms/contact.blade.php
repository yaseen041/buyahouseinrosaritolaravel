@extends('app')
<?php
$seo_data = get_single_row('seos', 'page_name', 'contact');
?>
@section('meta_title', $seo_data->meta_title )
@section('meta_description', $seo_data->meta_description )
@section('meta_keywords', $seo_data->meta_keywords )
@section('fb_title', $seo_data->fb_title )
@section('fb_description', $seo_data->fb_description )
@section('fb_image', asset('/assets/images/' . $seo_data->fb_image))
@section('twitter_title', $seo_data->twitter_title )
@section('twitter_description', $seo_data->twitter_description )
@section('twitter_image', asset('/assets/images/' . $seo_data->twitter_image))
@section('json_ld_code')
{!! $seo_data->json_ld_code !!}
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
<style type="text/css">
    .select2-container {
        width: 100% !important;
    }
    .select2-container--default .select2-selection--multiple {
        background-color: white !important;
        border: 1px solid #dddddd !important;
        border-radius: .25rem !important;
        cursor: text !important;
    }
    .nice-select {
        display: none !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding: 0 10px !important;
    }
</style>
@endpush
@section('content')

<section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Contact Us</h1>
            <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Contact Us</h2>
        </div>
    </div>
</section>
<section class="contact-us">
    <div class="container">
        <div class="property-location mb-5">
            <h3>Our Location</h3>
            <div class="divider-fade"></div>
            <div id="map" class="contact-map"></div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h3 class="mb-4">Contact Us</h3>
                <form id="contact_form" class="contact-form" name="contact_form" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" required class="form-control input-custom input-full" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control input-custom input-full" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-custom input-full" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select id="propertySelect" name="property" class="nice-select form-control input-custom input-full mb-3 wide" multiple>
                            @foreach($properties as $property)
                            <option value="{{ $property->id}}">{{ $property->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <span class="custom-checkbox d-block font-12 mb-3">
                            <input type="checkbox" name="store_info" id="store_info">
                            <label for="store_info">
                                I consent to having this website store my submitted information.
                            </label>
                        </span>
                    </div>
                    <button type="button" id="btn_submit_contact" class="btn btn-primary btn-lg">Submit</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-12 bgc">
                <div class="call-info">
                    <h3>Contact Details</h3>
                    <p class="mb-5">Please find below contact details and contact us today!</p>
                    <ul>
                        <li>
                            <div class="info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p class="in-p">Chichen Itza 8170, Rosarito, Mexico, 22567</p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p class="in-p"><a href="tel:+52 664 641 1658" class="text-white">+52 664 641 1658</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p class="in-p ti"><a href="mailto:aaron@buyahouseinrosarito.com" class="text-white">aaron@buyahouseinrosarito.com</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA&callback=initMap" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#propertySelect').select2({
            placeholder: "Select Property",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $(".multi-select .option").on("click", function() {
            $(this).toggleClass("selected");
            var selected = [];
            $(".multi-select .selected").each(function() {
                selected.push($(this).text());
            });
            $(".multi-select .current").text(selected.length ? selected.join(", ") : "Select Property");
        });
    });
    function initMap() {
        var location = { lat: 32.4778975780612, lng: -116.88062589946308 };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: location,
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: "Chichen Itza 8170, Rosarito, Mexico",
        });
    }

    $(document).on("click" , "#btn_submit_contact" , function() {
        var btn = $(this).ladda();
        btn.ladda('start');
        var formData =  new FormData($("#contact_form")[0]);
        $.ajax({
            url:"{{ url('submit_contact') }}",
            type: 'POST',
            data: formData,
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false,
            success:function(status){
                if(status.msg=='success') {
                    toastr.success(status.response,"Success");
                    $('#contact_form')[0].reset();
                    setTimeout(function(){
                        location.reload(true);
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
</script>
@endpush