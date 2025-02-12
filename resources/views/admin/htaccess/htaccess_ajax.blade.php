<div>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Edit Htaccess</h5>
    </div>
    <div class="modal-body">
        <form id="edit_testimonial_form" method="post">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{ $htaccess['id'] }}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"><strong>Content</strong></label>
                <div class="col-sm-8">
                    <textarea name="content" class="form-control" required>{{ $htaccess['content'] }}</textarea>
                </div>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_testimonial_button">Save Changes</button>
    </div>