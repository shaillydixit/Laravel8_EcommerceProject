@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <br><br><br>
                    <div class="error-body text-center">
                        <h1>404</h1>
                        <h3 class="text-uppercase">Page Not Found !</h3>
                        <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
                        <a href="{{url('/')}}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a>
                    </div>
                    <br><br><br>
                </div>

            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection