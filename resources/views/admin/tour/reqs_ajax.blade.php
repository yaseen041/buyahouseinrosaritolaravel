<div>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Contact Request</h5>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Name</strong></label>
            <div class="col-sm-8">
                <p>{{$req['name']}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-8">
                <p>{{$req['email']}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Phone</strong></label>
            <div class="col-sm-8">
                <p>{{$req['phone']}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Time</strong></label>
            <div class="col-sm-8">
                <p>{{$req['date']}} {{$req['time']}} Hrs</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Type</strong></label>
            <div class="col-sm-8">
                <p>{{$req['type'] == 1 ? 'In Person' : 'Vritual'}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Property</strong></label>
            <div class="col-sm-8">
                <a href="{{url('admin/property-listings/details/' . $property['id'])}}" target="_blank">{{$property['title']}}</a> <br>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label"><strong>Message</strong></label>
            <div class="col-sm-8">
                <p>{{$req['message']}}</p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
    </div>