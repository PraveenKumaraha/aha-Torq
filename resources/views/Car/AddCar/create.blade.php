<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
<div id="status"></div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <label for=""> Brand </label>
                    <select name="brand" id="brand" class="form-control brand" required>
                        <option value="">Select Brand</option>
                        @foreach($brandLists as $brandList)
                        <option value="<?php echo $brandList->id; ?>"><?php echo $brandList->brand_name; ?></option>
                        @endforeach
                    </select>
                    <span id="error_brand" class="has-error"></span>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <label for=""> Model </label>
                    <select name="model" id="model" class="form-control model" required>

                    </select>
                    <span id="error_model" class="has-error"></span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <label for=""> Version </label>
                    <select name="version" id="version" class="form-control version" required>
                        
                    </select>
                    <span id="error_brand" class="has-error"></span>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <label for=""> Body Type</label>
                    <select name="body" id="body" class="form-control body" required>
                        <option value="">Select Body Type</option>
                        @foreach($bodyLists as $bodyList)
                        <option value="<?php echo $bodyList->id; ?>"><?php echo $bodyList->name; ?></option>
                        @endforeach
                    </select>
                    <span id="error_model" class="has-error"></span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <label for="">Fuel Type</label>
                    <select name="fuel" id="fuel" class="form-control fuel" required>
                        <option value="">Select Fuel Type</option>
                        @foreach($fuelLists as $fuelList)
                        <option value="<?php echo $fuelList->id; ?>"><?php echo $fuelList->name; ?></option>
                        @endforeach
                    </select>
                    <span id="error_brand" class="has-error"></span>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <label for="">Transmission</label>
                    <select name="transmission" id="transmission" class="form-control transmission" required>
                        <option value="">Select Transmission</option>
                        @foreach($transmissionLists as $transmissionList)
                        <option value="<?php echo $transmissionList->id; ?>"><?php echo $transmissionList->name; ?></option>
                        @endforeach
                    </select>
                    <span id="error_model" class="has-error"></span>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <label for="">Car Price</label>
                    <input type="number" class="form-control" id="car_price" name="car_price" value="" placeholder="" required>
                    <span id="error_brand" class="has-error"></span>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <label for="">Car Default Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" placeholder="" required>
                    <span id="error_model" class="has-error"></span>
                </div>
            </div>
        </div>
        <br>

        

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
                name: {
                    required: true,


                }
            },
            // Messages for form validation
            messages: {
                name: {
                    required: 'Enter Name'
                }
            },
            submitHandler: function(form) {

                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);


                swal({
                    title: "Confirm to Submit Car Brand",
                    text: "Add Car Brand",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Create!"
                }, function() {

                    $.ajax({
                        url: 'carBrands',
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