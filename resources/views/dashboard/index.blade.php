@extends('layout.layout')
@section('content')

<div class="content center">
    <div class="d-flex justify-content-center align-items-center">
        <div class="title">
            <img src="/img/judiciary-img1.png" alt=""><br />
        </div>
    </div>
    <div>
        {{-- <h4 class='mssg'>{{ session('mssg') }}</h4> --}}
    </div>

</div>


<div class="row">
    <div class="col-md-3">
        <div class="mb-3 text-white card card-body bg-primary">
            <label for="">Today Visitors</label>
            <h1>{{$today_visitor}}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3 text-white card card-body bg-success">
            <label for="">Total Visitors</label>
            <h1>{{$visitor_number}}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3 text-white card card-body bg-danger">
            <label for="">Total Employees</label>
            <h1>{{$employees_number}}</h1>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3 text-white card card-body bg-warning">
            <label for="">Total Departments</label>
            <h1>{{$office_number}}</h1>
        </div>
    </div>
</div>




@endsection


