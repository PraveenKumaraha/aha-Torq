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
                    <select name="version" id="yearpicker"  class="form-control version" required></select>
                     <span id="error_version" class="has-error"></span>


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
     
        let startYear = 2000;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--)
    {
      $('#yearpicker').append($('<option />').val(i).html(i));
    }

        $('#create').validate({ // <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                model: {
                    required: true,


                },
                brand: {
                    required: true,


                },
                version: {
                    required: true,


                }

            },
            // Messages for form validation
            messages: {
                model: {
                    required: 'Select Model Name'
                },
                brand: {
                    required: 'Select Brand Name'
                },
                version: {
                    required: 'Enter Version Name'
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
                        url: 'carVersions',
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
    });
</script>