<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="modal-body row">
      
        <div class="col-md-6">
            <div class="form-row">
            <label for=""> Brand </label>
            <select name="brand" id="brand" class="form-control" required>
                <option value="">Select Brand</option>
                @foreach($brandLists as $brandList)
                <option value="<?php echo $brandList->id; ?>"><?php echo $brandList->brand_name; ?></option>
                @endforeach
            </select>
            <span id="error_Brand" class="has-error"></span>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-row">
                <div class="form-group col-md-10 col-sm-12">
                    <label for=""> Model Name </label>
                    <input type="text" class="form-control" id="model_name" name="model_name" value="" placeholder="" autocomplete="off" required>
                    <span id="error_model_name" class="has-error"></span>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="form-group col-md-12">

            <button type="submit" id="create1" class="btn btn-success button-submit" data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>

</form>


<script type="text/javascript">
    $(document).ready(function() {
        $('#create').validate({ // <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                model_name: {
                       required: true,


                }, Brand: {
                       required: true,


                }

            },
            // Messages for form validation
            messages: {
                model_name: {
                    required: 'Enter Model Name'
                },
                Brand: {
                    required: 'Select Model Name'
                }
            },
            submitHandler: function(form) {

                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);


                swal({
                    title: "Confirm to Submit Car Model",
                    text: "Add Car Model",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Create!"
                }, function() {

                    $.ajax({
                        url: 'carModels',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {

                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully done!", "success");
                                reload_table();
                                notify_view(data.type, data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({
                                    scrollTop: 0
                                }, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal

                            } else if (data.type === 'error') {
                                if (data.errors) {
                                    $.each(data.errors, function(key, val) {
                                        $('#error_' + key).html(val);
                                    });
                                }
                                $("#status").html(data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                swal("Error sending!", "Please try again", "error");

                            }

                        }
                    });
                });

            }
            // <- end 'submitHandler' callback
        });
    });
</script>