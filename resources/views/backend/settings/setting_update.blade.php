@extends('admin.master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title m-b-2">Website Settings</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.settings')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $setting->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Logo</label>
                            <input type="file" class="form-control" name="logo" onchange="mainImage(this)">
                            <img src="" id="mainImg">
                            @error('logo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name">
                            @error('company_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Address</label>
                            <input type="text" class="form-control" name="company_address" id="company_address">
                            @error('company_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number 1</label>
                            <input type="text" class="form-control" name="phone_one" id="phone_one">
                            @error('phone_one')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number 2</label>
                            <input type="text" class="form-control" name="phone_two" id="phone_two">
                            @error('phone_two')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email ID</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Working Days</label>
                            <input type="text" class="form-control" name="working_days" id="working_days">
                            @error('working_days')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook">
                            @error('facebook')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="twitter">
                            @error('twitter')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">LinkedIn</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin">
                            @error('linkedin')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Youtube</label>
                            <input type="text" class="form-control" name="youtube" id="youtube">
                            @error('youtube')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Change Website Settings">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function mainImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainImg').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection