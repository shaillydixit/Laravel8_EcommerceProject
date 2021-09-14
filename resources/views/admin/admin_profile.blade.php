@extends('admin.master')
@section('content')
<div class="white-box">
    <div class="user-bg"> <img width="100%" alt="user" src="{{asset('backend/plugins/images/large/img1.jpg')}}">
        <div class="overlay-box">
            <div class="user-content">
                <a href="{{route('admin.profile.edit', $adminData->id)}}" class="btn btn-success" style="float: right; margin: 5px 5px;">Edit Profile</a>
                <a href="javascript:void(0)"><img src="{{asset($adminData->profile_photo_path)}}" class="thumb-lg img-circle" alt="img"></a>

                <h4 class="text-white">User Name : {{$adminData->name}} </h4>
                <h5 class="text-white">Email : {{$adminData->email}} </h5>
            </div>
        </div>
    </div>
    <div class="user-btm-box">
        <div class="col-md-4 col-sm-4 text-center">
            <p class="text-purple"><i class="ti-facebook"></i></p>
            <h1>258</h1>
        </div>
        <div class="col-md-4 col-sm-4 text-center">
            <p class="text-blue"><i class="ti-twitter"></i></p>
            <h1>125</h1>
        </div>
        <div class="col-md-4 col-sm-4 text-center">
            <p class="text-danger"><i class="ti-dribbble"></i></p>
            <h1>556</h1>
        </div>
    </div>
</div>
@endsection