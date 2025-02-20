@extends('admin.admin_app')
@section('title', 'Create New Blog')
@push('styles')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
    .unselectable {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
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
        min-height: 500px;
    }
    .plus-icon {
        z-index: 99999;
        background-color: rgba(255, 244, 236, 0.88);
        cursor: pointer;
        position: absolute;
        bottom: 0;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: flex;
        justify-content: center;
        width: 40px;
        padding: 2px;
        height: 40px;
        align-items: center;
        border-radius: 50%;
    }
    .delete-icon {
        z-index: 99999;
        background-color: rgba(255, 255, 255, 0.8);
        cursor: pointer;
        position: absolute;
        bottom: 0;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: flex;
        justify-content: center;
        width: 40px;
        padding: 2px;
        height: 40px;
        align-items: center;
        border-radius: 50%;
    }
    #add-more {
        border: 1px dashed #CE713EFF;
        cursor: pointer;
        border-radius: 5%;
    }
    .trash-icon {
        color: red;
    }
    .trash-icon:hover {
        color: gray;
    }
    .add-icon {
        color: #CE713EFF;
    }
    .add-icon:hover {
        color: gray;
    }
</style>
@endpush
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8 col-sm-8 col-xs-8">
        <h2>Edit Property</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/property-listings') }}">Properties</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Edit Property </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4 col-sm-4 col-xs-4 text-right">
        <a class="btn btn-primary text-white t_m_25" href="{{ url('admin/property-listings') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Properties
        </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active show" data-toggle="tab" href="#tab-1">Property Details</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-2">SEO Details</a></li>
                </ul>
                <form id="property_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$property->id}}" hidden>
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
                                                        <input type="text" name="title" id="title-content" value="{{$property->title}}" placeholder="e.g. Suite 301 – Tower 4" class="form-control">
                                                        {{-- <input type="text" name="slug" value="{{$property->slug}}" id="slug" hidden> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Property URL:</strong>
                                                        <input type="text" name="property_url" id="slug" class="form-control" value="{{$property->slug}}" placeholder="Property URL">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong class="form-label" for="title">Banner Image:</strong>
                                                        <input type="file" name="banner" id="Bannerimage" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>PDF Attachments</strong> <a class="text-navy" style="text-decoration: underline;" id="view_docs" data-toggle="modal" data-target="#add_modalbox">View Existing</a></label>
                                                        <input type="file" name="pdfs[]" class="form-control" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Listing Type</strong></label>
                                                        <select name="listing_type" id="listing_type" class="form-control">
                                                            <option value="1" {{$property->listing_type == 1 ? 'selected' : ''}}>Sale</option>
                                                            <option value="2" {{$property->listing_type == 2 ? 'selected' : ''}}>Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Listing Status</strong></label>
                                                        <select name="listing_status" id="listing_status" class="form-control">
                                                            <option value="1" {{$property->listing_status == 1 ? 'selected' : ''}}>For Sale</option>
                                                            <option value="2" {{$property->listing_status == 2 ? 'selected' : ''}}>For Rent</option>
                                                            <option value="3" {{$property->listing_status == 3 ? 'selected' : ''}}>Rented</option>
                                                            <option value="4" {{$property->listing_status == 4 ? 'selected' : ''}}>Sales Pending</option>
                                                            <option value="5" {{$property->listing_status == 5 ? 'selected' : ''}}>Sold</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row rent_fields">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Date of Availability</strong></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> <input type="text" name="date_available" id="date_available" class="form-control avail_date" value="{{$property->date_available}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Rent Cycle</strong></label>
                                                        <select name="rent_cycle" id="rent_cycle" class="form-control">
                                                            <option value="0" {{$property->rent_cycle == 0 ? 'selected' : ''}}>One Day</option>
                                                            <option value="1" {{$property->rent_cycle == 1 ? 'selected' : ''}}>Monthly</option>
                                                            <option value="2" {{$property->rent_cycle == 2 ? 'selected' : ''}}>Quarterly</option>
                                                            <option value="3" {{$property->rent_cycle == 3 ? 'selected' : ''}}>Semi-Annually</option>
                                                            <option value="4" {{$property->rent_cycle == 4 ? 'selected' : ''}}>Annually</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row sales_feilds">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Property Tax (Yearly)</strong></label>
                                                        <input type="text" class="form-control money" name="property_tax" id="property_tax" value="{{$property->property_tax}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>HOA Fee (Monthly)</strong></label>
                                                        <input type="text" name="hoa_fees" id="hoa_fees" class="form-control money" value="{{$property->hoa_fees}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Price/Rent (USD)</strong></label>
                                                        <input type="text" name="price" class="form-control money" value="{{$property->price}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Agent</strong></label>
                                                        <select name="agent" id="agent" class="select2agents form-control">
                                                            <option value="" selected disabled>Select an option</option>
                                                            @foreach($agents as $agent)
                                                            <option value="{{$agent->id}}" {{$property->agent == $agent->id ? 'selected' : ''}}>{{$agent->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Total Size (sqft)</strong></label>
                                                        <input type="text" name="size" id="size" class="form-control money" value="{{$property->size}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>GLA (Gross Livable Area in sqft)</strong></label>
                                                        <input type="text" name="GLA" id="GLA" class="form-control money" value="{{$property->GLA}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Community</strong></label>
                                                        <select name="neighborhood" id="neighborhood" class="form-control select2">
                                                            @foreach($neighborhoods as $neighborhood)
                                                            <option value="{{$neighborhood->id}}" {{$property->neighborhood_id == $neighborhood->id ? 'selected' : ''}}>{{$neighborhood->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Street Address</strong></label>
                                                        <input type="text" name="address" class="form-control" value="{{$property->address}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Parking Spaces</strong></label>
                                                        <select name="parking_spaces" id="parking_spaces" class="form-control">
                                                            <option value="0" {{$property->parking_spaces == 0 ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{$property->parking_spaces == 1 ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{$property->parking_spaces == 2 ? 'selected' : ''}}>2</option>
                                                            <option value="3" {{$property->parking_spaces == 3 ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{$property->parking_spaces == 4 ? 'selected' : ''}}>4</option>
                                                            <option value="5" {{$property->parking_spaces == 5 ? 'selected' : ''}}>5</option>
                                                            <option value="6" {{$property->parking_spaces == 6 ? 'selected' : ''}}>6</option>
                                                            <option value="7" {{$property->parking_spaces == 7 ? 'selected' : ''}}>7</option>
                                                            <option value="8" {{$property->parking_spaces == 8 ? 'selected' : ''}}>8</option>
                                                            <option value="9" {{$property->parking_spaces == 9 ? 'selected' : ''}}>9</option>
                                                            <option value="10" {{$property->parking_spaces >= 10 ? 'selected' : ''}}>10 or more</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Bedrooms</strong></label>
                                                        <select name="bedrooms" id="bedrooms" class="form-control">
                                                            <option value="0" {{$property->bedrooms == 0 ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{$property->bedrooms == 1 ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{$property->bedrooms == 2 ? 'selected' : ''}}>2</option>
                                                            <option value="3" {{$property->bedrooms == 3 ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{$property->bedrooms == 4 ? 'selected' : ''}}>4</option>
                                                            <option value="5" {{$property->bedrooms == 5 ? 'selected' : ''}}>5</option>
                                                            <option value="6" {{$property->bedrooms == 6 ? 'selected' : ''}}>6</option>
                                                            <option value="7" {{$property->bedrooms == 7 ? 'selected' : ''}}>7</option>
                                                            <option value="8" {{$property->bedrooms == 8 ? 'selected' : ''}}>8</option>
                                                            <option value="9" {{$property->bedrooms == 9 ? 'selected' : ''}}>9</option>
                                                            <option value="10" {{$property->bedrooms >= 10 ? 'selected' : ''}}>10 or more</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Bathrooms</strong></label>
                                                        <select name="bathrooms" id="bathrooms" class="form-control">
                                                            <option value="0" {{$property->bathrooms == 0 ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{$property->bathrooms == 1 ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{$property->bathrooms == 2 ? 'selected' : ''}}>2</option>
                                                            <option value="3" {{$property->bathrooms == 3 ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{$property->bathrooms == 4 ? 'selected' : ''}}>4</option>
                                                            <option value="5" {{$property->bathrooms == 5 ? 'selected' : ''}}>5</option>
                                                            <option value="6" {{$property->bathrooms == 6 ? 'selected' : ''}}>6</option>
                                                            <option value="7" {{$property->bathrooms == 7 ? 'selected' : ''}}>7</option>
                                                            <option value="8" {{$property->bathrooms == 8 ? 'selected' : ''}}>8</option>
                                                            <option value="9" {{$property->bathrooms == 9 ? 'selected' : ''}}>9</option>
                                                            <option value="10" {{$property->bathrooms >= 10 ? 'selected' : ''}}>10 or more</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Development Level</strong></label>
                                                        <select name="dev_lvl" id="dev_lvl" class="form-control">
                                                            <option value="1" {{$property->dev_lvl == 1 ? 'selected' : ''}}>Under Construction</option>
                                                            <option value="2" {{$property->dev_lvl == 2 ? 'selected' : ''}}>Built</option>
                                                            <option value="3" {{$property->dev_lvl == 3 ? 'selected' : ''}}>Under Renovation</option>
                                                            <option value="4" {{$property->dev_lvl == 4 ? 'selected' : ''}}>Renovated</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Year Built</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> <input type="text" name="year_built" id="year_built" class="form-control date money" value="{{$property->year_built}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Listing Date</strong></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" class="form-control full_date" name="listing_date" value="{{ !empty($property->listing_date) ? $property->listing_date : '' }}" placeholder="Listing Date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Builting Type</strong></label>
                                                        <input type="text" name="building_type" class="form-control" value="{{$property->building_type}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Source Link</strong></label>
                                                        <input type="text" name="source_link" class="form-control" value="{{$property->source_link}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal show fade" id="add_modalbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content animated flipInY">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title">PDF Attachments</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <table id="manage_tbl" class="table table-striped table-bordered dt-responsive" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr #</th>
                                                                <th>Document</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php($i = 1)
                                                            @foreach($files as $file)
                                                            <tr class="gradeX">
                                                                <td>{{ $i++ }}</td>
                                                                <td><a href="{{ $file['url'] }}" target="_blank">{{ $file['name'] }}</a></td>
                                                                <td>
                                                                    <button class="btn btn-danger btn-sm btn_delete_file" data-name="{{$file['name']}}" data-text="you want to delete this file?" type="button" data-placement="top" title="Delete">Delete</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @if(count($files) == 0)
                                                            <tr>
                                                                <td colspan="3" class="text-center">No Documents Found</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
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
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"><strong>Latitude</strong></label>
                                                        <input type="text" name="latitude" id="latitude" class="form-control" value="{{$property->lattitude}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label ps-3"><strong>Longitude</strong></label>
                                                        <input type="text" name="longitude" id="longitude" class="form-control" value="{{$property->longitude}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="form-label"><strong>Image Gallery</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row" id="showImgGal">
                                                        @if(!empty($galleries))
                                                        @foreach($galleries as $gallery)
                                                        <div class="col-md-2 col-sm-6 my-2" style="height: 102px;" id="img-gallery">
                                                            <img src="{{$gallery}}" class="img-fluid images-img" style="width: 100%; height: 100%; overflow: contain; border-radius: 5%;" alt="Image View">
                                                            <div class="delete-icon" onclick="deleteImage(this)" data-url="{{$gallery}}" data-id="{{$property->id}}"><i class="fa fa-trash trash-icon"></i></div>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="dropzone col-12" id="myDropzone"></div>
                                                    <input type="text" name="gallery" id="gallery" value="{{$gallery_array}}" hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="form-label"><strong>Short Description</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <textarea name="short_description" id="short_description" class="form-control">{{$property->short_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Property Type</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($types as $type)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label unselectable" for="{{$type->slug}}"> <input class="i-checks {{$type->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$type->slug}}" id="{{$type->slug}}" value="{{$type->id}}" style="position: absolute; opacity: 0;">
                                                            {{$type->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Interior Features</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($interior_features as $feature)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$feature->slug}}"> <input class="i-checks {{$feature->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$feature->slug}}" id="{{$feature->slug}}" value="{{$feature->id}}" style="position: absolute; opacity: 0;">
                                                            {{$feature->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Exterior Finish</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($exterior_finish as $finish)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$finish->slug}}"> <input class="i-checks {{$finish->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$finish->slug}}" id="{{$finish->slug}}" value="{{$finish->id}}" style="position: absolute; opacity: 0;">
                                                            {{$finish->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Featured Amenitis</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($featured_amenities as $amenities)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$amenities->slug}}"> <input class="i-checks {{$amenities->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$amenities->slug}}" id="{{$amenities->slug}}" value="{{$amenities->id}}" style="position: absolute; opacity: 0;">
                                                            {{$amenities->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Appliances</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($appliances as $appliance)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$appliance->slug}}"> <input class="i-checks {{$appliance->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$appliance->slug}}" id="{{$appliance->slug}}" value="{{$appliance->id}}" style="position: absolute; opacity: 0;">
                                                            {{$appliance->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Views</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($views as $view)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$view->slug}}"> <input class="i-checks {{$view->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$view->slug}}" id="{{$view->slug}}" value="{{$view->id}}" style="position: absolute; opacity: 0;">
                                                            {{$view->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Heating</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($heatings as $heating)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$heating->slug}}"> <input class="i-checks {{$heating->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$heating->slug}}" id="{{$heating->slug}}" value="{{$heating->id}}" style="position: absolute; opacity: 0;">
                                                            {{$heating->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Cooling</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($coolings as $cooling)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$cooling->slug}}"> <input class="i-checks {{$cooling->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$cooling->slug}}" id="{{$cooling->slug}}" value="{{$cooling->id}}" style="position: absolute; opacity: 0;">
                                                            {{$cooling->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Roof</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($roofs as $roof)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$roof->slug}}"> <input class="i-checks {{$roof->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$roof->slug}}" id="{{$roof->slug}}" value="{{$roof->id}}" style="position: absolute; opacity: 0;">
                                                            {{$roof->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Sewer-Water System</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($sewer_water_systems as $sewer_water_system)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$sewer_water_system->slug}}"> <input class="i-checks {{$sewer_water_system->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$sewer_water_system->slug}}" id="{{$sewer_water_system->slug}}" value="{{$sewer_water_system->id}}" style="position: absolute; opacity: 0;">
                                                            {{$sewer_water_system->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label"><strong>Extra Features</strong></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @foreach($extra_features as $extra_feature)
                                                    <div class="form-check form-check-inline mx-4 mb-1">
                                                        <label class="form-check-label" for="{{$extra_feature->slug}}"> <input class="i-checks {{$extra_feature->show == 2 ? 'checked' : 'unchecked'}}" type="checkbox" name="{{$extra_feature->slug}}" id="{{$extra_feature->slug}}" value="{{$extra_feature->id}}" style="position: absolute; opacity: 0;">
                                                            {{$extra_feature->title}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 order-lg-2 order-3">
                                            <div class="form-group">
                                                <strong class="form-label" for="description">Description:</strong>
                                                <textarea name="description" class="form-control" id="description">{{$property->description}}</textarea>
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
                                                <input class="form-control" id="meta_title" type="text" name="meta_title" value="{{ $property->meta_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="meta_keywords">Meta keywords:</strong>
                                                <input class="form-control" id="meta_keywords" type="text" name="meta_keywords" value="{{ $property->meta_keywords}}" />
                                                <sub>Add Keywords Separated By Comma, Example: keyword1, keyword2, keyword3</sub>
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="meta_description">Meta Description:</strong>
                                                <textarea class="form-control" id="meta_description" name="meta_description" rows="10">{{ $property->meta_description}}</textarea>
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
                                            <a href="{{ asset('uploads/properties') }}/{{$property->fb_image}}" target="_blank">
                                                <img src="{{ asset('uploads/properties') }}/{{$property->fb_image}}" class="rounded-circle" style="width: 65px; height: 65px;">
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="form-label" for="facebook_meta_title">Facebook Page Title:</strong>
                                                <input class="form-control" id="facebook_meta_title" type="text" name="facebook_meta_title" value="{{ $property->fb_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="facebook_meta_description">Description:</strong>
                                                <textarea class="form-control" id="facebook_meta_description" name="facebook_meta_description" rows="10">{{ $property->fb_description}}</textarea>
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
                                        <div class="col-md-1">
                                            <a href="{{ asset('uploads/properties') }}/{{$property->twitter_image}}" target="_blank">
                                                <img src="{{ asset('uploads/properties') }}/{{$property->twitter_image}}" class="rounded-circle" style="width: 65px; height: 65px;">
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="form-label" for="twitter_meta_title">Twitter Page Title:</strong>
                                                <input class="form-control" id="twitter_meta_title" type="text" name="twitter_meta_title" value="{{ $property->twitter_title}}" />
                                            </div>
                                            <div class="form-group">
                                                <strong class="form-label" for="twitter_meta_description">Description:</strong>
                                                <textarea class="form-control" id="twitter_meta_description" name="twitter_meta_description" rows="10">{{ $property->twitter_description}}</textarea>
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
                                                <textarea class="form-control mt-2" id="json_ld_code" name="json_ld_code" rows="30">{{ $property->json_ld_code}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button_section">
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ url('admin/property-listings') }}" class="btn btn-secondary" role="button"><i class="fa fa-times"></i> Cancel</a>
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
    // var slug = '';
    // $('#title-content').on('input', function() {
    //     var slug = $(this).val().toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
    //     $('#slug').val(slug);
    // });
    $(".select2").select2({
        placeholder: "Select an option",
        allowClear: true
    });
    $(document).ready(function() {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('.unchecked').iCheck('uncheck');
        $('.checked').iCheck('check');
    });
    $(document).ready(function() {
        $('.money').on('input', function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
            if (this.value.indexOf('.') !== -1) {
                this.value = this.value.replace(/\.+$/, '');
                this.value = this.value.replace(/\.(\d{2})\./, '.$1');
            }
        });
    });
    $(document).ready(function() {
        $('.sizemt').on('input', function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
            if (this.value.indexOf('.') !== -1) {
                this.value = this.value.replace(/\.+$/, '');
                this.value = this.value.replace(/\.(\d{2})\./, '.$1');
            }
        });
    });
    $('.date').datepicker({
        startView: 2,
        minViewMode: 2,
        viewMode: "years",
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "yyyy"
    });
    $('.avail_date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        startDate: new Date()
    });
    $('.full_date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    $(".select2").select2({
        placeholder: "Select a Community",
        allowClear: true
    });
    $(".select2agents").select2({
        placeholder: "Select an Agent",
        allowClear: true
    });
</script>
<script src="{{asset('admin_assets/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('admin_assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('admin_assets/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    gallery_array_string = $('#gallery').val();
    gallery_array = gallery_array_string ? JSON.parse(gallery_array_string) : [];
    console.log(gallery_array);
    let myDropzone = new Dropzone("#myDropzone", {
        url: "{{url('/admin/property-listings/imageManagement')}}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            if (response.status === 'success') {
                gallery_array.push(response.image_url);
                console.log(gallery_array);
                $('#gallery').val(JSON.stringify(gallery_array));
                console.log("input: " + $('#gallery').val());
                var img = document.createElement('img');
                img.src = response.image_url;
                img.className = 'img-fluid images-img';
                img.style = 'width: 100%; height: 100%; overflow: contain; border-radius: 5%;';
                img.alt = 'Image View';
                var deleteIcon = document.createElement('div');
                deleteIcon.className = 'delete-icon';
                deleteIcon.onclick = function() {
                    deleteImage(this);
                };
                deleteIcon.setAttribute('data-url', response.image_url);
                deleteIcon.setAttribute('data-id', '{{$property->id}}');
                var icon = document.createElement('i');
                icon.className = 'fa fa-trash trash-icon';
                deleteIcon.appendChild(icon);
                var div = document.createElement('div');
                div.className = 'col-md-2 col-sm-6 my-2';
                div.id = 'img-gallery';
                div.style = 'height: 102px;';
                div.appendChild(img);
                div.appendChild(deleteIcon);
                document.getElementById('showImgGal').appendChild(div);
                myDropzone.removeFile(file);
            } else {
                console.error('Error uploading images');
            }
        }
    });
</script>
<script>
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
</script>
<script>
    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");
        latitude = Number($('#latitude').val());
        longitude = Number($('#longitude').val());
        const myLatlng = {
            lat: latitude,
            lng: longitude
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: myLatlng,
        });
        let infoWindow = new google.maps.InfoWindow({
            content: "Latitude: " + latitude + "</br>Longitude: " + longitude + "</br>Click on the map to select coordinates.",
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
    function deleteImage(e) {
        var id = $(e).data('id');
        var url = $(e).data('url');
        $.ajax({
            url: "{{url('admin/property-listings/delete-image')}}",
            type: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                url: url,
                id: id
            },
            success: function(data) {
                console.log(data);
                if (data.msg == 'success') {
                    $(e).parent().remove();
                    gallery_array = gallery_array.filter(gallery => gallery !== url);
                    $('#gallery').val(JSON.stringify(gallery_array));
                    console.log($('#gallery').val());
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right"
                    }
                    toastr.success(data.response);
                } else {
                    console.log(data);
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right"
                    }
                    toastr.error(data.response);
                }
            },
            error: function(data) {
                console.log(data);
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right"
                }
                toastr.error(data.response);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#listing_type').change(function() {
            if ($(this).val() == 1) {
                $('.rent_fields').hide();
                $('.sales_feilds').show();
                $('#listing_status').html('<option value="1">For Sale</option><option value="4">Sales Pending</option><option value="5">Sold</option>');
                $('#listing_status').val('{{$property->listing_status}}');
            } else {
                $('.rent_fields').show();
                $('.sales_feilds').hide();
                $('#listing_status').html('<option value="2">For Rent</option><option value="3">Rented</option>');
                $('#listing_status').val('{{$property->listing_status}}');
            }
        });
        $('#listing_type').trigger('change');
    });
</script>
<script>
    let editor;
    $(document).ready(function() {
        $(document).on("click", "#btn_create", function() {
            var btn = $(this).ladda();
            btn.ladda('start');
            const descriptionBlogValue = editor.getData();
            $("#description").val(descriptionBlogValue);
            var formData = new FormData($('#property_form')[0]);
            $.ajax({
                url: "{{ url('admin/property-listings/update') }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(status) {
                    if (status.msg == 'success') {
                        toastr.success(status.response, "Success");
                        $("#property_form")[0].reset();
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
                        "url": "https://buyahouseinrosarito.com/public/assets/images/logo.png"
                    }
                },
                "datePublished": new Date().toISOString().split("T")[0],
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": `https://buyahouseinrosarito.com/property/${slug}`
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