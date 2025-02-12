@extends('admin.admin_app')
@section('title', 'Create New Blog')
@push('styles')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 300px;
    }
</style>
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2>Add New Community</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/communities') }}">Communities</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Add New Community </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/communities') }}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Communities
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Community Details</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-2">SEO Details</a></li>
                </ul>
                <form id="community_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active show" role="tabpanel">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-12 order-lg-0 order-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Title:</strong>
                                                        <input type="text" name="title" id="title-content" placeholder="e.g. Downtown Los Angeles" required class="form-control">
                                                        <input type="text" name="slug" value="" id="slug" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Banner Image:</strong>
                                                        <input type="file" name="banner" id="Bannerimage" required class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="category">Zip Code:</strong>
                                                        <input type="text" name="zip" required class="form-control" placeholder="e.g. 90012">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="parent_id">City/Town:</strong>
                                                        <select name="city" id="cities_select" required class="select2 form-control" style="height: 2.22rem !important;" id="">
                                                            @foreach($cities as $city)
                                                            <option value="{{$city->id}}" {{$city->name == "Rosarito" ? 'selected' : ''}}>{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="form-label"><strong>Location (Select Latitude & Longitude Coordinates By Clicking The Map)</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="map" style="height: 50vh !important;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 order-lg-0 order-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="latitude">Latitude:</strong>
                                                        <input type="text" name="latitude" id="latitude" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="longitude">Longitude:</strong>
                                                        <input type="text" name="longitude" id="longitude" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="form-label" for="description">Description:</strong>
                                                <textarea name="description" class="form-control" id="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane" role="tabpanel">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>SEO Details</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div>
                            </div>

                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Open Graph / Facebook Tags</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div>
                            </div>

                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Twitter Card Tags</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div>
                            </div>
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Structured Data (JSON-LD)</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="form-label" for="json_ld_code">JSON-LD Code:</strong>
                                                <button id="btn_load_script" class="btn btn-secondary" type="button">Load Json</button>
                                                <textarea class="form-control mt-2" id="json_ld_code" name="json_ld_code" rows="30"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button_section">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ url('admin/communities') }}" class="btn btn-secondary" role="button"><i class="fa fa-times"></i> Cancel</a>
                                    <button id="btn_create" class="btn btn-primary btn_create" type="button"><i class="fa fa-plus"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin_assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script>
    var slug = '';
    $(".select2").select2({
        placeholder: "Select an option",
        allowClear: true
    });
    $('#title-content').on('input', function() {
        var slug = $(this).val().toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
        $('#slug').val(slug);
    });
</script>
<script>
    // session errors
    var session = "{{Session::has('error') ? 'true' : 'false'}}";
    if (session == 'true') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        }
        toastr.error("{{Session::get('error')}}");

    }
    var session2 = "{{Session::has('success') ? 'true' : 'false'}}";
    if (session2 == 'true') {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right"
        }
        toastr.success("{{Session::get('success')}}");

    }
</script>
<script>
    //google maps setup
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })
    ({
        key: "AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA",
        v: "weekly"
    });
    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const myLatlng = {
            lat: 32.35269,
            lng: -117.0417087
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: myLatlng,
        });
        let infoWindow = new google.maps.InfoWindow({
            content: "Click on the map to select coordinates.",
            position: myLatlng,
        });
        infoWindow.open(map);
        map.addListener("click", (mapsMouseEvent) => {
            infoWindow.close();
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
            });
            coordinates = mapsMouseEvent.latLng.toJSON();
            infoWindow.setContent(
                "Latitude: " + coordinates.lat + "<br>Longitude: " + coordinates.lng,
            );
            infoWindow.open(map);
            $('#latitude').val(coordinates.lat);
            $('#longitude').val(coordinates.lng);
        });
    }
    initMap();
</script>
<script>
    let editor;
    // submit form data
    $(document).ready(function() {
        $(document).on("click", "#btn_create", function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            const descriptionBlogValue = editor.getData();
            $("#description").val(descriptionBlogValue);
            var formData = new FormData($('#community_form')[0]);
            $.ajax({
                url: "{{ url('admin/communities/store') }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status.msg == 'success') {
                        toastr.success(status.response, "Success");
                        $("#community_form")[0].reset();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (status.msg == 'error') {
                        btn.ladda('stop');
                        toastr.error(status.response, "Error");
                    } else if (status.msg == 'lvl_error') {
                        var message = "";
                        $.each(status.response, function(key, value) {
                            message += value + "<br>";
                        });
                        toastr.error(message, "Error");
                        btn.ladda('stop');
                    } else {
                        console.log(status.response);
                        btn.ladda('stop');
                    }
                }
            });
        });
    });
</script>

<script>
    // JSON Load
    $(document).ready(function() {
        $(document).on("click", "#btn_load_script", function() {
            const title = document.getElementById("title-content").value;
            const meta_title = document.getElementById("meta_title").value;
            const meta_description = document.getElementById("meta_description").value;
            const slug = document.getElementById("slug").value;
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
                    "@id": `https://buyahouseinrosarito.com/community/${slug}`
                }
            };
            const jsonLdString = JSON.stringify(updatedJsonLd, null, 2);
            const scriptBlock = `${jsonLdString}`;
            const textareaElement = document.getElementById("json_ld_code");
            textareaElement.value = scriptBlock;
        });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/super-build/ckeditor.js"></script>

<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
        ckfinder: {
            uploadUrl: "{{ url('admin/ckeditor-upload').'?_token='.csrf_token() }}"
        },
        toolbar: {
            items: [
                'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'underline', 'code', 'removeFormat', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', '|',
                'specialCharacters', '|',
                'sourceEditing'
            ],
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        placeholder: 'Enter Description Here!',

        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },

        link: {
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    callback: () => true,
                    label: 'Open in new tab',
                    attributes: {
                        target: '_blank'
                    }
                },
                openInSameTab: {
                    mode: 'manual',
                    label: 'Open in same tab',
                    attributes: {
                        target: '_self'
                    }
                },
                addNoFollow: {
                    mode: 'manual',
                    label: 'Add nofollow',
                    attributes: {
                        rel: 'nofollow'
                    }
                },
                removeNoFollow: {
                    mode: 'manual',
                    label: 'Remove nofollow',
                    attributes: {
                        rel: null
                    }
                }
            }
        },

        htmlSupport: {
            allow: [{
                name: 'a',
                attributes: {
                    'rel': true
                },
                classes: true,
                styles: true
            }]
        },

        removePlugins: [
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            'MathType',
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced'
        ]
    }).then(newEditor => {
        editor = newEditor;
    });
</script>
@endpush