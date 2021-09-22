@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Coupans</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Coupan Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Coupan Discount</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Validity</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Status</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupans as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->coupan_name}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->coupan_discount}}%</td>
                        <td class="title"><a href="javascript:void(0)"></a>
                            {{Carbon\Carbon::parse($row->coupan_validity)->format('D, d F Y')}}
                        </td>
                        <td class="title"><a href="javascript:void(0)"></a>
                            @if($row->coupan_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                            <span class="badge bage-pill badge-success">Valid</span>
                            @else
                            <span class="badge bage-pill badge-danger">Invalid</span>
                            @endif
                        </td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.coupan', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.coupan', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$coupans->links('vendor.pagination.custom')}}
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Coupan</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.coupan')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Name</label>
                            <input type="text" class="form-control" name="coupan_name" placeholder="Enter coupan name">
                            @error('coupan_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Discount(%)</label>
                            <input type="text" class="form-control" name="coupan_discount" placeholder="Enter coupan discount">
                            @error('coupan_discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupan Validity Date</label>
                            <input type="date" class="form-control" name="coupan_validity" placeholder="Enter coupan validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                            @error('coupan_validity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Coupan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection