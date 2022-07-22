<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="modal-body row">
        <div class="col-md-6">
            <div class="form-row">
                <div class="form-group col-md-9 col-sm-12">
                    <label for=""> Name </label>
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="" required>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="col-md-9 mb-3">
                    <label for="photo">Logo (File must be jpg, jpeg, png)</label>
                    <div class="input-group">
                        <input id="photo" type="file" name="photo" style="display:none" id="image">
                        <div class="input-group-prepend">
                            <a class="btn btn-secondary text-white" onclick="$('input[id=photo]').click();">Browse</a>
                        </div>
                        <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="" readonly>
                        <input type="hidden" name="croppedImage" class="form-control" id="croppedImage" value="" readonly>
                    </div>
                    <script type="text/javascript">
                        $('input[id=photo]').change(function() {
                            $('#SelectedFileName').val($(this).val());
                        });
                    </script>
                    <span id="error_photo" class="has-error"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">


            <div id="upload-demo"></div>


        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <div class="form-check">
                <input type="checkbox" class="form-check-input check1" id="check1" name="option1" value="something" disabled>
                <label class="form-check-label" for="check1">All Ok</label>
            </div>
            <br>
            <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..." disabled><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div>
    <!-- <div class="form-row">
        <div class="form-group col-md-9 col-sm-12">
            <label for=""> Title </label>
            <input type="text" class="form-control" id="title" name="title" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="form-group col-md-3 col-sm-12">
            <label for=""> Category </label>
            <select name="category" id="category" class="form-control" required>
                <option value="Notice Board">Notice Board</option>
                <option value="Latest News">Latest News</option>
                <option value="Job News">Job News</option>
            </select>
            <span id="error_category" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12 col-sm-12">
            <label for=""> Description </label>
            <textarea type="text" class="form-control" id="description" name="description" value="" placeholder=""></textarea>
            <span id="error_description" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 mb-3">
            <label for="photo">Logo (File must be jpg, jpeg, png)</label>
            <div class="input-group">
                <input id="photo" type="file" name="photo" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-secondary text-white" onclick="$('input[id=photo]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="" readonly>
            </div>
            <script type="text/javascript">
                $('input[id=photo]').change(function() {
                    $('#SelectedFileName').val($(this).val());
                });
            </script>
            <span id="error_photo" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
            </button>
        </div>
    </div> -->
</form>


<script type="text/javascript">
    $(document).ready(function() {
        $('.button-submit').click(function() {
            // route name
            ajax_submit_store('blogs')
        });
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' } 
                width: 250,
                height: 250,
                type: 'square' //square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#photo').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function() {

                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('.check1').removeAttr("disabled");
        });


        $('.check1').change(function() {
            $('.button-submit').attr("disabled", true);
            if ($(this).is(":checked")) {
                $('.button-submit').removeAttr("disabled");

                resize.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(img) {
                    console.log("Goood");
                    console.log(img);
                    $('#croppedImage').val(img);
                    
                });
            }
            console.log("well");
            // $('#textbox1').val($(this).is(':checked'));        
        });
    });
</script>