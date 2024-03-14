@extends('layout.layout')
@section('content')


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


<div class="content">
    <div class="title m-b-md">
        <img src="/img/judiciary-img1.png" alt=""><br />
        <p>Loading...</p>
    </div>
    <div>
        {{-- <h4 class='mssg'>{{ session('mssg') }}</h4> --}}
    </div>
    <a href="{{url('visitors')}}">Approve visitor</a>
</div>

@endsection


