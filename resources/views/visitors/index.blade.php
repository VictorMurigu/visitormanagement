@extends('layout.layout')
@section('content')
<h2 class="mt-3">Visitor Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Visitor Management</li>
    </ol>
</nav>

{{-- Search-bar --}}



<div class="row">
    <div class="">
        <div class="card-header">
            <form action="{{url('visitors/search')}}" class="form-inline my-2 my-lg-0 float-end"
                style='display:flex;width:330px' type="get">
                <input type="search" class="form-control" name='query' placeholder="search...">
                <button type="submit" class="btn btn-primary  float-end">search</button>
            </form>
        </div>
    </div>
</div>




{{-- <div class=" row ">
    <div class="form-control float-right">
        <div class="card-header">
            <form action="get" action="{{url('/search')}}">
                <input type="search" class="form-control float-end" name="search" style='width:330px'
                    placeholder='search...'>
                <button type="submit" class="btn btn-primary float-end">Search</button>
            </form>
        </div>
    </div>
</div> --}}


<div class="mt-4 mb-4 ">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-8">Visitor Management
                </div>
                <div class="col col-md-2">
                    <a href="{{url('visitors/create')}}" class='btn btn-success float-end'>Add Visitor</a>
                </div>
            </div>
        </div>
        {{-- {{$timeCreated}} --}}
        <div class="card-body">
            <div class="table-responsive  mt-5 ">
                <table class="table table-bordered table-striped" id="visitor_table">
                    <thead>
                        <tr>
                            <th>Visitor Name</th>
                            <th>Visitor_Meet_Person_Name</th>
                            <th>Department</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Status</th>
                            <th>Enter By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitor as $visitor )
                        <tr>
                            <td>{{$visitor->visitor_name}}</td>
                            <td>{{$visitor->visitor_meet_person}}</td>
                            <td>{{$visitor->visitor_department}}</td>
                            <td>{{ $visitor->visitor_enter_time == '0000-00-00 00:00:00' ? 'n/a' : date('M j, Y, g:i a', strtotime($visitor->visitor_enter_time))}}</td>
                            <td>{{empty($visitor->visitor_out_time) ? '--' : date('M j, Y, g:i a', strtotime($visitor->visitor_out_time)) ?? 'n/a'}}</td>
                            <td>
                                @if ($visitor->visitor_status)
                                <button class='mx-2 my-2 btn btn-success ms-1 px-3'>IN</button>
                                @else
                                <button class='  my-2 btn btn-danger ms-1 px-2'>OUT</button>
                                @endif
                            <td>{{$visitor->visitor_enter_by}}</td>
                            <td>
                                <a href="{{url('visitors/'.$visitor->id.'/status')}}" class='btn btn-primary'>Status</a>
                                <a href="{{url('visitors/'.$visitor->id.'/edit')}}" class='btn btn-success'>Edit</a>
                                <a href="{{url('visitors/'.$visitor->id.'/delete')}}"
                                    onclick="confirm('Are you sure you want to delete office')"
                                    class='btn btn-danger'>Delete</a>

                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
