<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="status"></div>
    {{method_field('PATCH')}}
    <div class="form-row">
        <div class="form-group col-md-9 col-sm-12">
            <label for=""> Name </label>
            <input type="text" class="form-control" id="name" name="brand_name" value="{{ $bikeBrand->brand_name }}"
                   placeholder="" required>
            <span id="error_name" class="has-error"></span>
        </div>
     
        <div class="clearfix"></div>
       
        <div class="form-group col-md-4">
            <label for=""> Status </label><br/>
            <input type="radio" name="status" class="flat-green"
                   value="1" {{ ( $bikeBrand->status == 1 ) ? 'checked' : '' }} /> Active
            <input type="radio" name="status" class="flat-green"
                   value="0" {{ ( $bikeBrand->status == 0 ) ? 'checked' : '' }}/> In Active
        </div>
      
        <div class="clearfix"></div>
        <div class="form-group col-md-12 mb-3 mt-3">
            <button type="submit" class="btn btn-success button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
</form>
<script>
    $('input[type="radio"].flat-green').iCheck({
        radioClass: 'iradio_flat-green'
    });
    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('bikeBrands', "{{ $bikeBrand->id }}")
    });
</script>