@extends('admin.admin_app')
@section('title', 'Edit Blog')
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
        <h2>Blogs</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/blogs') }}">Blogs</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Edit Blog: </strong><strong> {{ $blog->title }} </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ route('admin.blogs')}}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Blogs
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Blog Details</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-2">SEO Details</a></li>
                </ul>
                <form id="blog_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blog->id }}">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active show" role="tabpanel">
                            <div class="ibox">
                                {{-- <div class="ibox-title"><h5>Blog Details</h5></div> --}}
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-md-8 order-lg-0 order-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Title:</strong>
                                                        <input class="form-control" id="title" name="title" type="text" value="{{ $blog->title }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Post URL:</strong>
                                                        <input type="text" class="form-control" id="post_url" name="post_url" value="{{ $blog->post_url }}" />
                                                        <span class="text-muted">
                                                            Post URL: <a href="https://buyahouseinrosarito.com/{{$blog->post_url}}" target="_blank"> https://buyahouseinrosarito.com<span id="slug_preview">{{'/'.$blog->post_url}}</span></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="tier">Tier:</strong>
                                                        <select name="tier" class="select2_dropdown select22_dropdown form-control">
                                                            <option value="">Select Tier</option>
                                                            <option value="1" {{ $blog->tier == 1 ? 'selected' : '' }}>
                                                                Tier 1
                                                            </option>

                                                            <option value="2" {{ $blog->tier == 2 ? 'selected' : '' }}>
                                                                Tier 2
                                                            </option>

                                                            <option value="3" {{ $blog->tier == 3 ? 'selected' : '' }}>
                                                                Tier 3
                                                            </option>
                                                            
                                                            <option value="4" {{ $blog->tier == 4 ? 'selected' : '' }}>
                                                                Tier 4
                                                            </option>
                                                            <option value="5" {{ $blog->tier == 5 ? 'selected' : '' }}>
                                                                Tier 5
                                                            </option>
                                                            <option value="6" {{ $blog->tier == 6 ? 'selected' : '' }}>
                                                                Tier 6
                                                            </option>
                                                            <option value="7" {{ $blog->tier == 7 ? 'selected' : '' }}>
                                                                Tier 7
                                                            </option>
                                                            <option value="8" {{ $blog->tier == 8 ? 'selected' : '' }}>
                                                                Tier 8
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="category">Category:</strong>
                                                        <select name="category" class="select2_dropdown form-control">
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $blog->category_id ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="parent_id">Parent Blogs:</strong>
                                                        <select name="parent_id[]" id="parent_id" class="select2_dropdown parent_ids_dropdown form-control w-100" multiple="multiple">
                                                            @foreach($blogs as $item)
                                                            <option value="{{ $item->id }}" {{ in_array($item->id, $parent_ids) ? 'selected' : '' }}>
                                                                {{ $item->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 order-lg-0 order-1">
                                            <div class="form-group">
                                                <strong class="form-label" for="dragArea">Featured Image:</strong>
                                                <div class="drag-area {{ isset($blog->featured_image) ? 'hidden' : '' }}" id="dragArea">
                                                    <input type="file" id="fileInput" name="featured_image" hidden>
                                                </div>
                                                <div class="preview-area {{ isset($blog->featured_image) ? 'shown' : '' }}" id="previewArea">
                                                    <img id="imagePreview" src="{{ isset($blog->featured_image) ? asset('assets/images').'/'.$blog->featured_image : '' }}" alt="Image Preview">
                                                    <div class="action-buttons">
                                                        <a href="{{ isset($blog->featured_image) ? asset('assets/images').'/'.$blog->featured_image : '' }}" target="_blank" class="btn btn-secondary btn-sm" id="viewButton"><i class="fa fa-eye"></i></a>
                                                        <button class="btn btn-danger btn-sm" id="deleteButton"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="form-label" for="short_description">Short Description:</strong>
                                                <textarea name="short_description" class="form-control" id="short_description" rows="5">{{ $blog->short_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="form-label" for="description">Description:</strong>
                                                <textarea name="description" class="form-control" id="description">{{ $blog->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="d-flex align-items-center">
                                                    <input type="checkbox" class="i-checks" id="btn_status" @checked($blog->status == 1) name="status">
                                                    <label class="mx-3 mt-2" for="btn_status">Publish</label>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="d-flex align-items-center">
                                                    <input type="checkbox" class="i-checks" id="btn_crawl" @checked($blog->disable_crawl == 1) id="disable_crawl" name="disable_crawl">
                                                    <label class="mx-3 mt-2" for="btn_crawl">Disable Crawl</label>
                                                </strong>
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
                                                <input class="form-control" id="meta_title" type="text" name="meta_title" value="{{ $blog->meta_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="meta_keywords">Meta keywords:</strong>
                                                <input class="form-control" id="meta_keywords" type="text" name="meta_keywords" value="{{ $blog->meta_keywords}}" />
                                                <sub>Add Keywords Separated By Comma, Example: keyword1, keyword2, keyword3</sub>
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="meta_description">Meta Description:</strong>
                                                <textarea class="form-control" id="meta_description" name="meta_description" rows="5">{{ $blog->meta_description}}</textarea>
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
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <strong class="form-label" for="facebook_meta_image">Image:</strong>
                                                <input class="form-control" id="facebook_meta_image" type="file" name="facebook_meta_image" />
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <a href="{{ asset('assets/images') }}/{{$blog->fb_image}}" target="_blank">
                                                    <img src="{{ asset('assets/images') }}/{{$blog->fb_image}}" class="rounded-circle" style="width: 65px; height: 65px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="form-label" for="facebook_meta_title">Facebook Page Title:</strong>
                                                <input class="form-control" id="facebook_meta_title" type="text" name="facebook_meta_title" value="{{ $blog->fb_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="facebook_meta_description">Description:</strong>
                                                <textarea class="form-control" id="facebook_meta_description" name="facebook_meta_description" rows="5">{{ $blog->fb_description}}</textarea>
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
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <strong class="form-label" for="twitter_meta_image">Image:</strong>
                                                <input class="form-control" id="twitter_meta_image" type="file" name="twitter_meta_image" />
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="{{ asset('assets/images') }}/{{$blog->twitter_image}}" target="_blank">
                                                <img src="{{ asset('assets/images') }}/{{$blog->twitter_image}}" class="rounded-circle" style="width: 65px; height: 65px;">
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="form-label" for="twitter_meta_title">Twitter Page Title:</strong>
                                                <input class="form-control" id="twitter_meta_title" type="text" name="twitter_meta_title" value="{{ $blog->twitter_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="twitter_meta_description">Description:</strong>
                                                <textarea class="form-control" id="twitter_meta_description" name="twitter_meta_description" rows="5">{{ $blog->twitter_description}}</textarea>
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
                                                <textarea class="form-control mt-2" id="json_ld_code" name="json_ld_code" rows="30">{{ $blog->json_ld_code}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button_section">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ route('admin.blogs') }}" class="btn btn-secondary" role="button"><i class="fa fa-times"></i> Cancel</a>
                                    <button id="btn_update" class="btn btn-primary" type="button"><i class="fa fa-plus"></i> Save Changes</button>
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
<script>
    $(document).ready(function() {
        $(".select22_dropdown").select2();

        $(".parent_ids_dropdown").select2({
            placeholder: "Select Parents",
            multiple: true
        });

        $('#post_url').on('keyup', function() {
            var slug = $(this).val();
            $('#slug_preview').text('/' + slug);
        });

        const dragArea = document.getElementById('dragArea');
        const fileInput = document.getElementById('fileInput');
        const previewArea = document.getElementById('previewArea');
        const imagePreview = document.getElementById('imagePreview');
        const viewButton = document.getElementById('viewButton');
        const deleteButton = document.getElementById('deleteButton');
        ['dragenter', 'dragover'].forEach(eventName => {
            dragArea.addEventListener(eventName, (e) => {
                e.preventDefault();
                dragArea.classList.add('dragging');
            });
        });
        ['dragleave', 'drop'].forEach(eventName => {
            dragArea.addEventListener(eventName, (e) => {
                e.preventDefault();
                dragArea.classList.remove('dragging');
            });
        });
        dragArea.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            handleFiles(files);
        });
        dragArea.addEventListener('click', () => {
            fileInput.click();
        });
        fileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.src = e.target.result;
                        viewButton.href = e.target.result;
                        dragArea.style.display = 'none';
                        previewArea.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please upload an image file.');
                }
            });
        }
        deleteButton.addEventListener('click', (e) => {
            e.preventDefault();
            dragArea.style.display = 'block';
            previewArea.style.display = 'none';
            fileInput.value = '';
            imagePreview.src = '';
            viewButton.href = '';
        });
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
        $('#descriptionate').summernote({
            height: 600,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'floatLeft', 'floatRight', 'floatNone']],
                // Add custom buttons for image link and center
                ['custom', ['addImageLink', 'centerImage']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            buttons: {
                // Custom button to add hyperlink to an image
                addImageLink: function(context) {
                    var ui = $.summernote.ui;
                    return ui.button({
                        contents: '<i class="fa fa-link"></i> Add Image Link',
                        tooltip: 'Add Hyperlink to Image',
                        click: function() {
                            var $img = $(context.invoke('editor.getSelectedElements')).filter('img');
                            if ($img.length) {
                                var link = prompt('Enter URL to link the image:');
                                if (link) {
                                    var $anchor = $('<a></a>').attr('href', link).attr('target', '_blank');
                                    $img.wrap($anchor);
                                }
                            } else {
                                alert('Please select an image to add a hyperlink.');
                            }
                        }
                    }).render();
                },
                // Custom button to center align image
                centerImage: function(context) {
                    var ui = $.summernote.ui;
                    return ui.button({
                        contents: '<i class="fa fa-align-center"></i> Center Image',
                        tooltip: 'Center Align Image',
                        click: function() {
                            var $img = $(context.invoke('editor.getSelectedElements')).filter('img');
                            if ($img.length) {
                                $img.css({
                                    'display': 'block',
                                    'margin': '0 auto'
                                });
                            } else {
                                alert('Please select an image to center align.');
                            }
                        }
                    }).render();
                }
            },
            callbacks: {
                // Custom callback for image upload
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });


    });

    $(document).ready(function() {
        $(document).on("click", "#btn_update", function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            // Update CKEditor5 content to textarea
            const descriptionBlogValue = editor.getData();
            $("#description").val(descriptionBlogValue);
            var formData = new FormData($("#blog_form")[0]);
            $.ajax({
                url: "{{ route('admin.blogs.update') }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status.msg == 'success') {
                        toastr.success(status.response, "Success");
                        setTimeout(function() {
                            window.location.href = "{{url('admin/blogs')}}";
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
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on("click", "#btn_load_script", function() {
            const meta_title = document.getElementById("meta_title").value;
            const post_url = document.getElementById("post_url").value;
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
                        "url": "https://buyahouseinrosarito.com/public/assets/images/logo.png"
                    }
                },
                "datePublished": new Date().toISOString().split("T")[0],
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": `https://buyahouseinrosarito.com/${post_url}`
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
                'link', 'insertImage', 'mediaEmbed', 'blockQuote', 'insertTable', '|',
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
        mediaEmbed: {
            previewsInData: true
        },
        htmlSupport: {
            allow: [{
                    name: 'a',
                    attributes: {
                        'rel': true
                    },
                    classes: true,
                    styles: true
                },
                {
                    name: 'iframe',
                    attributes: {
                        src: true,
                        width: true,
                        height: true,
                        allow: true,
                        frameborder: true,
                        allowfullscreen: true
                    },
                    classes: true,
                    styles: true
                }
            ]
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