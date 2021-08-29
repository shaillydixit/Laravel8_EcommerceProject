@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit Coupan</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.coupan',$coupans->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Name</label>
                            <input type="text" class="form-control" name="coupan_name" value="{{$coupans->coupan_name}}">
                            @error('coupan_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Discount(%)</label>
                            <input type="text" class="form-control" name="coupan_discount" value="{{$coupans->coupan_discount}}">
                            @error('coupan_discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Validity Date</label>
                            <input type="date" class="form-control" name="coupan_validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{$coupans->coupan_validity}}">
                            @error('coupan_validity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Edit Coupan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection