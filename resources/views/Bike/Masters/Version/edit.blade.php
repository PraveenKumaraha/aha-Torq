<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="status"></div>
    {{method_field('PATCH')}}
    <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-10 col-sm-12">
                <label for=""> Brand </label>
                <select name="brand" id="brand" class="form-control brand" required>
                    <option value="">Select Brand</option>
                    @foreach($brandLists as $brandList)
                    <option value="<?php echo $brandList->id; ?>" <?php echo ($brandList->id ==  $brand_id) ? ' selected="selected"' : ''; ?>><?php echo $brandList->brand_name; ?></option>
                    @endforeach
                </select>
                <span id="error_Brand" class="has-error"></span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-10 col-sm-12">
                <label for=""> Model </label>
                <select name="model" id="model" class="form-control model" required>
                    <option value="">Select Model</option>
                    @foreach($modelLists as $modelList)
                    <option value="<?php echo $modelList->id; ?>" <?php echo ($modelList->id ==  $datas->model_id) ? ' selected="selected"' : ''; ?>><?php echo $modelList->model_name; ?></option>
                    @endforeach
                </select>
                <span id="error_Brand" class="has-error"></span>
            </div>
        </div>
    </div>
    <input type="hidden" class="form-control versionData" id="versionData" name="version" value="{{ $datas->version }}" placeholder="" required>

    <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-10 col-sm-12">
                <label for=""> Version </label>
                <select name="version" id="yearpicker" class="form-control version" required></select>
                <span id="error_version" class="has-error"></span>
            </div>

        </div>
    </div>


    <div class="form-group col-md-4">
        <label for=""> Status </label><br />
        <input type="radio" name="status" class="flat-green" value="1" {{ ( $datas->status == 1 ) ? 'checked' : '' }} /> Active
        <input type="radio" name="status" class="flat-green" value="0" {{ ( $datas->status == 0 ) ? 'checked' : '' }} /> In Active
    </div>

    <div class="clearfix"></div>
    <div class="form-group col-md-12 mb-3 mt-3">
        <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
        </button>
    </div>
    </div>
</form>
<script>
    $(document).ready(function() {

        let versionData = $('.versionData').val();
        console.log(versionData);
        let startYear = 2000;
        let endYear = new Date().getFullYear();
        for (i = endYear; i > startYear; i--) {
            $('#yearpicker').append($('<option />').val(i).html(i));
            $("#yearpicker").val(versionData);
        }
    });
    $('input[type="radio"].flat-green').iCheck({
        radioClass: 'iradio_flat-green'
    });
    $('.button-submit').click(function() {
        // route name and record id
        ajax_submit_update('carVersions', "{{ $datas->id }}")
    });
    $('.brand').on('change', function() {
        var idBrand = this.value;

        $(".model").html('');
        $.ajax({
            url: "{{url('admin/allCarModelsByBrandId')}}",
            type: "POST",
            data: {
                brand_id: idBrand,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {

                $('.model').html('<option value="">Select Model</option>');
                $.each(result, function(key, value) {
                    $(".model").append('<option value="' + value
                        .id + '">' + value.model_name + '</option>');
                });

            }
        });
    });
</script>