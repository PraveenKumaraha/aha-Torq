<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="status"></div>
    {{method_field('PATCH')}}
    <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-10 col-sm-12">
                <label for=""> Brand </label>
                <select name="brand" id="brand" class="form-control" required>
                    <option value="">Select Brand</option>
                    @foreach($brandLists as $brandList)
                    <option value="<?php echo $brandList->id; ?>"<?php echo ($brandList->id==  $bike_model->brand_id) ? ' selected="selected"' : '';?>><?php echo $brandList->brand_name; ?></option>
                    @endforeach
                </select>
                <span id="error_Brand" class="has-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-10 col-sm-12">
                <label for="">Model Name </label>
                <input type="text" class="form-control" id="model-name" name="bike_model" value="{{ $bike_model->bike_model }}" placeholder="" required>
                <span id="error_name" class="has-error"></span>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

        <div class="form-group col-md-4">
            <label for=""> Status </label><br />
            <input type="radio" name="status" class="flat-green" value="1" {{ ( $bike_model->status == 1 ) ? 'checked' : '' }} /> Active
            <input type="radio" name="status" class="flat-green" value="0" {{ ( $bike_model->status == 0 ) ? 'checked' : '' }} /> In Active
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-md-12 mb-3 mt-3">
            <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>
<script>
    $('input[type="radio"].flat-green').iCheck({
        radioClass: 'iradio_flat-green'
    });
    $('.button-submit').click(function() {
        // route name and record id
        ajax_submit_update('bikeModels', "{{ $bike_model->id }}")
    });
</script>