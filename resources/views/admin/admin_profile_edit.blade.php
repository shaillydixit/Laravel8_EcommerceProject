@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="white-box">
    <div class="tab-content">
        <div class="tab-pane active" id="settings">
            <form class="form-horizontal form-material" method="POST" action="{{route('admin.profile.update', $editdata->id)}}">
                @csrf
                <input type="hidden" name="old_image" value="{{$editdata->profile_photo_path}}">
                <div class="form-group">
                    <label class="col-md-12">Name</label>
                    <div class="col-md-12">
                        <input type="text" name="name" id="name" class="form-control form-control-line" value="{{$editdata->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" name="email" id="email" class="form-control form-control-line" value="{{$editdata->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" name="phone" id="phone" class="form-control form-control-line" value="{{$editdata->phone}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Image</label>
                    <div class="col-md-6">
                        <input type="file" name="profile_photo_path" class="form-control" id="image">
                    </div>
                    <div class="col-md-6">
                        <img id="showImage" src="{{(!empty($adminData->profile_photo_path)) ? url('upload/admin_images/' .$adminData->profile_photo_path) : url('upload/no_image.jpg')}}" style="width: 100px; height: 100px;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection