@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="white-box">
    <div class="tab-content">
        <div class="tab-pane active" id="settings">
        <form method="post" action="{{ route('update.change.password') }}">
	 	@csrf
               
                <div class="form-group">
		<h5>Current Password  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="current_password" name="oldpassword" class="form-control" required="" > </div>
	</div>


	<div class="form-group">
		<h5>New Password  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="password" name="password" class="form-control" required="" > </div>
	</div>



	<div class="form-group">
		<h5>Confirm Password  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" > </div>
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

@endsection