@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Add Product</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form method="POST" action="{{route('update.product', $products->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" name="product_name" id="product_name" class="form-control" required="" value="{{$products->product_name}}">
                                        @error('product_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Code <span class="text-danger">*</span></label>
                                        <input type="text" name="product_code" id="product_code" class="form-control" required="" value="{{$products->product_code}}">
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
                                                <option value="{{$category->id}}" {{$category->id == $products->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
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
                                                @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{$subcategory->id == $products->subcategory_id ? 'selected' : ''}}>{{$subcategory->subcategory_name}}</option>
                                                @endforeach
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
                                                @foreach($subsubcategories as $subsubcategory)
                                                <option value="{{$subsubcategory->id}}" {{$subsubcategory->id == $products->subsubcategory_id ? 'selected' : ''}}>{{$subsubcategory->subsubcategory_name}}</option>
                                                @endforeach
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
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id == $products->brand_id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
                                                @endforeach
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
                                        <input type="text" name="product_quantity" id="product_quantity" class="form-control" required="" value="{{$products->product_quantity}}">
                                        @error('product_quantity')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Color <span class="text-danger">*</span></label>
                                        <div class="tags-default">
                                            <input type="text" data-role="tagsinput" name="product_color" class="form-control" required="" value="{{$products->product_color}}">
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
                                            <input type="text" data-role="tagsinput" name="product_tags" class="form-control" required="" value="{{$products->product_tags}}">
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
                                            <input type="text" data-role="tagsinput" name="product_size" class="form-control" required="" value="{{$products->product_size}}">
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
                                        <input type="text" name="selling_price" id="selling_price" class="form-control" required="" value="{{$products->selling_price}}">
                                        @error('selling_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Discount Price</label>
                                        <input type="text" name="discount_price" id="discount_price" class="form-control" value="{{$products->discount_price}}">
                                        @error('discount_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="white-box">
                                            <label class="control-label">Product Thumbnail <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" data-max-file-size="2M" name="product_thumbnail" value="{{$products->product_thumbnail}}" onchange="mainThumbUrl(this)" />
                                            <img src="{{asset($products->product_thumbnail)}}" id="mainThumb" style="width:130px; height:100px;">
                                            @error('product_thumbnail')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Short Description</label>
                                        <textarea id="editor1" name="short_description" rows="5" cols="80">
                                            {!!$products->short_description!!}
                                        </textarea>
                                        @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Long Description</label>
                                        <textarea id="editor2" name="long_description" rows="5" cols="80">
                                        {!!$products->long_description!!}
                                        </textarea>
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
                                            <input id="checkbox2" type="checkbox" name="hot_deals" value="1" {{$products->hot_deals == 1 ? 'checked' : ''}}>
                                            <label for="checkbox2">Hot Deals</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox3" type="checkbox" name="featured" value="1" {{$products->featured == 1 ? 'checked' : ''}}>
                                            <label for="checkbox3">Featured</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-info">
                                            <input id="checkbox4" type="checkbox" name="special_deals" value="1" {{$products->special_deals == 1 ? 'checked' : ''}}>
                                            <label for="checkbox4">Special Deals</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-warning">
                                            <input id="checkbox5" type="checkbox" name="special_offer" value="1" {{$products->special_offer == 1 ? 'checked' : ''}}>
                                            <label for="checkbox5">Special Offer</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="form-actions text-center">
                    <input type="submit" class="btn btn-rounded btn-info" value="Update Product Details">
                </div>
                </form>
            </div>

            <div class="box bt-3 border-info">
                <div class="box-header">
                    <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                </div>
                <form method="POST" action="{{route('update.product.image')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <div class="row row-sm">
                        @foreach($multiImgs as $img)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{route('product.multiimage.delete', $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                    </h5>
                                    <p class="card-text">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="multi_img[{{$img->id}}]">
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-actions text-center">
                        <input type="submit" class="btn btn-rounded btn-info" value="Update Product Multi Images">
                    </div>
                    <br><br>
                </form>
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