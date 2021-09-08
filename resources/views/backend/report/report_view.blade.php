@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Search By Date</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('search.by.date')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Date</label>
                            <input type="date" name="date" class="form-control">
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Search By Month</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('search.by.month')}}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Month</label>
                            <select name="month" class="form-control">
                                <option label="Choose One"></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('month')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Year</label>
                            <select name="year_name" class="form-control">
                                <option label="Choose One"></option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                            @error('year_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Select Year </h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('search.by.year')}}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Year</label>
                            <select name="year" class="form-control">
                                <option label="Choose One"></option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                            @error('year_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection