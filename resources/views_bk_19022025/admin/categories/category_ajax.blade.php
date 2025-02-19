<div>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Edit Category</h5>
    </div>
    <div class="modal-body">
        <form id="edit_category_form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"><strong>Parent Category</strong></label>
                <div class="col-sm-8">
                    <select name="parent_category" class=" w-100 form-control">
                        <option value="">Select Parent Category</option>
                        @foreach($categories as $item)
                        <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                            {{ $item->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"><strong>Category Title</strong></label>
                <div class="col-sm-8">
                    <input type="text" name="title" required class="form-control" value="{{ $category->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"><strong>Slug</strong></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="slugger" name="slug" value="{{ $category->slug }}" />
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_category">Save Changes</button>
    </div>
</div>

<script>
    $('#slugger').on('input', function() {
        var slugger = $(this).val().toLowerCase().replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
        $('#slugger').val(slugger);
    });
</script>