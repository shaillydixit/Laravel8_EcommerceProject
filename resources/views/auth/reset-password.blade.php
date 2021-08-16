@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Reset Password</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->

    <!--start shop cart-->
    <section class="">
        <div class="container">
            <div class="authentication-reset-password d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-5 border-end">
                                    <div class="card-body">
                                        <div class="p-5">
                                            <h4 class="font-weight-bold">Genrate New Password</h4>
                                            <p class="">We received your reset password request. Please enter your new password!</p>
                                            <form method="POST" action="{{ route('password.update') }}">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-dark">Reset Password</button>
                                                    <a href="{{asset('login')}}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <img src="{{asset('frontend/assets/images/login-images/forgot-password-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection