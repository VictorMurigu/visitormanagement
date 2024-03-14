@extends('layout.layout')
@section('content')
<h2 class="mt-3">Employee Management</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Visitor Management</li>
    </ol>
</nav>
{{-- Employees Search --}}
<div class="row">
    <div class="">
        <div class="card-header">
            <form action="{{url('/search')}}" class="form-inline my-2 my-lg-0 float-end"
                style='display:flex;width:330px' type="get">
                <input type="search" class="form-control" name='query' placeholder="search...">
                <button type="submit" class="btn btn-primary  float-end">search</button>
            </form>
        </div>
    </div>
</div>


<div class="mt-4 mb-4">
    <div class="card">
        <div class="card-header">


            <div class="row">
                <div class="col col-md-8">Employee Management
                </div>
                <div class="col col-md-2">
                    <a href="{{url('employees/create')}}" class='btn btn-success float-end'>Add Employee</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive  mt-5 ">
                <table class="table table-bordered table-striped" id="visitor_table">
                    <thead>
                        <tr>
                            <th>Employee PJ</th>
                            <th>Employee Name</th>
                            <th>Employee Tel</th>
                            <th>Employee Email</th>
                            <th>Employee Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $employee )
                        <tr>
                            <td>{{$employee->employee_pj}}</td>
                            <td>{{$employee->employee_name}}</td>
                            <td>{{$employee->employee_tel}}</td>
                            <td>{{$employee->employee_email}}</td>
                            <td>{{$employee->employee_department}}</td>
                            <td>
                                <a href="{{url('employees/'.$employee->id.'/edit')}}" class='btn btn-success'>Edit</a>
                                <a href="{{url('employees/'.$employee->id.'/delete')}}"
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
