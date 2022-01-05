@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Add Product</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" name="product_name" id="product_name" class="form-control" required="">
                                        @error('product_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Code <span class="text-danger">*</span></label>
                                        <input type="text" name="product_code" id="product_code" class="form-control" required="">
                                        @error('product_code')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Select Category <span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--select category--</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Select SubCategory <span class="text-danger">*</span></label>
                                            <select name="subcategory_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--select subcategory--</option>
                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Select SubSubCategory <span class="text-danger">*</span></label>
                                            <select name="subsubcategory_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--select subcategory--</option>
                                            </select>
                                            @error('subsubcategory_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label">Select Brand <span class="text-danger">*</span></label>
                                            <select name="brand_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--select brand--</option>
                                            </select>
                                            @error('brand_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Quantity <span class="text-danger">*</span></label>
                                        <input type="text" name="product_quantity" id="product_quantity" class="form-control" required="">
                                        @error('product_quantity')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Color <span class="text-danger">*</span></label>
                                        <div class="tags-default">
                                            <input type="text" data-role="tagsinput" name="product_color" class="form-control" required="" value="red,blue,black">
                                        </div>
                                        @error('product_color')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Tags <span class="text-danger">*</span></label>
                                        <div class="tags-default">
                                            <input type="text" data-role="tagsinput" name="product_tags" class="form-control" required="" value="jQuery,Script,Net">
                                        </div>
                                        @error('product_tags')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Size <span class="text-danger">*</span></label>
                                        <div class="tags-default">
                                            <input type="text" data-role="tagsinput" name="product_size" class="form-control">
                                        </div>
                                        @error('product_size')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Selling Price <span class="text-danger">*</span></label>
                                        <input type="text" name="selling_price" id="selling_price" class="form-control" required="">
                                        @error('selling_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Discount Price</label>
                                        <input type="text" name="discount_price" id="discount_price" class="form-control">
                                        @error('discount_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="white-box">
                                            <label class="control-label">Product Thumbnail <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" data-max-file-size="2M" name="product_thumbnail" required="" onchange="mainThumbUrl(this)" />
                                            <img src="" id="mainThumb">
                                            @error('product_thumbnail')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="white-box">
                                            <label class="control-label">Product Images <span class="text-danger">*</span></label>
                                            <input type="file" name="multi_img[]" class="form-control" required="" multiple="" id="multiImg">
                                            @error('multi_img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div class="row" id="preview_img"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Short Description</label>
                                        <textarea id="editor1" name="short_description" rows="5" cols="80"></textarea>
                                        @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Long Description</label>
                                        <textarea id="editor2" name="long_description" rows="5" cols="80"></textarea>
                                        @error('long_description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox2" type="checkbox" name="hot_deals" value="1">
                                            <label for="checkbox2">Hot Deals</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox3" type="checkbox" name="featured" value="1">
                                            <label for="checkbox3">Featured</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-info">
                                            <input id="checkbox4" type="checkbox" name="special_deals" value="1">
                                            <label for="checkbox4">Special Deals</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-warning">
                                            <input id="checkbox5" type="checkbox" name="special_offer" value="1">
                                            <label for="checkbox5">Special Offer</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="white-box">
                                        <label class="control-label">Upload Products <span class="text-danger">pdf,xlx,csv</span></label>
                                        <input type="file" class="form-control" name="digital_file" id="digital_file" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-actions text-center">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- for thumbnail show image -->
<script type="text/javascript">
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- for multi image show -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

<!-- brand data show as category selected -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{url('/category/brand/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="brand_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="brand_id"]').append('<option value = "' + value.id + '">' +
                                value.brand_name + '</option')
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{url('/category/subcategory/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name ="subcategory_id"]').append('<option value="' + value.id + '">' +
                                value.subcategory_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{url('/category/subsubcategory/ajax')}}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name ="subsubcategory_id"]').append('<option value ="' + value.id + ' ">' +
                                value.subsubcategory_name + '</option>')
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection